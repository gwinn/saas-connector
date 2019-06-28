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
 * Class DeliveryVariant
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryVariant
{
    const EXTERNAL = 'DeliveryVariant::External';
    const FIXED = 'DeliveryVariant::Fixed';
    const LOCATION_DEPEND = 'DeliveryVariant::LocationDepend';
    const NONE = 'DeliveryVariant::None';
    const OFFICIAL_EMAIL_EMS_SHIPPING = 'DeliveryVariant::OfficialEmsShipping';
    const OFFICIAL_FIRST_CLASS = 'DeliveryVariant::OfficialFirstClass';
    const OFFICIAL_OFFICIAL_RUSSIANPOST = 'DeliveryVariant::OfficialRussianpost';
    const PICK_UP = 'DeliveryVariant::PickUp';
    const PRICE_DEPEND = 'DeliveryVariant::PriceDepend';

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
     * @var int $position
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("position")
     *
     * @FakeMockField()
     */
    public $position;

    /**
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * @var string $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     *
     * @FakeMockField()
     */
    public $description;

    /**
     * @var string $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(
     *     faker="randomElement",
     *     arguments={{
     *         "DeliveryVariant::External",
     *         "DeliveryVariant::Fixed",
     *         "DeliveryVariant::LocationDepend",
     *         "DeliveryVariant::None",
     *         "DeliveryVariant::OfficialEmsShipping",
     *         "DeliveryVariant::OfficialFirstClass",
     *         "DeliveryVariant::OfficialRussianpost",
     *         "DeliveryVariant::PickUp",
     *         "DeliveryVariant::PriceDepend"
     *     }}
     * )
     */
    public $type;

    /**
     * @var float $minPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("min_price")
     *
     * @FakeMockField()
     */
    public $minPrice;

    /**
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    public $price;

    /**
     * False by default, if true this delivery variant will be available for all regions except passed in parameters 'country', 'region' and 'city'
     *
     * @var bool $inverted
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("inverted")
     *
     * @FakeMockField()
     */
    public $inverted;

    /**
     * Free on orders from given sum
     *
     * @var float $chargeUpTo
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("charge_up_to")
     *
     * @FakeMockField()
     */
    public $chargeUpTo;

    /**
     * For get delivery variant
     *
     * @var array $paymentDeliveryVariants
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\PaymentDeliveryVariant>")
     * @JMS\SerializedName("payment_delivery_variants")
     */
    public $paymentDeliveryVariants;

    /**
     * For create or update delivery variant
     *
     * @var array $paymentDeliveryVariantsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\PaymentDeliveryVariant>")
     * @JMS\SerializedName("payment_delivery_variants_attributes")
     */
    public $paymentDeliveryVariantsAttributes;

    /**
     * For get delivery variant
     *
     * @var array $deliveryLocations
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations")
     */
    public $deliveryLocations;

    /**
     * For create delivery variant
     *
     * @var array $deliveryLocationsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations_attributes")
     */
    public $deliveryLocationsAttributes;

    /**
     * For get delivery variant
     *
     * @var array $deliveryZones
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryZone>")
     * @JMS\SerializedName("delivery_zones")
     */
    public $deliveryZones;

    /**
     * For create delivery variant
     *
     * @var array $deliveryZonesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryZone>")
     * @JMS\SerializedName("delivery_zones_attributes")
     */
    public $deliveryZonesAttributes;

    /**
     * Array of rules define delivery price depending on order sum and weight
     * For create delivery variant
     *
     * @var array $rules
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Rule>")
     * @JMS\SerializedName("rules")
     */
    public $rules;

    /**
     * Array of rules define delivery price depending on order sum and weight
     * For create delivery variant
     *
     * @var array $rulesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Rule>")
     * @JMS\SerializedName("rules_attributes")
     */
    public $rulesAttributes;

    /**
     * Set true to add all payment variants
     *
     * @var bool $chargeUpTo
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("add_payment_gateways")
     *
     * @FakeMockField()
     */
    public $addPaymentGateways;

    /**
     * False by default, set it true if this delivery variant is customer pickup
     *
     * @var bool $customerPickup
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("customer_pickup")
     *
     * @FakeMockField()
     */
    public $customerPickup;

    /**
     * If needed, paste javascript to be displayed on page of delivery variant selection
     *
     * @var string $javascript
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("javascript")
     *
     * @FakeMockField()
     */
    public $javascript;

    /**
     * Url for sending request on delivery price estimation
     *
     * @var string $url
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     *
     * @FakeMockField()
     */
    public $url;
}
