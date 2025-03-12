<?php
namespace PPLCZ\Admin\Page;
defined("WPINC") or die();


use PPLCZ\Admin\Assets\JsTemplate;
use PPLCZ\Admin\CPLOperation;
use PPLCZ\Admin\Cron\ShipmentPhaseCron;

class OptionPage {

    const SLUG =  "pplcz_options";

    public static function render()
    {
        ?>
        <div class="wp-reset-div">
            <div id="pplcz_options" ></div>
        </div>
        <?php
        JsTemplate::add_inline_script("wpUpdateStyle", "pplcz_options");
        JsTemplate::add_inline_script("optionsPage", "pplcz_options");
    }

    public static function page_hook()
    {
        JsTemplate::scripts();
    }

    public static function add_menu()
    {
        static $addMenu;
        if ($addMenu)
            return;
        $addMenu = true;
        $hook = add_menu_page("PPL CZ - Plugin", "PPL CZ - Plugin", "manage_woocommerce", self::SLUG, [self::class, "render"], pplcz_asset_icon("pplmenu.png"));
        add_action("load-{$hook}", [self::class, "page_hook"]);
    }

    public static function  validate_cpl() {
        $validated = get_transient(pplcz_create_name("validate_cpl_connect"));
        $validateCallApi = get_transient(pplcz_create_name("validate_cpl_connect_api"));

        if (!$validated ) {
            delete_transient(pplcz_create_name("validate_cpl_connect_api"));
            $validateCallApi = null;
            $cpl = new CPLOperation();
            $cpl->clearAccessToken();
            $newToken = $cpl->getAccessToken();
            $validated = !$newToken ? -1: 1;
            set_transient(pplcz_create_name("validate_cpl_connect"), $validated, 3600);
        }
        self::add_menu();
        ob_start();
        $url = menu_page_url(self::SLUG) . '#/setting';
        ob_clean();
        if ($validated == -1) {
            ?>
            <div class="notice notice-error is-dismissible">
                <p>
                    PPL Plugin nemůže fungovat, protože <a href='<?php echo esc_html($url)?>'>přihlašovací údaje</a> nejsou správně nastaveny! Ujistěte se, že jsou zadány správně.<br/>
                    Pokud přístupové údaje nemáte, prosím kontaktujte ithelp@ppl.cz
                </p>
            </div>
            <?php
        }

        if ($validated == 1 && !$validateCallApi)
        {
            try {
                $cpl = new CPLOperation();
                if ($cpl->getAccessToken()) {
                    $cpl->getStatuses();
                    set_transient(pplcz_create_name("validate_cpl_connect_api"), "valid");
                    $validateCallApi = "valid";
                }
            }
            catch (\Exception $exception)
            {
                set_transient(pplcz_create_name("validate_cpl_connect_api"), $exception->getMessage());
                $validateCallApi = $exception->getMessage();
            }
        }
        if ($validateCallApi && $validateCallApi !== "valid")
        {
            ?>
            <div class="notice notice-error is-dismissible">
                <p>Problém s připojením na API: <?php echo esc_html($validateCallApi) ?></p>
            </div>
            <?php
        }
    }

    public static function register()
    {
        add_action("admin_menu", [self::class, "add_menu"]);
        add_action("admin_notices", [self::class, "validate_cpl"]);
    }
}