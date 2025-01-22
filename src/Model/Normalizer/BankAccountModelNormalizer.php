<?php

namespace PPLCZ\Model\Normalizer;

use PPLCZVendor\Jane\Component\JsonSchemaRuntime\Reference;
use PPLCZ\Model\Runtime\Normalizer\CheckArray;
use PPLCZ\Model\Runtime\Normalizer\ValidatorTrait;
use PPLCZVendor\Symfony\Component\Serializer\Exception\InvalidArgumentException;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class BankAccountModelNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'PPLCZ\\Model\\Model\\BankAccountModel';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'PPLCZ\\Model\\Model\\BankAccountModel';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \PPLCZ\Model\Model\BankAccountModel();
        if (\array_key_exists('id', $data) && \is_int($data['id'])) {
            $data['id'] = (double) $data['id'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('accountName', $data) && $data['accountName'] !== null) {
            $object->setAccountName($data['accountName']);
            unset($data['accountName']);
        }
        elseif (\array_key_exists('accountName', $data) && $data['accountName'] === null) {
            $object->setAccountName(null);
        }
        if (\array_key_exists('account', $data) && $data['account'] !== null) {
            $object->setAccount($data['account']);
            unset($data['account']);
        }
        elseif (\array_key_exists('account', $data) && $data['account'] === null) {
            $object->setAccount(null);
        }
        if (\array_key_exists('accountPrefix', $data) && $data['accountPrefix'] !== null) {
            $object->setAccountPrefix($data['accountPrefix']);
            unset($data['accountPrefix']);
        }
        elseif (\array_key_exists('accountPrefix', $data) && $data['accountPrefix'] === null) {
            $object->setAccountPrefix(null);
        }
        if (\array_key_exists('bankCode', $data) && $data['bankCode'] !== null) {
            $object->setBankCode($data['bankCode']);
            unset($data['bankCode']);
        }
        elseif (\array_key_exists('bankCode', $data) && $data['bankCode'] === null) {
            $object->setBankCode(null);
        }
        if (\array_key_exists('iban', $data) && $data['iban'] !== null) {
            $object->setIban($data['iban']);
            unset($data['iban']);
        }
        elseif (\array_key_exists('iban', $data) && $data['iban'] === null) {
            $object->setIban(null);
        }
        if (\array_key_exists('swift', $data) && $data['swift'] !== null) {
            $object->setSwift($data['swift']);
            unset($data['swift']);
        }
        elseif (\array_key_exists('swift', $data) && $data['swift'] === null) {
            $object->setSwift(null);
        }
        if (\array_key_exists('currency', $data) && $data['currency'] !== null) {
            $object->setCurrency($data['currency']);
            unset($data['currency']);
        }
        elseif (\array_key_exists('currency', $data) && $data['currency'] === null) {
            $object->setCurrency(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('accountName') && null !== $object->getAccountName()) {
            $data['accountName'] = $object->getAccountName();
        }
        if ($object->isInitialized('account') && null !== $object->getAccount()) {
            $data['account'] = $object->getAccount();
        }
        if ($object->isInitialized('accountPrefix') && null !== $object->getAccountPrefix()) {
            $data['accountPrefix'] = $object->getAccountPrefix();
        }
        if ($object->isInitialized('bankCode') && null !== $object->getBankCode()) {
            $data['bankCode'] = $object->getBankCode();
        }
        if ($object->isInitialized('iban') && null !== $object->getIban()) {
            $data['iban'] = $object->getIban();
        }
        if ($object->isInitialized('swift') && null !== $object->getSwift()) {
            $data['swift'] = $object->getSwift();
        }
        if ($object->isInitialized('currency') && null !== $object->getCurrency()) {
            $data['currency'] = $object->getCurrency();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : ?array
    {
        return array('PPLCZ\\Model\\Model\\BankAccountModel' => false);
    }
}