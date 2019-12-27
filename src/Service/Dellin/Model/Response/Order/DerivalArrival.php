<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class DerivalArrival
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DerivalArrival
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("city")
     *
     * @FakeMockField(value="Омск г (Омская обл.)")
     */
    public $city;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("cityId")
     *
     * @FakeMockField(value="43")
     */
    public $cityId;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("cityCode")
     *
     * @FakeMockField(value="5500000100000000000000000")
     */
    public $cityCode;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("address")
     *
     * @FakeMockField(value="Омск г (Омская обл.), 22 Партсъезда ул, д. 4")
     */
    public $address;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("addressCode")
     */
    public $addressCode;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalName")
     *
     * @FakeMockField(value="Омск")
     */
    public $terminalName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalAddress")
     *
     * @FakeMockField(value="644031, Омская обл, Омск г, Омская ул, дом № 221")
     */
    public $terminalAddress;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("terminalId")
     *
     * @FakeMockField(value="53")
     */
    public $terminalId;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalCity")
     *
     * @FakeMockField(value="Омск")
     */
    public $terminalCity;

    /**
     * @var array|float[]|null
     *
     * @Serializer\Type("array<float>")
     * @Serializer\SerializedName("terminalCoordinates")
     */
    public $terminalCoordinates;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalEmail")
     */
    public $terminalEmail;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalPhones")
     */
    public $terminalPhones;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("callCenterPhones")
     */
    public $callCenterPhones;

    /**
     * @var TerminalWorktables
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\TerminalWorktables")
     * @Serializer\SerializedName("terminalWorktables")
     *
     * @FakeMockField()
     */
    public $terminalWorktables;
}
