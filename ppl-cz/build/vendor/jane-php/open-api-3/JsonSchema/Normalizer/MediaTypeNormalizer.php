<?php

namespace PPLCZVendor\Jane\Component\OpenApi3\JsonSchema\Normalizer;

use PPLCZVendor\Jane\Component\JsonSchemaRuntime\Reference;
use PPLCZVendor\Jane\Component\OpenApi3\JsonSchema\Runtime\Normalizer\CheckArray;
use PPLCZVendor\Jane\Component\OpenApi3\JsonSchema\Runtime\Normalizer\ValidatorTrait;
use PPLCZVendor\Symfony\Component\Serializer\Exception\InvalidArgumentException;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use PPLCZVendor\Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class MediaTypeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, $context = []) : bool
    {
        return $type === 'Jane\\Component\\OpenApi3\\JsonSchema\\Model\\MediaType';
    }
    public function supportsNormalization($data, $format = null, $context = []) : bool
    {
        return $data instanceof \PPLCZVendor\Jane\Component\OpenApi3\JsonSchema\Model\MediaType;
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
        $object = new \PPLCZVendor\Jane\Component\OpenApi3\JsonSchema\Model\MediaType();
        if (null === $data || \false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('schema', $data) && $data['schema'] !== null) {
            $value = $data['schema'];
            if (\is_array($data['schema']) and isset($data['schema']['$ref'])) {
                $value = $this->denormalizer->denormalize($data['schema'], 'PPLCZVendor\\Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Reference', 'json', $context);
            } elseif (\is_array($data['schema'])) {
                $value = $this->denormalizer->denormalize($data['schema'], 'PPLCZVendor\\Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Schema', 'json', $context);
            }
            $object->setSchema($value);
            unset($data['schema']);
        } elseif (\array_key_exists('schema', $data) && $data['schema'] === null) {
            $object->setSchema(null);
        }
        if (\array_key_exists('example', $data) && $data['example'] !== null) {
            $object->setExample($data['example']);
            unset($data['example']);
        } elseif (\array_key_exists('example', $data) && $data['example'] === null) {
            $object->setExample(null);
        }
        if (\array_key_exists('examples', $data) && $data['examples'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['examples'] as $key => $value_1) {
                $value_2 = $value_1;
                if (\is_array($value_1) and isset($value_1['$ref'])) {
                    $value_2 = $this->denormalizer->denormalize($value_1, 'PPLCZVendor\\Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Reference', 'json', $context);
                } elseif (\is_array($value_1)) {
                    $value_2 = $this->denormalizer->denormalize($value_1, 'PPLCZVendor\\Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Example', 'json', $context);
                }
                $values[$key] = $value_2;
            }
            $object->setExamples($values);
            unset($data['examples']);
        } elseif (\array_key_exists('examples', $data) && $data['examples'] === null) {
            $object->setExamples(null);
        }
        if (\array_key_exists('encoding', $data) && $data['encoding'] !== null) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['encoding'] as $key_1 => $value_3) {
                $values_1[$key_1] = $this->denormalizer->denormalize($value_3, 'PPLCZVendor\\Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Encoding', 'json', $context);
            }
            $object->setEncoding($values_1);
            unset($data['encoding']);
        } elseif (\array_key_exists('encoding', $data) && $data['encoding'] === null) {
            $object->setEncoding(null);
        }
        foreach ($data as $key_2 => $value_4) {
            if (\preg_match('/^x-/', (string) $key_2)) {
                $object[$key_2] = $value_4;
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
        if (null !== $object->getSchema()) {
            $value = $object->getSchema();
            if (\is_object($object->getSchema())) {
                $value = $this->normalizer->normalize($object->getSchema(), 'json', $context);
            } elseif (\is_object($object->getSchema())) {
                $value = $this->normalizer->normalize($object->getSchema(), 'json', $context);
            }
            $data['schema'] = $value;
        }
        if (null !== $object->getExample()) {
            $data['example'] = $object->getExample();
        }
        if (null !== $object->getExamples()) {
            $values = array();
            foreach ($object->getExamples() as $key => $value_1) {
                $value_2 = $value_1;
                if (\is_object($value_1)) {
                    $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                } elseif (\is_object($value_1)) {
                    $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $values[$key] = $value_2;
            }
            $data['examples'] = $values;
        }
        if (null !== $object->getEncoding()) {
            $values_1 = array();
            foreach ($object->getEncoding() as $key_1 => $value_3) {
                $values_1[$key_1] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['encoding'] = $values_1;
        }
        foreach ($object as $key_2 => $value_4) {
            if (\preg_match('/^x-/', (string) $key_2)) {
                $data[$key_2] = $value_4;
            }
        }
        return $data;
    }
}
