<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CalculateResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CalculateResponse
{
    /**
     * @var Derival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Derival")
     * @Serializer\SerializedName("derival")
     *
     * @FakeMockField()
     */
    public $derival;

    /**
     * @var Intercity
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Intercity")
     * @Serializer\SerializedName("intercity")
     *
     * @FakeMockField()
     */
    public $intercity;

    /**
     * @var Small
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Small")
     * @Serializer\SerializedName("small")
     *
     * @FakeMockField()
     */
    public $small;

    /**
     * @var Air
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Air")
     * @Serializer\SerializedName("air")
     *
     * @FakeMockField()
     */
    public $air;

    /**
     * @var Express
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Express")
     * @Serializer\SerializedName("express")
     *
     * @FakeMockField()
     */
    public $express;

    /**
     * @var Arrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Arrival")
     * @Serializer\SerializedName("arrival")
     *
     * @FakeMockField()
     */
    public $arrival;

    /**
     * @var Letter
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Letter")
     * @Serializer\SerializedName("letter")
     *
     * @FakeMockField()
     */
    public $letter;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="13657.5")
     */
    public $price;

    /**
     * @var Time
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Time")
     * @Serializer\SerializedName("time")
     *
     * @FakeMockField()
     */
    public $time;

    /**
     * @var LoadUnload
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\LoadUnload")
     * @Serializer\SerializedName("loadUnload")
     *
     * @FakeMockField()
     */
    public $loadUnload;

    /**
     * @var Packages
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Packages")
     * @Serializer\SerializedName("packages")
     *
     * @FakeMockField()
     */
    public $packages;

    /**
     * @var OrderDates
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\OrderDates")
     * @Serializer\SerializedName("order_dates")
     *
     * @FakeMockField()
     */
    public $orderDates;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("delivery_term")
     *
     * @FakeMockField(value="1")
     */
    public $deliveryTerm;

    /**
     * @var ShippingDocuments
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\ShippingDocuments")
     * @Serializer\SerializedName("shipping_documents")
     *
     * @FakeMockField()
     */
    public $shippingDocuments;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("insurance")
     *
     * @FakeMockField(value="350.0")
     */
    public $insurance;

    /**
     * @var InsuranceComponents
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\InsuranceComponents")
     * @Serializer\SerializedName("insuranceComponents")
     *
     * @FakeMockField()
     */
    public $insuranceComponents;

    /**
     * @var Notify
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Notify")
     * @Serializer\SerializedName("notify")
     *
     * @FakeMockField()
     */
    public $notify;
}
