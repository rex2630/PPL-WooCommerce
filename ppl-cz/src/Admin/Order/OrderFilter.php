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

    public static function query_old_clausule($sql, $item)
    {
        if (!is_admin())
            return $sql;
        if ($item instanceof \WP_Query && @$item->query['post_type'] === "shop_order")
        {
            $s = @$item->query['s'];
            $all = true;
            if (isset($item->query['search_filter']) && $item->query['search_filter'] === 'all')
            {
                $all = false;
            }

            if ($s && $all) {
                global $wpdb;
                $q = str_replace("likeMaker", "%", $wpdb->prepare(" OR {$wpdb->prefix}posts.id in (select pplczfilter_a.wc_order_id from {$wpdb->prefix}pplcz_shipment pplczfilter_a join {$wpdb->prefix}pplcz_package pplczfilter_b on pplczfilter_b.ppl_shipment_id = pplczfilter_a.ppl_shipment_id where pplczfilter_b.shipment_number like %s )", $s . "likeMaker"));
                $sql["where"] .= $q;
            }
        }
        return $sql;
    }

    public static function query_clausule($sql, $item, $args)
    {
        global $wpdb;

        if (isset($args["s"]) && $args['s'] && $args["search_filter"] === 'all') {
            $q =str_replace("likeMaker", "%", $wpdb->prepare(" OR {$wpdb->prefix}wc_orders.id in (select pplczfilter_a.wc_order_id from {$wpdb->prefix}pplcz_shipment pplczfilter_a join {$wpdb->prefix}pplcz_package pplczfilter_b on pplczfilter_b.ppl_shipment_id = pplczfilter_a.ppl_shipment_id where pplczfilter_b.shipment_number like %s )", $args['s'] . "likeMaker"));
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

    public static function handle_bulk_action($ids, $action, $type)
    {
        if (str_contains($action, "pplcz_bulk_operation_create_labels") && $type === 'order')
        {
            $shipments = array_reduce(array_map(function ($id) {
                $order = new \WC_Order($id);
                $shipments = ShipmentData::read_order_shipments($id);
                $founded = !!$shipments;
                /**
                 * @var ShipmentData $shipment
                 */
                foreach ($shipments as $key => $shipment) {
                    if ($shipment->get_lock() || $shipment->get_batch_id()) {
                        unset($shipments[$key]);
                    }
                }

                if ($shipments)
                {
                    foreach ($shipments as $k => $v)
                    {
                        $shipments[$k] = Serializer::getInstance()->denormalize($v, ShipmentModel::class);
                    }
                    return $shipments;
                }
                if (!$founded && self::hasPPLShipment($order)) {
                    return [Serializer::getInstance()->denormalize($order, ShipmentModel::class)];
                }
                return [];

            }, $ids), function ($carry, $shipment) {
                return array_merge($carry, $shipment);
            }, []);

            $hasError = false;
            foreach ($shipments as $shipment) {
                $errors  = new Errors();
                Validator::getInstance()->validate($shipment, $errors, "");
                if ($errors->errors) {
                    $hasError = true;
                    set_transient(pplcz_create_name("bulk_create_label_" . get_current_user_id()), esc_html__('Při vytváření zásilek byly nalezeny chyby', "ppl-cz"), 60);
                }

            }
            if (!$hasError) {
                /**
                 * @var ShipmentModel $shipment
                 * @var ShipmentData $shipmentData
                 */
                foreach ($shipments as $key => $shipment) {
                    if (!$shipment->getId()) {
                        $shipmentData = Serializer::getInstance()->denormalize($shipment, ShipmentData::class);
                        $shipmentData->save();
                        $shipments[$key] = $shipmentData->get_id();
                    } else {
                        $shipments[$key] = $shipment->getId();
                    }

                }

                $operation = new CPLOperation();
                try {
                    $operation->createPackages($shipments);
                }
                catch (\Exception $ex) {
                    set_transient(pplcz_create_name("bulk_create_label_" . get_current_user_id()), esc_html__("Vznikl problém při vytváření zásilky", "ppl-cz"), 60);
                }
            }


            return $ids;
        }

        return $ids;
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
    }

}