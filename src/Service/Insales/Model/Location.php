<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;

/**
 * Class Location
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Location
{
    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var string $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     *
     * @FakeMockField()
     */
    public $country;

    /**
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @FakeMockField()
     */
    public $city;

    /**
     * @var string $cityType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city_type")
     *
     * @FakeMockField()
     */
    public $cityType;

    /**
     * @var string $state
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state")
     *
     * @FakeMockField()
     */
    public $state;

    /**
     * @var string $stateType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state_type")
     *
     * @FakeMockField()
     */
    public $stateType;

    /**
     * @var string $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField()
     */
    public $phone;

    /**
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @FakeMockField()
     */
    public $name;

    /**
     * @var string $surname
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("surname")
     *
     * @FakeMockField()
     */
    public $surname;

    /**
     * @var string $middlename
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("middlename")
     *
     * @FakeMockField()
     */
    public $middlename;

    /**
     * @var string $fullName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_name")
     *
     * @FakeMockField()
     */
    public $fullName;

    /**
     * @var string $fullLocalityName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_locality_name")
     *
     * @FakeMockField()
     */
    public $fullLocalityName;

    /**
     * @var string $fullDeliveryAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_delivery_address")
     *
     * @FakeMockField()
     */
    public $fullDeliveryAddress;

    /**
     * @var string $addressForGis
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address_for_gis")
     *
     * @FakeMockField()
     */
    public $addressForGis;

    /**
     * @var bool $locationValid
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("location_valid")
     *
     * @FakeMockField()
     */
    public $locationValid;

    /**
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @FakeMockField()
     */
    public $address;

    /**
     * @var string $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     *
     * @FakeMockField()
     */
    public $zip;

    /**
     * @var string $street
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     *
     * @FakeMockField()
     */
    public $street;

    /**
     * @var string $streetType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street_type")
     *
     * @FakeMockField()
     */
    public $streetType;

    /**
     * @var string $area
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("area")
     *
     * @FakeMockField()
     */
    public $area;

    /**
     * @var string $areaType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("area_type")
     *
     * @FakeMockField()
     */
    public $areaType;

    /**
     * @var string $settlement
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("settlement")
     *
     * @FakeMockField()
     */
    public $settlement;

    /**
     * @var string $settlementType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("settlement_type")
     *
     * @FakeMockField()
     */
    public $settlementType;

    /**
     * @var string $house
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("house")
     *
     * @FakeMockField()
     */
    public $house;

    /**
     * @var string $flat
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("flat")
     *
     * @FakeMockField()
     */
    public $flat;

    /**
     * @var bool $isKladr
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_kladr")
     *
     * @FakeMockField()
     */
    public $isKladr;

    /**
     * @var string $kladrCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("kladr_code")
     *
     * @FakeMockField()
     */
    public $kladrCode;
}
