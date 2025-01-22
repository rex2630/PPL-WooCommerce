<?php
namespace PPLCZ\Admin;
defined("WPINC") or die();


use PPLCZ\Data\PackageData;
use PPLCZ\Data\ShipmentData;
use WpOrg\Requests\Exception;

class FileDownload {
    public static function rewrite_rule()
    {
        add_rewrite_rule("^pplcz-download/([0-9]+)/?$", 'index.php?pplcz_download=$matches[1]', "top");
    }

    public static function query_vars($vars)
    {
        $vars[] = 'pplcz_download';
        $vars[] = 'pplcz_reference';
        $vars[] = 'pplcz_print';
        return $vars;
    }

    public static function request($vars) {
        if (isset($vars['pplcz_download']) &&  wp_strip_all_tags($vars['pplcz_download'])) {
            $vars['pplcz_download'] = wp_strip_all_tags($vars['pplcz_download']);
            if (!isset($vars["pplcz_reference"]))
                $vars['pplcz_reference'] = null;
            if (!isset($vars['pplcz_print']))
                $vars['pplcz_print'] = null;

        }
        return $vars;
    }

    public static function template_redirect()
    {
        global $wp_query;

        if (isset($wp_query->query_vars['pplcz_download']) && $wp_query->query_vars['pplcz_download']) {

            if (!current_user_can("manage_woocommerce")) {
                http_response_code(403);
                wp_die();
            }

            $shipmentId = $wp_query->query_vars['pplcz_download'];

            try {
                if (is_numeric($shipmentId)) {
                    $downloadLabel = new CPLOperation();
                    $packageData = new PackageData($shipmentId);
                    if (!$packageData->get_id())
                        wp_die(esc_html(__('Soubor nebyl nalezen.', 'ppl-cz')));
                    $shipmentId = $packageData->get_ppl_shipment_id();
                    $shipmentData = new ShipmentData($shipmentId);
                    $downloadLabel->getLabelContents($shipmentData->get_batch_id(), $shipmentData->get_reference_id(), $packageData->get_shipment_number(), $wp_query->query_vars['pplcz_print']);
                } else if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $shipmentId)) {
                    $reference = @$wp_query->query_vars['pplcz_reference'];
                    $finded = ShipmentData::read_shipments(["batch_label_group" => [$shipmentId]]);
                    if ($finded) {
                        $batch_id = $finded[0]->get_batch_id();
                        $operation = new CPLOperation();
                        $operation->getLabelContents($batch_id, $reference, null, $wp_query->query_vars['pplcz_print']);
                    }
                }
            }
            catch (\Exception $exception)
            {
                wp_die(esc_html(__('Problém se stažením, nepokoušíte se tisknout štítky starší než 31 dní?', "ppl-cz")));
            }
            wp_die(esc_html(__('Soubor nebyl nalezen', "ppl-cz")));
        }
    }

    public static function register()
    {
        add_action('init', [self::class, 'rewrite_rule']);
        add_filter('query_vars', [self::class, 'query_vars']);
        add_filter("request", [self::class, "request"]);
        add_action('template_redirect', [self::class, 'template_redirect']);
    }


}