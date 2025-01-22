<?php
namespace  PPLCZ\Admin\Assets;

defined("WPINC") or die();

class JsTemplate
{
    public const COLLECTIONURL  = "https://www1.ppl.cz";

    public static $isAdded = false;

    public static $content = [];

    public static function scripts()
    {
        if (!self::$isAdded)
            add_action("admin_footer", [JsTemplate::class, "admin_scripts"]);
        self::$isAdded = true;
    }

    public static function add_inline_script($script_safe)
    {
        self::scripts();
        if (!in_array($script_safe, self::$content, true))
            self::$content[] = $script_safe;
    }

    public static function admin_scripts()
    {
        $setting = require __DIR__ . '/build/index.asset.php';
        wp_enqueue_script("pplcz_map_js");
        wp_enqueue_style("pplcz_map_css");
        wp_enqueue_script("pplcz_scripts", plugin_dir_url(__FILE__) . 'build/index.js', array_merge($setting['dependencies'], ["jquery"]), $setting['version'], true);

        wp_enqueue_script("pplcz_plugin", plugin_dir_url(realpath(__DIR__ . '/../'))  . "Admin/MuiAdmin/build/static/js/bundle.js", [] , pplcz_get_version(), true);
        wp_localize_script("pplcz_plugin", "pplcz_data", [
            "nonce" => wp_create_nonce("wp_rest"),
            "url" => rtrim(get_rest_url(), '/'),
            "pluginPath" => plugin_dir_url(realpath(__DIR__ . '/../'))  . "Admin/MuiAdmin/build/static",
            "newCollectionUrl" => self::COLLECTIONURL,
            "ajax_url" => admin_url("admin-ajax.php")
        ]);

        if (self::$content)
        {
            $script_safe = join("\r\n\r\n", array_merge(["window.PPLczPlugin = window.PPLczPlugin || [];"], self::$content));
            wp_add_inline_script("pplcz_plugin", $script_safe);
        }
    }

}