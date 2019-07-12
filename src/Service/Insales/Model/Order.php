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
 * Class Order
 *
 * @package  SaaS\Service\Insales\Model
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
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var string $key
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("key")
     *
     * @FakeMockField(faker="md5")
     */
    public $key;

    /**
     * @var int $number
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("number")
     *
     * @FakeMockField()
     */
    public $number;

    /**
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * @var string $acceptedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("accepted_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $acceptedAt;

    /**
     * @var string $deliveredAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivered_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $deliveredAt;

    /**
     * @var string $paidAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("paid_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $paidAt;

    /**
     * @var float $totalPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("total_price")
     *
     * @FakeMockField()
     */
    public $totalPrice;

    /**
     * @var float $itemsPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("items_price")
     *
     * @FakeMockField()
     */
    public $itemsPrice;

    /**
     * @var string $comment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comment")
     *
     * @FakeMockField()
     */
    public $comment;

    /**
     * @var string $deliveryTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_title")
     *
     * @FakeMockField()
     */
    public $deliveryTitle;

    /**
     * @var string $deliveryDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_description")
     *
     * @FakeMockField()
     */
    public $deliveryDescription;

    /**
     * @var float $deliveryPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("delivery_price")
     *
     * @FakeMockField()
     */
    public $deliveryPrice;

    /**
     * @var float $fullDeliveryPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_delivery_price")
     *
     * @FakeMockField()
     */
    public $fullDeliveryPrice;

    /**
     * @var string $paymentTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_title")
     *
     * @FakeMockField()
     */
    public $paymentTitle;

    /**
     * @var string $paymentDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_description")
     *
     * @FakeMockField()
     */
    public $paymentDescription;

    /**
     * @var string $firstReferer
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_referer")
     *
     * @FakeMockField()
     */
    public $firstReferer;

    /**
     * @var string $firstCurrentLocation
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_current_location")
     *
     * @FakeMockField()
     */
    public $firstCurrentLocation;

    /**
     * @var string $firstQuery
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_query")
     *
     * @FakeMockField()
     */
    public $firstQuery;

    /**
     * @var string $firstSourceDomain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_source_domain")
     *
     * @FakeMockField()
     */
    public $firstSourceDomain;

    /**
     * @var string $firstSource
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_source")
     *
     * @FakeMockField()
     */
    public $firstSource;

    /**
     * @var string $referer
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("referer")
     *
     * @FakeMockField()
     */
    public $referer;

    /**
     * @var string $currentLocation
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("current_location")
     *
     * @FakeMockField()
     */
    public $currentLocation;

    /**
     * @var string $query
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("query")
     *
     * @FakeMockField()
     */
    public $query;

    /**
     * @var string $sourceDomain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("source_domain")
     *
     * @FakeMockField()
     */
    public $sourceDomain;

    /**
     * @var string $source
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("source")
     *
     * @FakeMockField()
     */
    public $source;

    /**
     * @var string $fulfillmentStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fulfillment_status")
     *
     * @FakeMockField()
     */
    public $fulfillmentStatus;

    /**
     * @var CustomStatus $customStatus
     *
     * @JMS\Type("SaaS\Service\Insales\Model\CustomStatus")
     * @JMS\SerializedName("custom_status")
     *
     * @FakeMockField()
     */
    public $customStatus;

    /**
     * @var string $financialStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("financial_status")
     *
     * @FakeMockField()
     */
    public $financialStatus;

    /**
     * @var string $deliveryDate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_date")
     *
     * @FakeMockField(faker="date")
     */
    public $deliveryDate;

    /**
     * @var string $deliveryFromHour
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_from_hour")
     *
     * @FakeMockField(faker="numberBetween", arguments={1, 24})
     */
    public $deliveryFromHour;

    /**
     * @var string $deliveryToHour
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_to_hour")
     *
     * @FakeMockField(faker="numberBetween", arguments={1, 24})
     */
    public $deliveryToHour;

    /**
     * @var int $deliveryVariantId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("delivery_variant_id")
     *
     * @FakeMockField()
     */
    public $deliveryVariantId;

    /**
     * @var int $paymentGatewayId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("payment_gateway_id")
     *
     * @FakeMockField()
     */
    public $paymentGatewayId;

    /**
     * @var float $margin
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("margin")
     *
     * @FakeMockField()
     */
    public $margin;

    /**
     * @var int $clientTransactionId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("client_transaction_id")
     *
     * @FakeMockField()
     */
    public $clientTransactionId;

    /**
     * @var string $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     *
     * @FakeMockField()
     */
    public $currencyCode;

    /**
     * @var array $cookies
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("cookies")
     */
    public $cookies = [];

    /**
     * @var int $accountId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("account_id")
     *
     * @FakeMockField(value="100049")
     */
    public $accountId;

    /**
     * @var string $managerComment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("manager_comment")
     *
     * @FakeMockField()
     */
    public $managerComment;

    /**
     * @var string $locale
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("locale")
     *
     * @FakeMockField()
     */
    public $locale;

    /**
     * @var int $yaId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ya_id")
     *
     * @FakeMockField()
     */
    public $yaId;

    /**
     * @var array $orderLines
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OrderLines>")
     * @JMS\SerializedName("order_lines")
     */
    public $orderLines = [];

    /**
     * @var array $orderChanges
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OrderChanges>")
     * @JMS\SerializedName("order_changes")
     */
    public $orderChanges = [];

    /**
     * @var array $fieldsValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values")
     */
    public $fieldsValues = [];

    /**
     * @var Client $client
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Client")
     * @JMS\SerializedName("client")
     *
     * @FakeMockField()
     */
    public $client;

    /**
     * @var array $discounts
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Discount>")
     * @JMS\SerializedName("discounts")
     */
    public $discounts = [];

    /**
     * @var Discount $discount
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Discount")
     * @JMS\SerializedName("discount")
     *
     * @FakeMockField()
     */
    public $discount;

    /**
     * @var ShippingAddress $shippingAddress
     *
     * @JMS\Type("SaaS\Service\Insales\Model\ShippingAddress")
     * @JMS\SerializedName("shipping_address")
     *
     * @FakeMockField()
     */
    public $shippingAddress;

    /**
     * @var DeliveryInfo $deliveryInfo
     *
     * @JMS\Type("SaaS\Service\Insales\Model\DeliveryInfo")
     * @JMS\SerializedName("delivery_info")
     *
     * @FakeMockField()
     */
    public $deliveryInfo;
}
