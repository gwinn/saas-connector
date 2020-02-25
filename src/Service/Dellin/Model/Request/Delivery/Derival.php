<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Derival
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Derival
{
    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("produceDate")
     *
     * @FakeMockField(value="2018-02-15")
     */
    public $produceDate;

    /**
     * @var PickupParams|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\PickupParams")
     * @Serializer\SerializedName("pickupParams")
     */
    public $pickupParams;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("variant")
     *
     * @FakeMockField(value="terminal")
     */
    public $variant;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("payer")
     *
     * @FakeMockField(value="sender")
     */
    public $payer;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalID")
     *
     * @FakeMockField(value="23")
     */
    public $terminalId;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("addressID")
     *
     * @FakeMockField(value="457824578")
     */
    public $addressId;

    /**
     * @var Address|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Address")
     * @Serializer\SerializedName("address")
     */
    public $address;

    /**
     * @var AdditionalAddress|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\AdditionalAddress")
     * @Serializer\SerializedName("additionalAddress")
     */
    public $additionalAddress;

    /**
     * @var Time|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Time")
     * @Serializer\SerializedName("time")
     */
    public $time;

    /**
     * @var Handling|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Handling")
     * @Serializer\SerializedName("handling")
     */
    public $handling;

    /**
     * @var array|string[]|null
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("requirements")
     */
    public $requirements;
}
