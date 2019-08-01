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
    protected $country;

    /**
     * @var string|null $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @FakeMockField()
     */
    protected $city;

    /**
     * @var string|null $cityType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city_type")
     *
     * @FakeMockField()
     */
    protected $cityType;

    /**
     * @var string|null $state
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state")
     *
     * @FakeMockField()
     */
    protected $state;

    /**
     * @var string|null $stateType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state_type")
     *
     * @FakeMockField()
     */
    protected $stateType;

    /**
     * @var string|null $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField()
     */
    protected $phone;

    /**
     * @var string|null $surname
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("surname")
     *
     * @FakeMockField()
     */
    protected $surname;

    /**
     * @var string|null $middlename
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("middlename")
     *
     * @FakeMockField()
     */
    protected $middlename;

    /**
     * @var string|null $fullName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_name")
     *
     * @FakeMockField()
     */
    protected $fullName;

    /**
     * @var string|null $fullLocalityName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_locality_name")
     *
     * @FakeMockField()
     */
    protected $fullLocalityName;

    /**
     * @var string|null $fullDeliveryAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_delivery_address")
     *
     * @FakeMockField()
     */
    protected $fullDeliveryAddress;

    /**
     * @var string|null $addressForGis
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address_for_gis")
     *
     * @FakeMockField()
     */
    protected $addressForGis;

    /**
     * @var bool|null $locationValid
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("location_valid")
     *
     * @FakeMockField()
     */
    protected $locationValid;

    /**
     * @var string|null $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @FakeMockField()
     */
    protected $address;

    /**
     * @var string|null $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     *
     * @FakeMockField()
     */
    protected $zip;

    /**
     * @var string|null $street
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     *
     * @FakeMockField()
     */
    protected $street;

    /**
     * @var string|null $streetType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street_type")
     *
     * @FakeMockField()
     */
    protected $streetType;

    /**
     * @var string|null $area
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("area")
     *
     * @FakeMockField()
     */
    protected $area;

    /**
     * @var string|null $areaType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("area_type")
     *
     * @FakeMockField()
     */
    protected $areaType;

    /**
     * @var string|null $settlement
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("settlement")
     *
     * @FakeMockField()
     */
    protected $settlement;

    /**
     * @var string|null $settlementType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("settlement_type")
     *
     * @FakeMockField()
     */
    protected $settlementType;

    /**
     * @var string|null $house
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("house")
     *
     * @FakeMockField()
     */
    protected $house;

    /**
     * @var string|null $flat
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("flat")
     *
     * @FakeMockField()
     */
    protected $flat;

    /**
     * @var bool|null $isKladr
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_kladr")
     *
     * @FakeMockField()
     */
    protected $isKladr;

    /**
     * @var string|null $kladrCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("kladr_code")
     *
     * @FakeMockField()
     */
    protected $kladrCode;

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
    public function getCityType(): ?string
    {
        return $this->cityType;
    }

    /**
     * @param null|string $cityType
     */
    public function setCityType(?string $cityType): void
    {
        $this->cityType = $cityType;
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
    public function getStateType(): ?string
    {
        return $this->stateType;
    }

    /**
     * @param null|string $stateType
     */
    public function setStateType(?string $stateType): void
    {
        $this->stateType = $stateType;
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
    public function getStreetType(): ?string
    {
        return $this->streetType;
    }

    /**
     * @param null|string $streetType
     */
    public function setStreetType(?string $streetType): void
    {
        $this->streetType = $streetType;
    }

    /**
     * @return null|string
     */
    public function getArea(): ?string
    {
        return $this->area;
    }

    /**
     * @param null|string $area
     */
    public function setArea(?string $area): void
    {
        $this->area = $area;
    }

    /**
     * @return null|string
     */
    public function getAreaType(): ?string
    {
        return $this->areaType;
    }

    /**
     * @param null|string $areaType
     */
    public function setAreaType(?string $areaType): void
    {
        $this->areaType = $areaType;
    }

    /**
     * @return null|string
     */
    public function getSettlement(): ?string
    {
        return $this->settlement;
    }

    /**
     * @param null|string $settlement
     */
    public function setSettlement(?string $settlement): void
    {
        $this->settlement = $settlement;
    }

    /**
     * @return null|string
     */
    public function getSettlementType(): ?string
    {
        return $this->settlementType;
    }

    /**
     * @param null|string $settlementType
     */
    public function setSettlementType(?string $settlementType): void
    {
        $this->settlementType = $settlementType;
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
     * @return bool|null
     */
    public function getisKladr(): ?bool
    {
        return $this->isKladr;
    }

    /**
     * @param bool|null $isKladr
     */
    public function setIsKladr(?bool $isKladr): void
    {
        $this->isKladr = $isKladr;
    }

    /**
     * @return null|string
     */
    public function getKladrCode(): ?string
    {
        return $this->kladrCode;
    }

    /**
     * @param null|string $kladrCode
     */
    public function setKladrCode(?string $kladrCode): void
    {
        $this->kladrCode = $kladrCode;
    }
}
