<?php 
// phpcs:ignoreFile WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
// phpcs:ignoreFile WordPress.WP.AlternativeFunctions.file_system_operations_fwrite
// phpcs:ignoreFile WordPress.WP.AlternativeFunctions.file_system_operations_fclose
// phpcs:ignoreFile WordPress.WP.AlternativeFunctions.file_system_operations_fopen
// phpcs:ignoreFile WordPress.Security.EscapeOutput.ExceptionNotEscaped            

/**
 * EpsApiMyApi2WebModelsShipmentBatchBackAddressModel
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  PPLCZCPL
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CPL
 *
 * **Changelog**    * 2024-08-22 - SPRJ-13791 - validace PRTE / PRBC externích čísel - nelze použít najednou    - /shipment/batch    * 2024-07-01 - SPRJ-13838 - přidání    - /customer/address    * 2023-11-23 - SPRJ-12703 - CPL - /shipment - timestamp    - /shipment - Rozšíření výstupu o LastUpdateDate.    * 2023-07-13 - SPRJ-11888 - přidání    - /codelist/status - číselník statusů    * 2023-07-13 - SPRJ-11953 - přidání    - /order/cancel - storno objednávky
 *
 * The version of the OpenAPI document: v1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace PPLCZCPL\Model;

use \ArrayAccess;
use \PPLCZCPL\ObjectSerializer;

/**
 * EpsApiMyApi2WebModelsShipmentBatchBackAddressModel Class Doc Comment
 *
 * @category Class
 * @description BackAddressModel
 * @package  PPLCZCPL
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class EpsApiMyApi2WebModelsShipmentBatchBackAddressModel implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Eps.Api.MyApi2.Web.Models.ShipmentBatch.BackAddressModel';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'name2' => 'string',
        'street' => 'string',
        'city' => 'string',
        'zip_code' => 'string',
        'country' => 'string',
        'contact' => 'string',
        'phone' => 'string',
        'email' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'name' => null,
        'name2' => null,
        'street' => null,
        'city' => null,
        'zip_code' => null,
        'country' => null,
        'contact' => null,
        'phone' => null,
        'email' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'name2' => 'name2',
        'street' => 'street',
        'city' => 'city',
        'zip_code' => 'zipCode',
        'country' => 'country',
        'contact' => 'contact',
        'phone' => 'phone',
        'email' => 'email'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'name2' => 'setName2',
        'street' => 'setStreet',
        'city' => 'setCity',
        'zip_code' => 'setZipCode',
        'country' => 'setCountry',
        'contact' => 'setContact',
        'phone' => 'setPhone',
        'email' => 'setEmail'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'name2' => 'getName2',
        'street' => 'getStreet',
        'city' => 'getCity',
        'zip_code' => 'getZipCode',
        'country' => 'getCountry',
        'contact' => 'getContact',
        'phone' => 'getPhone',
        'email' => 'getEmail'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = $data['name'] ?? null;
        $this->container['name2'] = $data['name2'] ?? null;
        $this->container['street'] = $data['street'] ?? null;
        $this->container['city'] = $data['city'] ?? null;
        $this->container['zip_code'] = $data['zip_code'] ?? null;
        $this->container['country'] = $data['country'] ?? null;
        $this->container['contact'] = $data['contact'] ?? null;
        $this->container['phone'] = $data['phone'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['name']) && (mb_strlen($this->container['name']) > 50)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['name2']) && (mb_strlen($this->container['name2']) > 50)) {
            $invalidProperties[] = "invalid value for 'name2', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['street']) && (mb_strlen($this->container['street']) > 60)) {
            $invalidProperties[] = "invalid value for 'street', the character length must be smaller than or equal to 60.";
        }

        if (!is_null($this->container['city']) && (mb_strlen($this->container['city']) > 50)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 50.";
        }

        if ($this->container['zip_code'] === null) {
            $invalidProperties[] = "'zip_code' can't be null";
        }
        if ((mb_strlen($this->container['zip_code']) > 10)) {
            $invalidProperties[] = "invalid value for 'zip_code', the character length must be smaller than or equal to 10.";
        }

        if ((mb_strlen($this->container['zip_code']) < 1)) {
            $invalidProperties[] = "invalid value for 'zip_code', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if ((mb_strlen($this->container['country']) < 1)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['contact']) && (mb_strlen($this->container['contact']) > 50)) {
            $invalidProperties[] = "invalid value for 'contact', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) > 30)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be smaller than or equal to 30.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 50)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 50.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Název firmy / jméno  Délka: 50
     *
     * @return self
     */
    public function setName($name)
    {
        if (!is_null($name) && (mb_strlen($name) > 50)) {
            throw new \InvalidArgumentException('invalid length for $name when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 50.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets name2
     *
     * @return string|null
     */
    public function getName2()
    {
        return $this->container['name2'];
    }

    /**
     * Sets name2
     *
     * @param string|null $name2 Dodatek (Název firmy / jméno)  Délka: 50
     *
     * @return self
     */
    public function setName2($name2)
    {
        if (!is_null($name2) && (mb_strlen($name2) > 50)) {
            throw new \InvalidArgumentException('invalid length for $name2 when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 50.');
        }

        $this->container['name2'] = $name2;

        return $this;
    }

    /**
     * Gets street
     *
     * @return string|null
     */
    public function getStreet()
    {
        return $this->container['street'];
    }

    /**
     * Sets street
     *
     * @param string|null $street Ulice Délka: 60
     *
     * @return self
     */
    public function setStreet($street)
    {
        if (!is_null($street) && (mb_strlen($street) > 60)) {
            throw new \InvalidArgumentException('invalid length for $street when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 60.');
        }

        $this->container['street'] = $street;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string|null $city Město Délka: 50
     *
     * @return self
     */
    public function setCity($city)
    {
        if (!is_null($city) && (mb_strlen($city) > 50)) {
            throw new \InvalidArgumentException('invalid length for $city when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 50.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets zip_code
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->container['zip_code'];
    }

    /**
     * Sets zip_code
     *
     * @param string $zip_code PSČ Délka: 10
     *
     * @return self
     */
    public function setZipCode($zip_code)
    {
        if ((mb_strlen($zip_code) > 10)) {
            throw new \InvalidArgumentException('invalid length for $zip_code when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 10.');
        }
        if ((mb_strlen($zip_code) < 1)) {
            throw new \InvalidArgumentException('invalid length for $zip_code when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be bigger than or equal to 1.');
        }

        $this->container['zip_code'] = $zip_code;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country Kód země podle číselníku - /codelist/country Délka: 2
     *
     * @return self
     */
    public function setCountry($country)
    {

        if ((mb_strlen($country) < 1)) {
            throw new \InvalidArgumentException('invalid length for $country when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be bigger than or equal to 1.');
        }

        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets contact
     *
     * @return string|null
     */
    public function getContact()
    {
        return $this->container['contact'];
    }

    /**
     * Sets contact
     *
     * @param string|null $contact Kontaktní osoba. Délka: 50
     *
     * @return self
     */
    public function setContact($contact)
    {
        if (!is_null($contact) && (mb_strlen($contact) > 50)) {
            throw new \InvalidArgumentException('invalid length for $contact when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 50.');
        }

        $this->container['contact'] = $contact;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string|null $phone Telefon Délka: 30
     *
     * @return self
     */
    public function setPhone($phone)
    {
        if (!is_null($phone) && (mb_strlen($phone) > 30)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 30.');
        }

        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email Email Délka: 50
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (!is_null($email) && (mb_strlen($email) > 50)) {
            throw new \InvalidArgumentException('invalid length for $email when calling EpsApiMyApi2WebModelsShipmentBatchBackAddressModel., must be smaller than or equal to 50.');
        }

        $this->container['email'] = $email;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializerPpl::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializerPpl::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializerPpl::sanitizeForSerialization($this));
    }
}


