<?php
namespace PPLCZ\Validator;

use PPLCZ\Model\Model\ProductModel;
use PPLCZ\Model\Model\CartModel;
use PPLCZ\Serializer;
use PPLCZ\ShipmentMethod;
use PPLCZ\Traits\ParcelDataModelTrait;

class CartValidator extends ModelValidator {

    use ParcelDataModelTrait;

    public function canValidate($model)
    {
        if ($model instanceof \WC_Cart)
            return true;
        return false;
    }

    public function validate($model, $errors, $path)
    {
        /**
         * @var \WC_Cart $model
         * @var \WC_Shipping_Rate $shippingMethod
         */
        $shippingMethod = pplcz_get_cart_shipping_method();
        if (!$shippingMethod)
            return;

        /**
         * @var CartModel $data
         */
        $data = Serializer::getInstance()->denormalize($shippingMethod->get_meta_data(), CartModel::class);

        $parcel = pplcz_get_cart_parceldata();


        if ($data->getParcelRequired() && !$parcel) {
            $errors->add("parcelshop-missing", "Je potřeba vybrat výdejní místo pro doručení zásilky");
        }

        if (static::ageRequired($model, $shippingMethod)
            && (!$parcel || $parcel->getAccessPointType() !== 'ParcelShop'))
        {
            $errors->add("parcelshop-age-required", "Z důvodu kontroly věku je nutné vybrat obchod, ne výdejní box.");
        }

        if (!$model->get_customer()->get_shipping_phone()) {
            $errors->add("parcelshop-phone-required", "Pro zasílání informací o stavu zásilky je nutno vyplnit telefonní číslo.");
        }
        else if (!self::isPhone($model->get_customer()->get_shipping_phone()))
        {
            $errors->add("parcelshop-phone-required", "Nevalidní telefonní číslo");
        }

        if (!$data->getParcelRequired())
        {
            if (!self::isZip($model->get_customer()->get_shipping_country(), $model->get_customer()->get_shipping_postcode()))
                $errors->add("parcelshop-shippingzip-required", "Nevalidní PSČ u doručovací adresy");
        }

        if ($data->getParcelRequired() && $model->get_customer()->get_shipping_country() && $parcel)
        {
            $country = $model->get_customer()->get_shipping_country();
            if ($country !== $parcel->getCountry())
            {
                $errors->add("parcelshop-shippingzip-required", "Země kontaktní (doručovací) adresy je jiná, než výdejního místa");
            }
        }
        return $errors;
    }


    public static function ageRequired(\WC_Cart $cart, $shippingMethod) {
        if (is_string($shippingMethod))
        {
            $methodid = $shippingMethod;
        }
        else
        {
            $methodid = $shippingMethod->get_method_id();
            $methodid = str_replace(pplcz_create_name(""), "", $methodid);
        }

        if (in_array($methodid, ["SMAR", "SMAD"], true)) {
            foreach ($cart->get_cart() as $key => $val) {
                $product = $val['product_id'];
                $variation = $val['variation'];
                if (array_reduce([$product, $variation], function ($carry, $item) {
                    if ($carry || !$item)
                        return $carry;

                    $variation = new \WC_Product($item);
                    /**
                     * @var ProductModel $model
                     */
                    $model = Serializer::getInstance()->denormalize($variation, ProductModel::class);
                    if ($model->getPplConfirmAge18()
                        || $model->getPplConfirmAge15()) {
                        $carry = true;
                    }
                    return $carry;
                }, false)) {
                    return true;
                }
            }
        }
        return false;
    }

}