<?php
// phpcs:ignoreFile WordPress.Security.EscapeOutput.OutputNotEscaped

namespace PPLCZ\Admin\Category;

use PPLCZ\Admin\Assets\JsTemplate;
use PPLCZ\Model\Model\CategoryModel;
use PPLCZ\Model\Model\ShipmentMethodModel;
use PPLCZ\Serializer;
use PPLCZ\ShipmentMethod;

class CategoryPanel {

    public static function get_shipping()
    {
        $output = [];
        foreach (ShipmentMethod::methodsWithCod() as $k => $v) {
            $shipmentMethodModel = Serializer::getInstance()->denormalize([
                "code" => $k,
                "title" => $v,
                "codAvailable" => ShipmentMethod::isMethodWithCod($k),
                "parcelRequired" => ShipmentMethod::isMethodWithParcel($k)
            ], ShipmentMethodModel::class);

            $output[] = Serializer::getInstance()->normalize($shipmentMethodModel);
        }
        return $output;
    }

    public static function register()
    {
        //add_action('product_cat_edit_form_fields', [self::class, "render"], 10, 2);
        add_action('product_cat_add_form_fields', [self::class, "render"], 10);
        add_action('product_cat_edit_form_fields', [self::class, "render"], 10, 2);
        add_action('edited_product_cat', [self::class, "save"], 10, 2);
        add_action('created_product_cat', [self::class, "save"], 10, 2);
    }

    public static function save($term_id, $tt_id)
    {
        if (!isset($_POST['pplNonce']) || !wp_verify_nonce(sanitize_key($_POST['pplNonce']), 'category'))
        {
            return;
        }

        $pplDisabledTransport = [];
        if (isset($_POST['pplDisabledTransport'])) {
            $pplDisabledTransport = sanitize_post(wp_unslash($_POST['pplDisabledTransport']), 'raw');
        }
        $pplDisabledTransport = wc_clean($pplDisabledTransport);

        $model = new CategoryModel();
        if (is_array($pplDisabledTransport)) {
            $model->setPplDisabledTransport($pplDisabledTransport);
        }
        $category = get_term($term_id);
        Serializer::getInstance()->denormalize($model, \WP_Term::class, null, [ "category" => $category]);
    }

    private static function renderForm($categoryModel, $asTd)
    {
        $shipments = self::get_shipping();
        $element_safe = $asTd ? "tr" : "div";

?>
        <<?php echo $element_safe ?> id="pplcz_tab"
                         data-pplNonce='<?php echo esc_html(wp_create_nonce("category")) ?>'
                         data-data='<?php echo esc_html(wp_json_encode(pplcz_normalize($categoryModel))) ?>'
                         data-methods='<?php echo esc_html(wp_json_encode($shipments)) ?>'>
        </<?php echo $element_safe ?>>
<?php
        JsTemplate::add_inline_script("
window.PPLczPlugin.push(['pplczInitCategoryTab', 'pplcz_tab']);        
");
    }

    public static function render($taxonomy = null)
    {
            $categoryModel = Serializer::getInstance()->denormalize($taxonomy, CategoryModel::class);
            if ($taxonomy === "product_cat")
            {
                ?>
                <div class="form-field">
                    <label >
                        Seznam zakázaných metod pro PPL
                    </label>
                </div>
                <?php self::renderForm($categoryModel, false); ?>
            <?php
            } else {
            ?>
            <tr class="form-field">
            <th>
                Seznam zakázaných metod pro PPL
            </th>
                <?php echo self::renderForm($categoryModel, true); ?>
            </tr>
            <?php
            }
    }
}