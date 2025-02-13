<?php
// phpcs:ignoreFile WordPress.DB.DirectDatabaseQuery.DirectQuery
// phpcs:ignoreFile WordPress.DB.DirectDatabaseQuery.NoCaching

namespace PPLCZ;

defined("WPINC") or die();

use PPLCZ\Admin\Assets\JsTemplate;
use PPLCZ\Front\Validator\ParcelShopValidator;
use PPLCZ\Model\Model\CartModel;


class ShipmentMethod extends \WC_Shipping_Method {

    public $parcelBoxRequired = false;

    public $codAvailable = "";

    public static function allMethods() {
        return array_merge(array_keys(self::methods()), array_values(self::codMethods()));
    }

    public static function methodsWithCod() {
        $methods = self::methods();
        foreach (self::codMethods() as $k => $v)
        {
            if (isset($methods[$k]))
            {
                $methods[$v] = $methods[$k] . ' - dobírka';
            }
        }
        return $methods;
    }

    public static function isMethodWithCod($code) {
        $cods = array_flip(self::codMethods());
        return isset($cods[$code]);
    }

    public static function isMethodWithParcel($code)
    {
        return in_array($code, self::parcelMethods());
    }

    public static function parcelMethods()
    {
        return [
            "SMAR", "SMEU", "SMAD", "SMED"
        ];
    }

    public static function methods() {
        return [
            "PRIV"=> "PPL Parcel CZ Private", // cz
            "SMAR" => "PPL Parcel CZ Smart", // cz, VM

            "SMEU" => "PPL Parcel Smart Europe", // necz
            "CONN" => "PPL Parcel Connect", // necz
        ];
    }

    public static function methodsDescriptions()
    {
        return [
            "PRIV" => "Doprava v rámci České republiky na adresu",
            "SMAR" => "Doprava v rámci České republiky na výdejní místo",
            "SMEU" => "Doprava v rámci Polska, Německa, Slovenska na výdejní místo",
            "CONN" => "Doprava v rámci EU na adresu"
        ];
    }

    public static function codMethods() {
        return  [
            "BUSS" => "BUSD",
            "DOPO" => "DOPD",
            "PRIV"=> "PRID",
            "CONN" => "COND",
            "SMAR" => "SMAD",
            "SMEU" => "SMED"
        ];

    }

    public function getMethodTitleByCode($paymentCode)
    {
        $cod = @$this->get_instance_option("codPayment");
        if ($cod === $paymentCode) {
            return $this->get_method_title() . " - dobírka";
        }
        return $this->get_method_title();
    }

    public function getMethodCodeByPayment($paymentCode)
    {

        $cod = @$this->get_instance_option("codPayment");
        if ($cod === $paymentCode) {
            $originalCode = str_replace(pplcz_create_name(""), "", $this->id);
            return self::codMethods()[$originalCode];
        }
        return str_replace(pplcz_create_name(""), "", $this->id);
    }

    public function __construct($method_id)
    {
        parent::__construct(intval($method_id));
        $isInstance = !!intval($method_id);

        $zones_shipments = wp_cache_get(pplcz_create_name("zones_shipment")) ?: [];
        if (!$zones_shipments || $method_id === (intval($method_id) . "") && !($founded = array_filter($zones_shipments, function ($item) use ($method_id) {
                return $item->instance_id == $method_id;
            }))) {
            global $wpdb;

            $result = $wpdb->get_results( $wpdb->prepare("select instance_id, zone_id, method_id from {$wpdb->prefix}woocommerce_shipping_zone_methods where method_id like %s ", pplcz_create_name("") . "%"));

            $zones_shipments = array_merge($zones_shipments, $result);
            wp_cache_delete(pplcz_create_name("zones_shipment"));
            wp_cache_add(pplcz_create_name("zones_shipment"), $zones_shipments);
        }

        if ("{$method_id}" === (intval($method_id) . "")) {
            $founded = @$founded ?: array_filter($zones_shipments, function ($item) use ($method_id) {
                return $item->instance_id == $method_id;
            });
            $method_id = reset($founded)->method_id;
            $this->id = $method_id;
            $pplId = str_replace(pplcz_create_name(""), "", $method_id);
        } else if ($method_id) {
            $this->id = pplcz_create_name($method_id);
            $pplId =  str_replace(pplcz_create_name(""), "", $method_id);
        } else
            throw new \Exception();

        $codAvailables = self::codMethods();

        $this->codAvailable = isset($codAvailables[$pplId]) ? @$codAvailables[$pplId] : false;
        $this->parcelBoxRequired = in_array($pplId, self::parcelMethods());

        $this->supports = array(
            "shipping-zones",
            "instance-settings"
        );

        $this->plugin_id = pplcz_create_name("");
        $this->title = $this->method_title = self::methods()[$pplId];
        $this->method_description = self::methodsDescriptions()[$pplId];
        /*
        if ($isInstance) {
            $this->init_instance_settings();
        } else {
            $this->init_settings();
        }*/
    }

    public function get_instance_form_fields() {
        if (!$this->instance_form_fields) {
            $this->instance_form_fields = $this->get_form_fields();
            return parent::get_instance_form_fields();
        }
        return parent::get_instance_form_fields();
    }

    public function get_form_fields()
    {
        if (!$this->form_fields) {
            $this->init_form_fields();
            return parent::get_form_fields();
        }
        return parent::get_form_fields();
    }

    public function init_form_fields()
    {
        $form_fields = array(
            'title' => array(
                'title'       => esc_html__('Název dopravy', 'ppl-cz' ),
                'type'        => 'text',
                'description' => esc_html__('Název dopravy', 'ppl-cz'  ),
                'default'     => '',
                'desc_tip'    => true,
            ),
            'description' => array(
                'title'       => esc_html__('Podrobnějsí popis', 'ppl-cz' ),
                'type'        => 'textarea',
                'description' => esc_html__('Popis dopravy', 'ppl-cz'  ),
                'default'     => '',
                'desc_tip'    => true
            ),
        );

        $zones = \WC_Shipping_Zones::get_zones();
        $currencies  = include __DIR__ . '/config/currencies.php';

        $form_fields["priceWithDph"] = array(
            'title'       => esc_html__('Cena je s DPH', 'ppl-cz' ),
            'type'        => 'checkbox',
            'default'     => '',
            'desc_tip'    => true
        );

        foreach (array_unique(array_merge([ get_option( 'woocommerce_currency' )],array_values($currencies))) as $currency) {
            $currency_safe = esc_html__($currency);

            $form_fields["cost_allow_{$currency}"] = array(
                'title'       => esc_html__("Povolení měny", 'ppl-cz' ),
                'type'        => 'checkbox',
                'description' => esc_html__('Povolení měny', 'ppl-cz'  ),
                'default'     => '',
                'desc_tip'    => true
            );

            $text_safe = esc_html__("Cena za dopravu", 'ppl-cz' ) . " <span class='shipment-price-original'>(v {$currency_safe})</span>";

            $form_fields["cost_{$currency}"] = array(
                'title'       => $text_safe,
                'type'        => 'price',
                'description' => esc_html__('Cena za dopravu', 'ppl-cz'  ),
                'default'     => '',
                'desc_tip'    => true
            );



            $form_fields["cost_order_free_{$currency}"] = array(
                'title'       => sprintf(esc_html__("Od jaké ceny bude doprava zadarmo (v %s)", 'ppl-cz' ), $currency_safe),
                'type'        => 'price',
                'description' => esc_html__('Od jaké ceny bude doprava zadarmo, pokud není vyplněno, nebude zadarmo', 'ppl-cz'  ),
                'default'     => '',
                'desc_tip'    => true
            );

            if (in_array($currency, ['CZK', "EUR", "PLN", "HUF", "RON"])) {

                $text_safe = esc_html__("Příplatek za dobírku", 'ppl-cz' ) . " <span class='shipment-price-original'>" . $currency_safe ."</span>" /*<!--<span class='shipment-price-base'>(v {$basecurrency})</span>-->*/;

                $form_fields["cost_cod_fee_{$currency}"] = array(
                    'title' => $text_safe,
                    'type' => 'price',
                    'description' => esc_html__('Příplatek za dobírku', 'ppl-cz'),
                    'default' => '',
                    'desc_tip' => true
                );

                $form_fields["cost_cod_fee_always_{$currency}"]  = array(
                    'title' =>  esc_html__("Příplatek za dobírku i v případě dopravy zdarma", 'ppl-cz' ),
                    'type' => 'checkbox',
                    'description' => esc_html__('Příplatek za dobírku bude i v případě dopravy zdarma', 'ppl-cz'),
                    'default' => '',
                    'desc_tip' => true
                );



                $form_fields["cost_order_free_cod_{$currency}"] = array(
                    'title' => sprintf(esc_html__("Od jaké ceny bude doprava zadarmo pro dobírku (v %s)", 'ppl-cz'), $currency_safe),
                    'type' => 'price',
                    'description' => esc_html__('Od jaké ceny bude doprava zadarmo pro dobírku, v případě nevyplnění nebude zadarmo', 'ppl-cz'),
                    'default' => '',
                    'desc_tip' => true
                );
            }
        }

        $payments = WC()->payment_gateways()->payment_gateways();

        foreach ($payments as $key => $value )
        {
            $payments[$key] = $value->get_title();
        }

        $payments[""] = "Nevybráno";


        $form_fields["disablePayments"] = array(
            'title'       => esc_html__('Platby, které nejsou povoleny', 'ppl-cz' ),
            'type'        => 'multiselect',
            'description' => !$this->codAvailable ? esc_html__( 'Tato metoda nepodoruje dobírku, prosim označte tuto platbu, pokud existuje', 'ppl-cz'  ): "",
            "options" => $payments,
            'default'     => [],
            'desc_tip'    => true
        );

        $form_fields["codPayment"] = [
            'title'       => esc_html__('Platba považovaná za dobírku', 'ppl-cz' ),
            'type'        => 'select',
            'description' => esc_html__("Vyberte platbu určenou na dobírku (u teto platby je nutno řešit i nastaveni v rámci pokladny, pro jeji zobrazení)", 'ppl-cz'  ),
            "options" =>  $payments,
            'default'     => "",
            'desc_tip'    => true
        ];



        $this->form_fields = $form_fields;
    }

    public static function shipping_methods($shippings)
    {

        return array_merge($shippings, [
            pplcz_create_name("PRIV" )=> new ShipmentMethod("PRIV"),
            pplcz_create_name("SMAR") =>  new ShipmentMethod("SMAR"),
            pplcz_create_name("SMEU")=>  new ShipmentMethod("SMEU"),
            pplcz_create_name("CONN") => new ShipmentMethod("CONN"),
        ]);
    }


    /**
     * Výpočet ceny dopravy
     */
    public function calculate_shipping($package = array())
    {
        $enabled = $this->enabled;

        if ($enabled === "no")
            return;

        $cart = wc()->cart;

        if (!$cart) {
            wc()->initialize_cart();
            $cart = wc()->cart;
        }

        $curentCurrency = get_woocommerce_currency();

        if (@$this->get_instance_option("cost_allow_{$curentCurrency}") !== 'yes'){
            return;
        }

        $countries = include __DIR__ . '/config/countries.php';


        $country = WC()->cart->get_customer()->get_shipping_country('');

        if (!isset($countries[$country]))
            return;

        /**
         * @var CartModel $cartData
         */
        $cartData = pplcz_denormalize($this, CartModel::class);

        if ($cartData->getParcelRequired() && $cartData->getAgeRequired() && $country !== 'CZ')
            return;

        if ($cartData->getDisabledByProduct())
            return;

        $price = $cartData->getCost();

        $priceWithDph = \WC_Tax::calc_shipping_tax($cartData->getCost(), \WC_Tax::get_shipping_tax_rates());
        if ($cartData->getPriceWithDph() && $price ) {
            $first = reset($priceWithDph);
            if ($first) {
                $procento  = ($price + $first) / $price;
                $price /= $procento;
            }
            $priceWithDph = \WC_Tax::calc_shipping_tax($price, \WC_Tax::get_shipping_tax_rates());
        }

        $cartData->setCost($price);

        $this->add_rate([
            'id' => $this->id,
            'label' => $this->instance_settings["title"] ?: $this->title ?: $this->method_title,
            'cost' => $price,
            "meta_data" => pplcz_normalize($cartData) + [ 'taxes' => $priceWithDph ],
            "taxes" => $priceWithDph
        ]);
    }

    public static function yay_currency($data, $method, $costs, $currency) {

        unset($data['cost']);
        return $data;
    }

    public static function woocommerce_package_rates($rates, $package)
    {

        foreach ($rates as $key => $item)
        {
            if (strpos($item->get_id(),"pplcz_") !== false)
            {
                /**
                 * @var \WC_Shipping_Rate $item
                 */
                $metadata = $item->get_meta_data();
                $item->set_cost($metadata['cost']);
                $item->set_taxes($metadata['taxes']);
                $rates[$key] = $item;
            }
        }

        return $rates;
    }


    public static function recalculate_fees($cart)
    {
        $rate = pplcz_get_cart_shipping_method();
        if (!$rate)
            return $cart;

        /**
         * @var CartModel $metadata
         */
        $metadata = Serializer::getInstance()->denormalize(new ShipmentMethod($rate->get_instance_id() ?: $rate->get_method_id()), CartModel::class);
        if ($metadata->isInitialized('codFee') && $metadata->getCodFee()) {
            $priceWithDph = \WC_Tax::calc_shipping_tax($metadata->getCodFee(), \WC_Tax::get_shipping_tax_rates());
            if ($metadata->getPriceWithDph() ) {
                $first = reset($priceWithDph);
                if ($first) {
                    $procento  = ($metadata->getCodFee() + $first) / $metadata->getCodFee();
                    $metadata->setCodFee($metadata->getCodFee() / $procento);
                }
                $priceWithDph = \WC_Tax::calc_shipping_tax($metadata->getCodFee(), \WC_Tax::get_shipping_tax_rates());
            }

            WC()->cart->add_fee("Příplatek za dobírku", $metadata->getCodFee(), true, $priceWithDph);
        }
        return $cart;

    }

    public static function available_payment_methods($available_gateways) {
        if ( is_admin() ) return $available_gateways;

        // Získání aktuálně zvoleného způsobu dopravy
        $session = WC()->session;
        if (!$session)
            return $available_gateways;

        $rate = pplcz_get_cart_shipping_method();
        if (!$rate)
        {
            return $available_gateways;
        }

        /**
         * @var CartModel $metadata
         */
        $metadata = Serializer::getInstance()->denormalize($rate->get_meta_data(), CartModel::class);
        if ($metadata->isInitialized("disablePayments") && $metadata->getDisablePayments()) {
            $disablePayments = $metadata->getDisablePayments();
            foreach ( $available_gateways as $gateway_id => $gateway ) {
                if ( in_array( $gateway_id, $disablePayments ) ) {
                    unset( $available_gateways[$gateway_id] );
                }
            }
        }

        if ($metadata->getDisableCod() && $metadata->getCodPayment()) {
            $cod = $metadata->getCodPayment();
            unset($available_gateways[$cod]);
        }

        return $available_gateways;

    }


    public function generate_settings_html( $form_fields = array(), $echo = true ) {

        $html = parent::generate_settings_html($form_fields, $echo);

        if (!$echo)
            ob_start();

        $id_safe = pplcz_create_name($this->id . '_priceWithDph');
        $lastId_safe = pplcz_create_name($this->id . '_disablePayments');
        $titleId_safe = pplcz_create_name($this->id . '_about');
        $currencies = array_reduce(array_filter(array_map(function ($item) {
            if (preg_match('~_([A-Z]{3})$~', $item, $match)) {
                return pplcz_create_name($this->id . '_' .$item);
            }
            return null;
        }, array_keys($form_fields))), function ($acc, $item) {
            preg_match('~_([A-Z]{3})$~', $item, $match);
            $acc[$match[1]][] = $item;
            return $acc;
        }, []);
        $allInputs_safe = wp_json_encode(array_merge(...array_values($currencies)));
        $currencies_safe = wp_json_encode(array_keys($currencies));

        JsTemplate::add_inline_script("
        PPLczPlugin.pplczInitSettingShipment('$id_safe', '$id_safe', '$lastId_safe', '$titleId_safe', $currencies_safe, $allInputs_safe);  
");

        if (!$echo)
            return $html . ob_get_clean();
        return "";
    }

    public function process_admin_options()
    {
        wp_cache_delete(pplcz_create_name("zones_shipment"));
        parent::process_admin_options();
        wp_cache_delete(pplcz_create_name("zones_shipment"));
    }

    public static function hide_order_itemmeta($metas)
    {
        return array_merge(['priceWithDph', 'disablePayments', "parcelRequired", "mapEnabled", "codFee", "codPayment", "disableCod", "ageRequired", "cost"], $metas );
    }

    public static function register() {
        add_filter("woocommerce_shipping_methods", [self::class, 'shipping_methods']);
        add_filter('woocommerce_hidden_order_itemmeta', [self::class, 'hide_order_itemmeta']);
        add_filter("woocommerce_available_payment_gateways", [self::class, "available_payment_methods"]);
        add_filter('woocommerce_cart_calculate_fees', [self::class, 'recalculate_fees']);


        add_filter('yay_currency_get_data_info_from_shipping_method', [self::class, 'yay_currency'], 10, 4);
        add_filter('woocommerce_package_rates', [self::class, 'woocommerce_package_rates'], 11, 2);
    }
}