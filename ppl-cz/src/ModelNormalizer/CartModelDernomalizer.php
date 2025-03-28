<?php

namespace PPLCZ\ModelNormalizer;

defined("WPINC") or die();

use PPLCZ\Model\Model\CategoryModel;
use PPLCZ\Model\Model\ProductModel;
use PPLCZ\Serializer;
use PPLCZ\Validator\CartValidator;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use PPLCZ\Front\Validator\ParcelShopValidator;
use PPLCZ\Model\Model\CartModel;
use PPLCZ\ShipmentMethod;

class CartModelDernomalizer implements DenormalizerInterface
{

    public function denormalize($data, string $type, ?string $format = null, array $context = [])
    {
        /**
         * @var ShipmentMethod $data
         */

        if (!WC()->session)
            WC()->initialize_session();

        if (!WC()->cart)
            WC()->initialize_cart();

        $cart = WC()->cart;
        $session = WC()->session;


        $country = $cart->get_customer()->get_shipping_country('');

        $paymentMethod = WC()->session->get('chosen_payment_method');

        $currency = get_woocommerce_currency();
        $shipmentCartModel = new CartModel();

        $countries = include __DIR__ . '/../config/countries.php';
        $limits = include __DIR__ . '/../config/limits.php';

        $shipmentCartModel->setParcelRequired(false);
        $shipmentCartModel->setMapEnabled(false);
        $shipmentCartModel->setDisabledByCountry(false);
        $shipmentCartModel->setAgeRequired(false);
        $shipmentCartModel->setDisabledByRules(false);
        $shipmentCartModel->setParcelShopEnabled(true);
        $shipmentCartModel->setParcelBoxEnabled(true);
        $shipmentCartModel->setAlzaBoxEnabled(true);


        $serviceCode = str_replace(pplcz_create_name(''), '', $data->id);
        // preklad
        $serviceCode = ShipmentMethod::methodsFor($country, $serviceCode);

        if (CartValidator::ageRequired(WC()->cart, $serviceCode)) {
            $shipmentCartModel->setAgeRequired(true);
            $shipmentCartModel->setParcelBoxEnabled(false);
            $shipmentCartModel->setAlzaBoxEnabled(false);
        }

        if (!isset($countries[$country]))
        {
            $shipmentCartModel->setDisabledByCountry(true);
        }


        if (@$data->parcelBoxRequired) {
            $shipmentCartModel->setParcelRequired(true);
            $shipmentCartModel->setMapEnabled(true);
            if (!in_array($country, ["CZ", "SK", "DE", "PL"], true))
            {
                $shipmentCartModel->setDisabledByCountry(true);
            }
        }

        $shipmentCartModel->setServiceCode($serviceCode);

        $codServiceCode = ShipmentMethod::codMethods()[$serviceCode];

        if (@$data->get_instance_option("codPayment")) {
            $shipmentCartModel->setCodPayment(@$data->get_instance_option("codPayment"));
        } else {
            $shipmentCartModel->setCodPayment("");
        }

        $disabledPayments = @$data->get_instance_option("disablePayments");

        if (!is_array($disabledPayments))
            $disabledPayments = [];

        $shipmentCartModel->setDisablePayments($disabledPayments);

        $countryAndBankAccount = pplcz_get_cod_currencies();

        $accountIn = array_filter($countryAndBankAccount, function ($item) use ($country, $currency) {
            return $item['country'] == $country && $item['currency'] == $currency;
        });

        if (!@$countries[$country] || !$accountIn)
            $shipmentCartModel->setDisableCod(true);
        else
            $shipmentCartModel->setDisableCod(false);

        $maxCodPrice = array_values(array_filter($limits['COD'], function ($item) use ($codServiceCode, $currency) {
            if ($item['product'] === $codServiceCode && $item['currency'] === $currency) {
                return true;
            }
            return false;
        }, true));



        $totalContents = $cart->get_cart_contents_total() + $cart->get_cart_contents_tax();

        $total = $totalContents;

        $priceWithDph = @$data->get_instance_option("priceWithDph");

        $shipmentCartModel->setPriceWithDph($priceWithDph && $priceWithDph === 'yes');

        if (!$maxCodPrice) {
            $shipmentCartModel->setDisableCod(true);
            if (preg_match('~^[0-9]+(\\.[0-9]*)?$~', $data->get_instance_option("cost_order_free_{$currency}"))
                && floatval(@$data->get_instance_option("cost_order_free_{$currency}")) < $total) {
                $shipmentCartModel->setCodFee(0);
                $shipmentCartModel->setCost(0);
            } else {
                $shipmentCartModel->setCodFee(0);
                $shipmentCartModel->setCost(@floatval(@$data->get_instance_option("cost_{$currency}") ?: 0));
            }
        } else {
            $max = @$maxCodPrice[0]['max'];
            if ($max !== '' && $max !== null && $total >= $max) {
                $shipmentCartModel->setDisableCod(true);
                $shipmentCartModel->setCodFee(100000);
                $shipmentCartModel->setCost(100000);
            } else {
                $isCod = $paymentMethod === $shipmentCartModel->getCodPayment();
                $freeCodPrice = @$data->get_instance_option("cost_order_free_cod_{$currency}");

                if ($isCod
                    && preg_match('~^[0-9]+(\\.[0-9]*)?$~', $freeCodPrice)
                    && floatval($freeCodPrice) <= $total) {
                    if (@$data->get_instance_option("cost_cod_fee_always_{$currency}") === 'yes')
                        $shipmentCartModel->setCodFee(@$data->get_instance_option("cost_cod_fee_{$currency}") ?: 0);
                    else
                        $shipmentCartModel->setCodFee(0);
                    $shipmentCartModel->setCost(0);
                } else if ($isCod) {
                    $shipmentCartModel->setCodFee(@$data->get_instance_option("cost_cod_fee_{$currency}") ?: 0);
                    $shipmentCartModel->setCost(@$data->get_instance_option("cost_{$currency}") ?: 0);
                } else {
                    $shipmentCartModel->setCodFee(0);
                    $costorderfree = @$data->get_instance_option("cost_order_free_{$currency}");

                    if (preg_match('~^[0-9]+(\\.[0-9]*)?$~', $costorderfree) && floatval($costorderfree) <= $total)
                        $shipmentCartModel->setCost(0);
                    else
                        $shipmentCartModel->setCost(@floatval(@$data->get_instance_option("cost_{$currency}") ?: 0));
                }
            }
        }

        $shipmentCartModel->setDisabledByProduct(false);

        foreach (WC()->cart->get_cart() as $key => $cart_item) {
            $product_id = $cart_item['product_id'];
            $product = new \WC_Product($product_id);
            /**
             * @var ProductModel $productModel
             * @var CategoryModel $categoryModel
             */
            $productModel = Serializer::getInstance()->denormalize($product, ProductModel::class);

            if (in_array($codServiceCode, $productModel->getPplDisabledTransport() ?? [], true)) {
                $shipmentCartModel->setDisableCod(true);
            }

            if (in_array($serviceCode, $productModel->getPplDisabledTransport() ?? [], true)) {
                $shipmentCartModel->setDisabledByProduct(true);
                break;
            }

            $shipmentCartModel->setParcelBoxEnabled( !$productModel->getPplDisabledParcelBox() && $shipmentCartModel->getParcelBoxEnabled() );
            $shipmentCartModel->setParcelShopEnabled(!$productModel->getPplDisabledParcelShop() && $shipmentCartModel->getParcelShopEnabled() );
            $shipmentCartModel->setAlzaBoxEnabled(!$productModel->getPplDisabledAlzaBox() && $shipmentCartModel->getAlzaBoxEnabled() );

            $get_parents = $product->get_category_ids();
            $ids = [];

            while ($get_parents) {
                $curId = array_shift($get_parents);
                if (in_array($curId, $ids)) {
                    continue;
                }
                $ids[] = $curId;
                $parId = wp_get_term_taxonomy_parent_id($curId, 'product_cat');
                if ($parId)
                    $get_parents[] = $parId;
            }

            foreach ($ids as $category_id) {
                $term = get_term($category_id);
                $categoryModel = Serializer::getInstance()->denormalize($term, CategoryModel::class);

                if (in_array($codServiceCode, $categoryModel->getPplDisabledTransport() ?? [], true)) {
                    $shipmentCartModel->setDisableCod(true);
                }
                if (in_array($serviceCode, $categoryModel->getPplDisabledTransport() ?? [], true)) {
                    $shipmentCartModel->setDisabledByProduct(true);
                    break 2;
                }

                $shipmentCartModel->setParcelBoxEnabled(!$categoryModel->getPplDisabledParcelBox() && $shipmentCartModel->getParcelBoxEnabled() );
                $shipmentCartModel->setParcelShopEnabled(!$categoryModel->getPplDisabledParcelShop() && $shipmentCartModel->getParcelShopEnabled() );
                $shipmentCartModel->setAlzaBoxEnabled(!$categoryModel->getPplDisabledAlzaBox() && $shipmentCartModel->getAlzaBoxEnabled() );
            }
        }

        if (!$shipmentCartModel->getParcelShopEnabled() && !$shipmentCartModel->getParcelBoxEnabled() && !$shipmentCartModel->getAlzaBoxEnabled() && $shipmentCartModel->getParcelRequired())
        {
            $shipmentCartModel->setDisabledByRules(true);
        }

        if (!$shipmentCartModel->getParcelShopEnabled() && $shipmentCartModel->getAgeRequired())
        {
            $shipmentCartModel->setDisabledByRules(true);
        }

        // kupony
        $coupons = WC()->cart->get_applied_coupons();
        foreach ($coupons as $coupon)
        {
            $coupon = new \WC_Coupon($coupon);
            if ($coupon->get_id() && $coupon->get_free_shipping())
            {
                $shipmentCartModel->setCost(0);
            }
        }

        return $shipmentCartModel;
    }

    public function supportsDenormalization($data, string $type, ?string $format = null)
    {
        if ($data instanceof ShipmentMethod && $type === CartModel::class) {
            return true;
        }
        return false;
    }
}