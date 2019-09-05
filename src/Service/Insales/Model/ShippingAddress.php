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
use SaaS\Service\Insales\Model\Traits;

/**
 * Class ShippingAddress
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ShippingAddress
{
    use Traits\Id;
    use Traits\Name;

    /**
     * @var string|null $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     *
     * @FakeMockField()
     */
    public $country;

    /**
     * @var string|null $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @FakeMockField()
     */
    public $city;

    /**
     * @var string|null $state
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state")
     *
     * @FakeMockField()
     */
    public $state;

    /**
     * @var string|null $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField()
     */
    public $phone;

    /**
     * @var string|null $surname
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("surname")
     *
     * @FakeMockField()
     */
    public $surname;

    /**
     * @var string|null $middlename
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("middlename")
     *
     * @FakeMockField()
     */
    public $middlename;

    /**
     * @var string|null $fullName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_name")
     *
     * @FakeMockField()
     */
    public $fullName;

    /**
     * @var string|null $fullLocalityName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_locality_name")
     *
     * @FakeMockField()
     */
    public $fullLocalityName;

    /**
     * @var string|null $fullDeliveryAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_delivery_address")
     *
     * @FakeMockField()
     */
    public $fullDeliveryAddress;

    /**
     * @var string|null $addressForGis
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address_for_gis")
     *
     * @FakeMockField()
     */
    public $addressForGis;

    /**
     * @var bool|null $locationValid
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("location_valid")
     *
     * @FakeMockField()
     */
    public $locationValid;

    /**
     * @var string|null $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @FakeMockField()
     */
    public $address;

    /**
     * @var string|null $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     *
     * @FakeMockField()
     */
    public $zip;

    /**
     * @var string|null $street
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     *
     * @FakeMockField()
     */
    public $street;

    /**
     * @var string|null $house
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("house")
     *
     * @FakeMockField()
     */
    public $house;

    /**
     * @var string|null $flat
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("flat")
     *
     * @FakeMockField()
     */
    public $flat;

    /**
     * @var array|null $fieldsValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values")
     */
    public $fieldsValues = [];

    /**
     * @var Location $location
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Location")
     * @JMS\SerializedName("location")
     *
     * @FakeMockField()
     */
    public $location;

    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return null|string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return null|string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param null|string $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return null|string
     */
    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    /**
     * @param null|string $middlename
     */
    public function setMiddlename(?string $middlename): void
    {
        $this->middlename = $middlename;
    }

    /**
     * @return null|string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param null|string $fullName
     */
    public function setFullName(?string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return null|string
     */
    public function getFullLocalityName(): ?string
    {
        return $this->fullLocalityName;
    }

    /**
     * @param null|string $fullLocalityName
     */
    public function setFullLocalityName(?string $fullLocalityName): void
    {
        $this->fullLocalityName = $fullLocalityName;
    }

    /**
     * @return null|string
     */
    public function getFullDeliveryAddress(): ?string
    {
        return $this->fullDeliveryAddress;
    }

    /**
     * @param null|string $fullDeliveryAddress
     */
    public function setFullDeliveryAddress(?string $fullDeliveryAddress): void
    {
        $this->fullDeliveryAddress = $fullDeliveryAddress;
    }

    /**
     * @return null|string
     */
    public function getAddressForGis(): ?string
    {
        return $this->addressForGis;
    }

    /**
     * @param null|string $addressForGis
     */
    public function setAddressForGis(?string $addressForGis): void
    {
        $this->addressForGis = $addressForGis;
    }

    /**
     * @return bool|null
     */
    public function getLocationValid(): ?bool
    {
        return $this->locationValid;
    }

    /**
     * @param bool|null $locationValid
     */
    public function setLocationValid(?bool $locationValid): void
    {
        $this->locationValid = $locationValid;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return null|string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param null|string $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return null|string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param null|string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return null|string
     */
    public function getHouse(): ?string
    {
        return $this->house;
    }

    /**
     * @param null|string $house
     */
    public function setHouse(?string $house): void
    {
        $this->house = $house;
    }

    /**
     * @return null|string
     */
    public function getFlat(): ?string
    {
        return $this->flat;
    }

    /**
     * @param null|string $flat
     */
    public function setFlat(?string $flat): void
    {
        $this->flat = $flat;
    }

    /**
     * @return array|null
     */
    public function getFieldsValues(): ?array
    {
        return $this->fieldsValues;
    }

    /**
     * @param array|null $fieldsValues
     */
    public function setFieldsValues(?array $fieldsValues): void
    {
        $this->fieldsValues = $fieldsValues;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }
}
