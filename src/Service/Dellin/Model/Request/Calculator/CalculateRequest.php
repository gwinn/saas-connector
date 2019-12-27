<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CalculateRequest
 *
 * @package  SaaS\Service\Dellin\Model\Request\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CalculateRequest
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalPoint")
     *
     * @FakeMockField(value="7800000000000000000000000")
     */
    public $derivalPoint;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("derivalDoor")
     *
     * @FakeMockField(value="true")
     */
    public $derivalDoor;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalPoint")
     *
     * @FakeMockField(value="5200000100000000000000000")
     */
    public $arrivalPoint;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("arrivalDoor")
     *
     * @FakeMockField(value="false")
     */
    public $arrivalDoor;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("sizedVolume")
     *
     * @FakeMockField(value="0.5")
     */
    public $sizedVolume;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("sizedWeight")
     *
     * @FakeMockField(value="15.5")
     */
    public $sizedWeight;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("oversizedVolume")
     *
     * @FakeMockField(value="0.8")
     */
    public $oversizedVolume;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("oversizedWeight")
     *
     * @FakeMockField(value="23.1")
     */
    public $oversizedWeight;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("length")
     *
     * @FakeMockField(value="0.5")
     */
    public $length;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("width")
     *
     * @FakeMockField(value="1.1")
     */
    public $width;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("height")
     *
     * @FakeMockField(value="0.9")
     */
    public $height;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("0x9c2acaea110d75ba48fdc7a83c976269")
     *
     * @FakeMockField(value="0.9")
     */
    public $freightUid;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("statedValue")
     *
     * @FakeMockField(value="1000.5")
     */
    public $statedValue;

    /**
     * @var array|string[]
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("packages")
     */
    public $packages;

    /**
     * @var array|string[]
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("derivalServices")
     */
    public $derivalServices;

    /**
     * @var array|string[]
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("arrivalServices")
     */
    public $arrivalServices;

    /**
     * @var array|string[]
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("documentServices")
     */
    public $documentServices;

    /**
     * @var array|DerivalLoading[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Calculator\DerivalLoading>")
     * @Serializer\SerializedName("derivalLoading")
     */
    public $derivalLoading;

    /**
     * @var array|ArrivalUnLoading[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Calculator\ArrivalUnLoading>")
     * @Serializer\SerializedName("arrivalUnLoading")
     */
    public $arrivalUnLoading;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("derivalfixedtimevisit")
     *
     * @FakeMockField(value="true")
     */
    public $derivalFixedTimeVisit;

    /**
     * @var PeriodVisit
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Calculator\PeriodVisit")
     * @Serializer\SerializedName("derivalperiodvisit")
     *
     * @FakeMockField()
     */
    public $derivalPeriodVisit;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("arrivalfixedtimevisit")
     *
     * @FakeMockField(value="true")
     */
   public $arrivalFixedTimeVisit;

    /**
     * @var PeriodVisit
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Calculator\PeriodVisit")
     * @Serializer\SerializedName("arrivalperiodvisit")
     *
     * @FakeMockField()
     */
   public $arrivalPeriodVisit;

   /**
    * Format: YYYY-MM-DD
    *
    * @var string
    *
    * @Serializer\Type("string")
    * @Serializer\SerializedName("calculatedate")
    *
    * @FakeMockField(value="2017-03-21")
    */
   public $calculateDate;

   /**
    * @var string
    *
    * @Serializer\Type("string")
    * @Serializer\SerializedName("calculatedate")
    *
    * @FakeMockField(value="00000000-0000-0000-0000-000000000000")
    */
   public $cauid;

   /**
    * @var int
    *
    * @Serializer\Type("integer")
    * @Serializer\SerializedName("requester")
    *
    * @FakeMockField(value="2")
    */
   public $requester;

   /**
    * @var int
    *
    * @Serializer\Type("integer")
    * @Serializer\SerializedName("packages_count")
    *
    * @FakeMockField(value="3")
    */
   public $packagesCount;

   /**
    * @var int
    *
    * @Serializer\Type("integer")
    * @Serializer\SerializedName("bags_count")
    *
    * @FakeMockField(value="3")
    */
   public $bagsCount;

   /**
    * @var bool
    *
    * @Serializer\Type("boolean")
    * @Serializer\SerializedName("termInsurance")
    *
    * @FakeMockField(value="false")
    */
   public $termInsurance;
}
