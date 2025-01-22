<?php
namespace PPLCZ\Front\Assets;

class JsFrontTemplate {

    public static $isAdded = false;

    public static $content = [];

    public static function scripts()
    {
        if (!self::$isAdded)
            add_action("wp_footer", [JsFrontTemplate::class, "wp_scripts"]);
        self::$isAdded = true;
    }

    public static function add_inline_script($script_safe, $top = false)
    {
        self::scripts();
        if (!in_array($script_safe, self::$content, true))
            self::$content[] = $script_safe;
    }

    public static function wp_scripts()
    {

        if (self::$content)
        {
            wp_enqueue_script("pplcz_frontend_plugin", plugin_dir_url(__FILE__) . 'content.js', [], pplcz_get_version(), true );
            $script_safe = join("\r\n\r\n", self::$content);
            wp_add_inline_script("pplcz_frontend_plugin", $script_safe);
        }
    }
}