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
 * Class Order
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Order
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderNumber")
     */
    public $orderNumber;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderDate")
     */
    public $orderDate;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderId")
     *
     * @FakeMockField(value="39513109")
     */
    public $orderId;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderedAt")
     *
     * @FakeMockField(value="2019-11-11 08:16:36")
     */
    public $orderedAt;

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
     * @Serializer\SerializedName("stateName")
     *
     * @FakeMockField(value="В обработке")
     */
    public $stateName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("stateDate")
     */
    public $stateDate;

    /**
     * @var boolean
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("returnState")
     */
    public $returnState;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("returnReason")
     */
    public $returnReason;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("returnDate")
     */
    public $returnDate;

    /**
     * @var DerivalArrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\DerivalArrival")
     * @Serializer\SerializedName("derival")
     *
     * @FakeMockField()
     */
    public $derival;

    /**
     * @var DerivalArrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\DerivalArrival")
     * @Serializer\SerializedName("arrival")
     *
     * @FakeMockField()
     */
    public $arrival;

    /**
     * @var OrdersMember
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\OrdersMember")
     * @Serializer\SerializedName("sender")
     *
     * @FakeMockField()
     */
    public $sender;

    /**
     * @var OrdersMember
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\OrdersMember")
     * @Serializer\SerializedName("receiver")
     *
     * @FakeMockField()
     */
    public $receiver;

    /**
     * @var OrdersMember
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\OrdersMember")
     * @Serializer\SerializedName("payer")
     *
     * @FakeMockField()
     */
    public $payer;

    /**
     * @var Freight
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Freight")
     * @Serializer\SerializedName("freight")
     *
     * @FakeMockField()
     */
    public $freight;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isAir")
     *
     * @FakeMockField(value="false")
     */
    public $isAir;

    /**
     * @var Air
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Air")
     * @Serializer\SerializedName("air")
     *
     * @FakeMockField()
     */
    public $air;

    /**
     * @var array|Lock[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Order\Lock>")
     * @Serializer\SerializedName("locks")
     *
     * @FakeMockField()
     */
    public $locks;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("totalSum")
     *
     * @FakeMockField(value="0.0")
     */
    public $totalSum;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isPaid")
     *
     * @FakeMockField(value="true")
     */
    public $isPaid;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isPreorder")
     *
     * @FakeMockField(value="false")
     */
    public $isPreorder;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("produceDate")
     *
     * @FakeMockField(value="2019-11-20")
     */
    public $produceDate;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("declineReason")
     */
    public $declineReason;

    /**
     * @var OrderDates
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\OrderDates")
     * @Serializer\SerializedName("orderDates")
     *
     * @FakeMockField()
     */
    public $orderDates;

    /**
     * @var OrderTimeInDays
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\OrderTimeInDays")
     * @Serializer\SerializedName("orderTimeInDays")
     *
     * @FakeMockField()
     */
    public $orderTimeInDays;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("orderedDeliveryFromAddress")
     *
     * @FakeMockField(value="true")
     */
    public $orderedDeliveryFromAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("availableDeliveryFromAddress")
     *
     * @FakeMockField(value="false")
     */
    public $availableDeliveryFromAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("orderedDeliveryToAddress")
     *
     * @FakeMockField(value="true")
     */
    public $orderedDeliveryToAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("availableDeliveryToAddress")
     *
     * @FakeMockField(value="false")
     */
    public $availableDeliveryToAddress;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isFavorite")
     *
     * @FakeMockField(value="false")
     */
    public $isFavorite;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isContainer")
     *
     * @FakeMockField(value="false")
     */
    public $isContainer;

    /**
     * @var Request|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Request")
     * @Serializer\SerializedName("sfrequest")
     *
     * @FakeMockField()
     */
    public $sfRequest;

    /**
     * @var array|Document[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Order\Document>")
     * @Serializer\SerializedName("documents")
     *
     * @FakeMockField()
     */
    public $documents;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentState")
     *
     * @FakeMockField(value="paid")
     */
    public $paymentState;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     */
    public $note;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("documentsReturnDate")
     */
    public $documentsReturnDate;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("withWebOrder")
     */
    public $withWebOrder;
}
