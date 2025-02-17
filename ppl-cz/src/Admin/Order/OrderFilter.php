<?php
namespace PPLCZ\Admin\Order;
defined("WPINC") or die();


use Automattic\WooCommerce\Internal\DataStores\Orders\OrdersTableQuery;
use PPLCZ\Admin\CPLOperation;
use PPLCZ\Admin\Page\OptionPage;
use PPLCZ\Data\CollectionData;
use PPLCZ\Data\PPLData;
use PPLCZ\Data\ShipmentData;
use PPLCZ\Admin\Errors;
use PPLCZ\Model\Model\ShipmentModel;
use PPLCZ\Serializer;
use PPLCZ\ShipmentMethod;
use PPLCZ\Traits\ParcelDataModelTrait;
use PPLCZ\Validator\Validator;


class OrderFilter {

    use ParcelDataModelTrait;

    const NOTHING = "0";

    const PRINT = "1";

    public static function rerender()
    {
        if (!current_user_can("manage_woocommerce")) {
            wp_die();
        }
        ob_start();
        self::filters();
        wp_send_json_success([
            "html" => ob_get_clean()
        ]);
    }

    public static function filters() {
        ob_start();
        menu_page_url(OptionPage::SLUG);
        $newCollectionUrl = ob_get_clean() . '#/collection/new';
        wc_get_template("ppl/admin/order-filter.php", [
            'newCollectionUrl' => $newCollectionUrl
        ]);
    }

    public static function woocommerce_query_vars($query_vars)
    {
        $query_vars['pplcz_batch'] = sanitize_text_field(wp_unslash(isset($_REQUEST['pplcz_batch']) ? $_REQUEST['pplcz_batch'] : '' ));
        return $query_vars;
    }

    public static function query_vars($query_vars)
    {
        $query_vars[] = 'pplcz_batch';
        return $query_vars;
    }

    public static function query_old_clausule($sql, $item)
    {
        if (!is_admin())
            return $sql;
        if ($item instanceof \WP_Query && @$item->query['post_type'] === "shop_order")
        {
            global $wpdb;
            $s = @$item->query['s'];
            $all = true;
            if (isset($item->query['search_filter']) && $item->query['search_filter'] === 'all')
            {
                $all = false;
            }

            if ($s && $all) {
                $q = str_replace("likeMaker", "%", $wpdb->prepare(" OR {$wpdb->prefix}posts.id in (select pplczfilter_a.wc_order_id from {$wpdb->prefix}pplcz_shipment pplczfilter_a join {$wpdb->prefix}pplcz_package pplczfilter_b on pplczfilter_b.ppl_shipment_id = pplczfilter_a.ppl_shipment_id where pplczfilter_b.shipment_number like %s )", $s . "likeMaker"));
                $sql["where"] .= $q;
            }
            $s = @$item->query['pplcz_batch'];
            if ($s)
            {
                $q = $wpdb->prepare(" AND {$wpdb->prefix}posts.id in (select pplczfilter_a.wc_order_id from {$wpdb->prefix}pplcz_shipment pplczfilter_a where pplczfilter_a.batch_label_group = %s )", $s);
                $sql["where"] .= $q;
            }
        }
        return $sql;
    }

    public static function query_clausule($sql, $item, $args)
    {
        global $wpdb;

        if (isset($args["s"]) && $args['s'] && isset($args['search_filter']) && $args["search_filter"] === 'all') {
            $q = str_replace("likeMaker", "%", $wpdb->prepare(" {$wpdb->prefix}wc_orders.id in (select pplczfilter_a.wc_order_id from {$wpdb->prefix}pplcz_shipment pplczfilter_a join {$wpdb->prefix}pplcz_package pplczfilter_b on pplczfilter_b.ppl_shipment_id = pplczfilter_a.ppl_shipment_id where pplczfilter_b.shipment_number like %s )", $args['s'] . "likeMaker"));
            $sql["where"] = preg_replace("~ OR ~", " OR ($q) OR ", $sql['where'] , 1);
        }
        if (isset($args["pplcz_batch"]) && $args['pplcz_batch'])
        {
            $q = $wpdb->prepare(" AND {$wpdb->prefix}wc_orders.id in (select pplczfilter_a.wc_order_id from {$wpdb->prefix}pplcz_shipment pplczfilter_a where pplczfilter_a.batch_label_group = %s )", $args["pplcz_batch"]);
            $sql["where"] .= $q;
        }

        return $sql;
    }



    public static function order_detail($data, $order) {
        /**
         * @var \WC_Order $data
         */
        $parcel = self::getParcelshopOrderData($order, true);

        if ($parcel) {
            $data['formatted_parcel_shop'] = "ParcelShop<br/>{$parcel->getName()}<br/>{$parcel->getStreet()}<br/>{$parcel->getZipCode()} {$parcel->getCity()}";
        }
        return $data;

    }

    public static function bulk_action($bulk) {

        $bulk["pplcz_bulk_operation_create_labels"] = "Vytisknout zásilky PPL";
        return $bulk;
    }

    public static function admin_notices() {
        $value = get_transient(pplcz_create_name("bulk_create_label_" . get_current_user_id()));
        if ($value) {
            ?>
            <div class="error notice">
                <p><?php echo  esc_html($value) ?></p>
            </div>
            <?php
        }
        delete_transient(pplcz_create_name("bulk_create_label_" . get_current_user_id()));
    }

    public static function preview_end() {
        ?>
        <div id="formatted_parcel_shop" style="display: none">
        </div>
        <# (function()  {
        setTimeout(function() {
        const item = jQuery("#formatted_parcel_shop").closest("article").find(".wc-order-preview-address:nth-child(2)")
        item.append("<br/><br/>" +data.formatted_parcel_shop)
        });
        })()
        #>
        <?php
    }

    public static function register() {

        add_action("admin_notices", [self::class, "admin_notices"]);

        add_action( 'woocommerce_order_list_table_extra_tablenav', [self::class, 'filters'], 10, 2 );
        add_action('manage_posts_extra_tablenav', [self::class, "filters"], 10, 2);

        add_action("woocommerce_admin_order_preview_end", [self::class, "preview_end"], 10, 2);
        add_filter("woocommerce_admin_order_preview_get_order_details", [self::class, "order_detail"], 10, 2);

        add_filter('bulk_actions-edit-shop_order', [self::class, 'bulk_action'], 20, 1);
        add_filter( 'bulk_actions-woocommerce_page_wc-orders', [self::class, 'bulk_action'], 20, 1 );


        add_filter( 'posts_clauses', [self::class, "query_old_clausule"], 10, 2 );
        add_filter( 'woocommerce_orders_table_query_clauses', [self::class, 'query_clausule'], 10, 3);

        add_action("wp_ajax_ppl_filter_table", [self::class, "rerender"]);

        add_filter('woocommerce_order_query_args', [self::class, 'woocommerce_query_vars']);
        add_filter('query_vars', [self::class, 'query_vars']);
    }

}