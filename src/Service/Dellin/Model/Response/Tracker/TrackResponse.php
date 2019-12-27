<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Tracker;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CalculateResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class TrackResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderNumber")
     *
     * @FakeMockField(value="1234567")
     */
    public $orderNumber;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderDate")
     *
     * @FakeMockField(value="2017-01-15")
     */
    public $orderDate;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("order_id")
     *
     * @FakeMockField(value="123456")
     */
    public $orderId;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ordered_at")
     *
     * @FakeMockField(value="2017-01-16 11:20:05")
     */
    public $orderedAt;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("is_container")
     *
     * @FakeMockField(value="true")
     */
    public $isContainer;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("state")
     *
     * @FakeMockField(value="processing")
     */
    public $state;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("state_name")
     *
     * @FakeMockField(value="В обработке")
     */
    public $stateName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derival_city")
     *
     * @FakeMockField(value="Омск")
     */
    public $derivalCity;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_city")
     *
     * @FakeMockField(value="Самара")
     */
    public $arrivalCity;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("decline_reason")
     *
     * @FakeMockField(value="Опасный груз")
     */
    public $declineReason;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("sf_request_ordered")
     *
     * @FakeMockField(value="false")
     */
    public $sfRequestOrdered;

    /**
     * @var Request|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Tracker\Request")
     * @Serializer\SerializedName("sfrequest")
     */
    public $sfRequest;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("derival_city_id")
     *
     * @FakeMockField(value="8")
     */
    public $derivalCityId;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("derival_terminal_id")
     *
     * @FakeMockField(value="53")
     */
    public $derivalTerminalId;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("arrival_contact_id")
     *
     * @FakeMockField(value="15")
     */
    public $arrivalContactId;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("arrival_city_id")
     *
     * @FakeMockField(value="21")
     */
    public $arrivalCityId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_cc_phones")
     *
     * @FakeMockField(value="8-800-100-8000")
     */
    public $arrivalCcPhones;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_terminal_name")
     *
     * @FakeMockField(value="Санкт-Петербург Офис")
     */
    public $arrivalTerminalName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_terminal_city")
     *
     * @FakeMockField(value="Санкт-Петербург")
     */
    public $arrivalTerminalCity;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_terminal_address")
     *
     * @FakeMockField(value="Внуковская, д.2")
     */
    public $arrivalTerminalAddress;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_terminal_phones")
     *
     * @FakeMockField(value="7 (812) 448-88-88")
     */
    public $arrivalTerminalPhones;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_terminal_email")
     *
     * @FakeMockField(value="pismo@dellin.ru")
     */
    public $arrivalTerminalEmail;

    /**
     * @var array|float[]|null
     *
     * @Serializer\Type("array<float>")
     * @Serializer\SerializedName("arrival_terminal_coordinates")
     */
    public $arrivalTerminalCoordinates;

    /**
     * @var Worktables
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Tracker\Worktables")
     * @Serializer\SerializedName("worktables")
     *
     * @FakeMockField()
     */
    public $worktables;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("air_order_id")
     *
     * @FakeMockField(value="123456")
     */
    public $airOrderId;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("is_air")
     *
     * @FakeMockField(value="false")
     */
    public $isAir;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     *
     * @FakeMockField(value="комментарий")
     */
    public $comment;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("blocked_by_payment")
     *
     * @FakeMockField(value="false")
     */
    public $blockedByPayment;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("blocked_by_blacklist")
     *
     * @FakeMockField(value="false")
     */
    public $blockedByBlacklist;

    /**
     * @var OrderDates
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Tracker\OrderDates")
     * @Serializer\SerializedName("order_dates")
     *
     * @FakeMockField()
     */
    public $orderDates;

    /**
     * @var OrderTimeInDays
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Tracker\OrderTimeInDays")
     * @Serializer\SerializedName("order_time_in_days")
     *
     * @FakeMockField()
     */
    public $orderTimeInDays;

    /**
     * @var array|Document[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Tracker\Document>")
     * @Serializer\SerializedName("documents")
     */
    public $documents;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("ordered_delivery_from_address")
     *
     * @FakeMockField(value="true")
     */
    public $orderedDeliveryFromAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("available_delivery_from_address")
     *
     * @FakeMockField(value="false")
     */
    public $availableDeliveryFromAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("ordered_delivery_to_address")
     *
     * @FakeMockField(value="false")
     */
    public $orderedDeliveryToAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("available_delivery_to_address")
     *
     * @FakeMockField(value="false")
     */
    public $availableDeliveryToAddress;
}
