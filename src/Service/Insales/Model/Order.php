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
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;

    /**
     * @var string|null $key
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("key")
     *
     * @FakeMockField(faker="md5")
     */
    protected $key;

    /**
     * @var int $number
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("number")
     *
     * @FakeMockField()
     */
    protected $number;

    /**
     * @var string|null $acceptedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("accepted_at")
     *
     * @FakeMockField(faker="iso8601")
     */
    protected $acceptedAt;

    /**
     * @var string|null $deliveredAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivered_at")
     *
     * @FakeMockField(faker="iso8601")
     */
    protected $deliveredAt;

    /**
     * @var string|null $paidAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("paid_at")
     *
     * @FakeMockField(faker="iso8601")
     */
    protected $paidAt;

    /**
     * @var float $totalPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("total_price")
     *
     * @FakeMockField()
     */
    protected $totalPrice;

    /**
     * @var float $itemsPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("items_price")
     *
     * @FakeMockField()
     */
    protected $itemsPrice;

    /**
     * @var string|null $comment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comment")
     *
     * @FakeMockField()
     */
    protected $comment;

    /**
     * @var string|null $deliveryTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_title")
     *
     * @FakeMockField()
     */
    protected $deliveryTitle;

    /**
     * @var string|null $deliveryDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_description")
     *
     * @FakeMockField()
     */
    protected $deliveryDescription;

    /**
     * @var float $deliveryPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("delivery_price")
     *
     * @FakeMockField()
     */
    protected $deliveryPrice;

    /**
     * @var float $fullDeliveryPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_delivery_price")
     *
     * @FakeMockField()
     */
    protected $fullDeliveryPrice;

    /**
     * @var string|null $paymentTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_title")
     *
     * @FakeMockField()
     */
    protected $paymentTitle;

    /**
     * @var string|null $paymentDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_description")
     *
     * @FakeMockField()
     */
    protected $paymentDescription;

    /**
     * @var string|null $firstReferer
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_referer")
     *
     * @FakeMockField()
     */
    protected $firstReferer;

    /**
     * @var string|null $firstCurrentLocation
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_current_location")
     *
     * @FakeMockField()
     */
    protected $firstCurrentLocation;

    /**
     * @var string|null $firstQuery
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_query")
     *
     * @FakeMockField()
     */
    protected $firstQuery;

    /**
     * @var string|null $firstSourceDomain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_source_domain")
     *
     * @FakeMockField()
     */
    protected $firstSourceDomain;

    /**
     * @var string|null $firstSource
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("first_source")
     *
     * @FakeMockField()
     */
    protected $firstSource;

    /**
     * @var string|null $referer
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("referer")
     *
     * @FakeMockField()
     */
    protected $referer;

    /**
     * @var string|null $currentLocation
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("current_location")
     *
     * @FakeMockField()
     */
    protected $currentLocation;

    /**
     * @var string|null $query
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("query")
     *
     * @FakeMockField()
     */
    protected $query;

    /**
     * @var string|null $sourceDomain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("source_domain")
     *
     * @FakeMockField()
     */
    protected $sourceDomain;

    /**
     * @var string|null $source
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("source")
     *
     * @FakeMockField()
     */
    protected $source;

    /**
     * @var string|null $fulfillmentStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fulfillment_status")
     *
     * @FakeMockField()
     */
    protected $fulfillmentStatus;

    /**
     * @var CustomStatus $customStatus
     *
     * @JMS\Type("SaaS\Service\Insales\Model\CustomStatus")
     * @JMS\SerializedName("custom_status")
     *
     * @FakeMockField()
     */
    protected $customStatus;

    /**
     * @var string|null $financialStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("financial_status")
     *
     * @FakeMockField()
     */
    protected $financialStatus;

    /**
     * @var string|null $deliveryDate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_date")
     *
     * @FakeMockField(faker="date")
     */
    protected $deliveryDate;

    /**
     * @var string|null $deliveryFromHour
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_from_hour")
     *
     * @FakeMockField(faker="numberBetween", arguments={1, 24})
     */
    protected $deliveryFromHour;

    /**
     * @var string|null $deliveryToHour
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_to_hour")
     *
     * @FakeMockField(faker="numberBetween", arguments={1, 24})
     */
    protected $deliveryToHour;

    /**
     * @var int $deliveryVariantId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("delivery_variant_id")
     *
     * @FakeMockField()
     */
    protected $deliveryVariantId;

    /**
     * @var int $paymentGatewayId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("payment_gateway_id")
     *
     * @FakeMockField()
     */
    protected $paymentGatewayId;

    /**
     * @var float $margin
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("margin")
     *
     * @FakeMockField()
     */
    protected $margin;

    /**
     * @var int $clientTransactionId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("client_transaction_id")
     *
     * @FakeMockField()
     */
    protected $clientTransactionId;

    /**
     * @var string|null $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     *
     * @FakeMockField()
     */
    protected $currencyCode;

    /**
     * @var array|null $cookies
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("cookies")
     */
    protected $cookies = [];

    /**
     * @var int $accountId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("account_id")
     *
     * @FakeMockField(value="100049")
     */
    protected $accountId;

    /**
     * @var string|null $managerComment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("manager_comment")
     *
     * @FakeMockField()
     */
    protected $managerComment;

    /**
     * @var string|null $locale
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("locale")
     *
     * @FakeMockField()
     */
    protected $locale;

    /**
     * @var string|null $coupon
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("coupon")
     *
     * @FakeMockField()
     */
    protected $coupon;

    /**
     * @var int $yaId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ya_id")
     *
     * @FakeMockField()
     */
    protected $yaId;

    /**
     * @var array|null $orderLines
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OrderLine>")
     * @JMS\SerializedName("order_lines")
     */
    protected $orderLines = [];

    /**
     * @var array|null $orderLinesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OrderLine>")
     * @JMS\SerializedName("order_lines_attributes")
     */
    protected $orderLinesAttributes = [];

    /**
     * @var array|null $orderChanges
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OrderChange>")
     * @JMS\SerializedName("order_changes")
     */
    protected $orderChanges = [];

    /**
     * @var array|null $fieldsValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values")
     */
    protected $fieldsValues = [];

    /**
     * @var array|null $fieldsValuesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values_attributes")
     */
    protected $fieldsValuesAttributes = [];

    /**
     * @var Client $client
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Client")
     * @JMS\SerializedName("client")
     *
     * @FakeMockField()
     */
    protected $client;

    /**
     * @var Client $clientAttributes
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Client")
     * @JMS\SerializedName("client_attributes")
     *
     * @FakeMockField()
     */
    protected $clientAttributes;

    /**
     * @var array|null $discounts
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Discount>")
     * @JMS\SerializedName("discounts")
     */
    protected $discounts = [];

    /**
     * @var array|null $discountsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Discount>")
     * @JMS\SerializedName("discounts_attributes")
     */
    protected $discountsAttributes = [];

    /**
     * @var Discount $discount
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Discount")
     * @JMS\SerializedName("discount")
     *
     * @FakeMockField()
     */
    protected $discount;

    /**
     * @var ShippingAddress $shippingAddress
     *
     * @JMS\Type("SaaS\Service\Insales\Model\ShippingAddress")
     * @JMS\SerializedName("shipping_address")
     *
     * @FakeMockField()
     */
    protected $shippingAddress;

    /**
     * @var ShippingAddress $shippingAddressAttributes
     *
     * @JMS\Type("SaaS\Service\Insales\Model\ShippingAddress")
     * @JMS\SerializedName("shipping_address_attributes")
     *
     * @FakeMockField()
     */
    protected $shippingAddressAttributes;

    /**
     * @var DeliveryInfo $deliveryInfo
     *
     * @JMS\Type("SaaS\Service\Insales\Model\DeliveryInfo")
     * @JMS\SerializedName("delivery_info")
     *
     * @FakeMockField()
     */
    protected $deliveryInfo;

    public function __construct()
    {
        $this->customStatus = new CustomStatus();
        $this->client = new Client();
        $this->clientAttributes = new Client();
        $this->discount = new Discount();
        $this->shippingAddress = new ShippingAddress();
        $this->shippingAddressAttributes = new ShippingAddress();
        $this->deliveryInfo= new DeliveryInfo();
    }

    /**
     * @return null|string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param null|string $key
     */
    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    /**
     * @return null|string
     */
    public function getAcceptedAt(): ?string
    {
        return $this->acceptedAt;
    }

    /**
     * @param null|string $acceptedAt
     */
    public function setAcceptedAt(?string $acceptedAt): void
    {
        $this->acceptedAt = $acceptedAt;
    }

    /**
     * @return null|string
     */
    public function getDeliveredAt(): ?string
    {
        return $this->deliveredAt;
    }

    /**
     * @param null|string $deliveredAt
     */
    public function setDeliveredAt(?string $deliveredAt): void
    {
        $this->deliveredAt = $deliveredAt;
    }

    /**
     * @return null|string
     */
    public function getPaidAt(): ?string
    {
        return $this->paidAt;
    }

    /**
     * @param null|string $paidAt
     */
    public function setPaidAt(?string $paidAt): void
    {
        $this->paidAt = $paidAt;
    }

    /**
     * @return float|null
     */
    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return float|null
     */
    public function getItemsPrice(): ?float
    {
        return $this->itemsPrice;
    }

    /**
     * @param float $itemsPrice
     */
    public function setItemsPrice(float $itemsPrice): void
    {
        $this->itemsPrice = $itemsPrice;
    }

    /**
     * @return null|string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param null|string $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return null|string
     */
    public function getDeliveryTitle(): ?string
    {
        return $this->deliveryTitle;
    }

    /**
     * @param null|string $deliveryTitle
     */
    public function setDeliveryTitle(?string $deliveryTitle): void
    {
        $this->deliveryTitle = $deliveryTitle;
    }

    /**
     * @return null|string
     */
    public function getDeliveryDescription(): ?string
    {
        return $this->deliveryDescription;
    }

    /**
     * @param null|string $deliveryDescription
     */
    public function setDeliveryDescription(?string $deliveryDescription): void
    {
        $this->deliveryDescription = $deliveryDescription;
    }

    /**
     * @return float|null
     */
    public function getDeliveryPrice(): ?float
    {
        return $this->deliveryPrice;
    }

    /**
     * @param float $deliveryPrice
     */
    public function setDeliveryPrice(float $deliveryPrice): void
    {
        $this->deliveryPrice = $deliveryPrice;
    }

    /**
     * @return float|null
     */
    public function getFullDeliveryPrice(): ?float
    {
        return $this->fullDeliveryPrice;
    }

    /**
     * @param float $fullDeliveryPrice
     */
    public function setFullDeliveryPrice(float $fullDeliveryPrice): void
    {
        $this->fullDeliveryPrice = $fullDeliveryPrice;
    }

    /**
     * @return null|string
     */
    public function getPaymentTitle(): ?string
    {
        return $this->paymentTitle;
    }

    /**
     * @param null|string $paymentTitle
     */
    public function setPaymentTitle(?string $paymentTitle): void
    {
        $this->paymentTitle = $paymentTitle;
    }

    /**
     * @return null|string
     */
    public function getPaymentDescription(): ?string
    {
        return $this->paymentDescription;
    }

    /**
     * @param null|string $paymentDescription
     */
    public function setPaymentDescription(?string $paymentDescription): void
    {
        $this->paymentDescription = $paymentDescription;
    }

    /**
     * @return null|string
     */
    public function getFirstReferer(): ?string
    {
        return $this->firstReferer;
    }

    /**
     * @param null|string $firstReferer
     */
    public function setFirstReferer(?string $firstReferer): void
    {
        $this->firstReferer = $firstReferer;
    }

    /**
     * @return null|string
     */
    public function getFirstCurrentLocation(): ?string
    {
        return $this->firstCurrentLocation;
    }

    /**
     * @param null|string $firstCurrentLocation
     */
    public function setFirstCurrentLocation(?string $firstCurrentLocation): void
    {
        $this->firstCurrentLocation = $firstCurrentLocation;
    }

    /**
     * @return null|string
     */
    public function getFirstQuery(): ?string
    {
        return $this->firstQuery;
    }

    /**
     * @param null|string $firstQuery
     */
    public function setFirstQuery(?string $firstQuery): void
    {
        $this->firstQuery = $firstQuery;
    }

    /**
     * @return null|string
     */
    public function getFirstSourceDomain(): ?string
    {
        return $this->firstSourceDomain;
    }

    /**
     * @param null|string $firstSourceDomain
     */
    public function setFirstSourceDomain(?string $firstSourceDomain): void
    {
        $this->firstSourceDomain = $firstSourceDomain;
    }

    /**
     * @return null|string
     */
    public function getFirstSource(): ?string
    {
        return $this->firstSource;
    }

    /**
     * @param null|string $firstSource
     */
    public function setFirstSource(?string $firstSource): void
    {
        $this->firstSource = $firstSource;
    }

    /**
     * @return null|string
     */
    public function getReferer(): ?string
    {
        return $this->referer;
    }

    /**
     * @param null|string $referer
     */
    public function setReferer(?string $referer): void
    {
        $this->referer = $referer;
    }

    /**
     * @return null|string
     */
    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    /**
     * @param null|string $currentLocation
     */
    public function setCurrentLocation(?string $currentLocation): void
    {
        $this->currentLocation = $currentLocation;
    }

    /**
     * @return null|string
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param null|string $query
     */
    public function setQuery(?string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return null|string
     */
    public function getSourceDomain(): ?string
    {
        return $this->sourceDomain;
    }

    /**
     * @param null|string $sourceDomain
     */
    public function setSourceDomain(?string $sourceDomain): void
    {
        $this->sourceDomain = $sourceDomain;
    }

    /**
     * @return null|string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param null|string $source
     */
    public function setSource(?string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return null|string
     */
    public function getFulfillmentStatus(): ?string
    {
        return $this->fulfillmentStatus;
    }

    /**
     * @param null|string $fulfillmentStatus
     */
    public function setFulfillmentStatus(?string $fulfillmentStatus): void
    {
        $this->fulfillmentStatus = $fulfillmentStatus;
    }

    /**
     * @return CustomStatus
     */
    public function getCustomStatus(): CustomStatus
    {
        return $this->customStatus;
    }

    /**
     * @param CustomStatus $customStatus
     */
    public function setCustomStatus(CustomStatus $customStatus): void
    {
        $this->customStatus = $customStatus;
    }

    /**
     * @return null|string
     */
    public function getFinancialStatus(): ?string
    {
        return $this->financialStatus;
    }

    /**
     * @param null|string $financialStatus
     */
    public function setFinancialStatus(?string $financialStatus): void
    {
        $this->financialStatus = $financialStatus;
    }

    /**
     * @return null|string
     */
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    /**
     * @param null|string $deliveryDate
     */
    public function setDeliveryDate(?string $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return null|string
     */
    public function getDeliveryFromHour(): ?string
    {
        return $this->deliveryFromHour;
    }

    /**
     * @param null|string $deliveryFromHour
     */
    public function setDeliveryFromHour(?string $deliveryFromHour): void
    {
        $this->deliveryFromHour = $deliveryFromHour;
    }

    /**
     * @return null|string
     */
    public function getDeliveryToHour(): ?string
    {
        return $this->deliveryToHour;
    }

    /**
     * @param null|string $deliveryToHour
     */
    public function setDeliveryToHour(?string $deliveryToHour): void
    {
        $this->deliveryToHour = $deliveryToHour;
    }

    /**
     * @return int|null
     */
    public function getDeliveryVariantId(): ?int
    {
        return $this->deliveryVariantId;
    }

    /**
     * @param int $deliveryVariantId
     */
    public function setDeliveryVariantId(int $deliveryVariantId): void
    {
        $this->deliveryVariantId = $deliveryVariantId;
    }

    /**
     * @return int|null
     */
    public function getPaymentGatewayId(): ?int
    {
        return $this->paymentGatewayId;
    }

    /**
     * @param int $paymentGatewayId
     */
    public function setPaymentGatewayId(int $paymentGatewayId): void
    {
        $this->paymentGatewayId = $paymentGatewayId;
    }

    /**
     * @return float|null
     */
    public function getMargin(): ?float
    {
        return $this->margin;
    }

    /**
     * @param float $margin
     */
    public function setMargin(float $margin): void
    {
        $this->margin = $margin;
    }

    /**
     * @return int|null
     */
    public function getClientTransactionId(): ?int
    {
        return $this->clientTransactionId;
    }

    /**
     * @param int $clientTransactionId
     */
    public function setClientTransactionId(int $clientTransactionId): void
    {
        $this->clientTransactionId = $clientTransactionId;
    }

    /**
     * @return null|string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * @param null|string $currencyCode
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return array|null
     */
    public function getCookies(): ?array
    {
        return $this->cookies;
    }

    /**
     * @param array|null $cookies
     */
    public function setCookies(?array $cookies): void
    {
        $this->cookies = $cookies;
    }

    /**
     * @return int|null
     */
    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    /**
     * @param int $accountId
     */
    public function setAccountId(int $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * @return null|string
     */
    public function getManagerComment(): ?string
    {
        return $this->managerComment;
    }

    /**
     * @param null|string $managerComment
     */
    public function setManagerComment(?string $managerComment): void
    {
        $this->managerComment = $managerComment;
    }

    /**
     * @return null|string
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param null|string $locale
     */
    public function setLocale(?string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return null|string
     */
    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    /**
     * @param null|string $coupon
     */
    public function setCoupon(?string $coupon): void
    {
        $this->coupon = $coupon;
    }

    /**
     * @return int|null
     */
    public function getYaId(): ?int
    {
        return $this->yaId;
    }

    /**
     * @param int $yaId
     */
    public function setYaId(int $yaId): void
    {
        $this->yaId = $yaId;
    }

    /**
     * @return array|null
     */
    public function getOrderLines(): ?array
    {
        return $this->orderLines;
    }

    /**
     * @param array|null $orderLines
     */
    public function setOrderLines(?array $orderLines): void
    {
        $this->orderLines = $orderLines;
    }

    /**
     * @return array|null
     */
    public function getOrderLinesAttributes(): ?array
    {
        return $this->orderLinesAttributes;
    }

    /**
     * @param array|null $orderLinesAttributes
     */
    public function setOrderLinesAttributes(?array $orderLinesAttributes): void
    {
        $this->orderLinesAttributes = $orderLinesAttributes;
    }

    /**
     * @return array|null
     */
    public function getOrderChanges(): ?array
    {
        return $this->orderChanges;
    }

    /**
     * @param array|null $orderChanges
     */
    public function setOrderChanges(?array $orderChanges): void
    {
        $this->orderChanges = $orderChanges;
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
     * @return array|null
     */
    public function getFieldsValuesAttributes(): ?array
    {
        return $this->fieldsValuesAttributes;
    }

    /**
     * @param array|null $fieldsValuesAttributes
     */
    public function setFieldsValuesAttributes(?array $fieldsValuesAttributes): void
    {
        $this->fieldsValuesAttributes = $fieldsValuesAttributes;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClientAttributes(): Client
    {
        return $this->clientAttributes;
    }

    /**
     * @param Client $clientAttributes
     */
    public function setClientAttributes(Client $clientAttributes): void
    {
        $this->clientAttributes = $clientAttributes;
    }

    /**
     * @return array|null
     */
    public function getDiscounts(): ?array
    {
        return $this->discounts;
    }

    /**
     * @param array|null $discounts
     */
    public function setDiscounts(?array $discounts): void
    {
        $this->discounts = $discounts;
    }

    /**
     * @return array|null
     */
    public function getDiscountsAttributes(): ?array
    {
        return $this->discountsAttributes;
    }

    /**
     * @param array|null $discountsAttributes
     */
    public function setDiscountsAttributes(?array $discountsAttributes): void
    {
        $this->discountsAttributes = $discountsAttributes;
    }

    /**
     * @return Discount
     */
    public function getDiscount(): Discount
    {
        return $this->discount;
    }

    /**
     * @param Discount $discount
     */
    public function setDiscount(Discount $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress(ShippingAddress $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddressAttributes(): ShippingAddress
    {
        return $this->shippingAddressAttributes;
    }

    /**
     * @param ShippingAddress $shippingAddressAttributes
     */
    public function setShippingAddressAttributes(ShippingAddress $shippingAddressAttributes): void
    {
        $this->shippingAddressAttributes = $shippingAddressAttributes;
    }

    /**
     * @return DeliveryInfo
     */
    public function getDeliveryInfo(): DeliveryInfo
    {
        return $this->deliveryInfo;
    }

    /**
     * @param DeliveryInfo $deliveryInfo
     */
    public function setDeliveryInfo(DeliveryInfo $deliveryInfo): void
    {
        $this->deliveryInfo = $deliveryInfo;
    }
}
