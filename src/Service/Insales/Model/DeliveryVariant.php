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
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;
    use Traits\Position;
    use Traits\Description;

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
     * @var string|null $type
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
    protected $type;

    /**
     * @var float $minPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("min_price")
     *
     * @FakeMockField()
     */
    protected $minPrice;

    /**
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    protected $price;

    /**
     * False by default, if true this delivery variant will be available for all regions except passed in parameters 'country', 'region' and 'city'
     *
     * @var bool|null $inverted
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("inverted")
     *
     * @FakeMockField()
     */
    protected $inverted;

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
    protected $chargeUpTo;

    /**
     * For get delivery variant
     *
     * @var array|null $paymentDeliveryVariants
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\PaymentDeliveryVariant>")
     * @JMS\SerializedName("payment_delivery_variants")
     */
    protected $paymentDeliveryVariants;

    /**
     * For create or update delivery variant
     *
     * @var array|null $paymentDeliveryVariantsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\PaymentDeliveryVariant>")
     * @JMS\SerializedName("payment_delivery_variants_attributes")
     */
    protected $paymentDeliveryVariantsAttributes;

    /**
     * For get delivery variant
     *
     * @var array|null $deliveryLocations
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations")
     */
    protected $deliveryLocations;

    /**
     * For create delivery variant
     *
     * @var array|null $deliveryLocationsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations_attributes")
     */
    protected $deliveryLocationsAttributes;

    /**
     * For get delivery variant
     *
     * @var array|null $deliveryZones
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryZone>")
     * @JMS\SerializedName("delivery_zones")
     */
    protected $deliveryZones;

    /**
     * For create delivery variant
     *
     * @var array|null $deliveryZonesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryZone>")
     * @JMS\SerializedName("delivery_zones_attributes")
     */
    protected $deliveryZonesAttributes;

    /**
     * Array of rules define delivery price depending on order sum and weight
     * For create delivery variant
     *
     * @var array|null $rules
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Rule>")
     * @JMS\SerializedName("rules")
     */
    protected $rules;

    /**
     * Array of rules define delivery price depending on order sum and weight
     * For create delivery variant
     *
     * @var array|null $rulesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Rule>")
     * @JMS\SerializedName("rules_attributes")
     */
    protected $rulesAttributes;

    /**
     * Set true to add all payment variants
     *
     * @var bool|null $chargeUpTo
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("add_payment_gateways")
     *
     * @FakeMockField()
     */
    protected $addPaymentGateways;

    /**
     * False by default, set it true if this delivery variant is customer pickup
     *
     * @var bool|null $customerPickup
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("customer_pickup")
     *
     * @FakeMockField()
     */
    protected $customerPickup;

    /**
     * If needed, paste javascript to be displayed on page of delivery variant selection
     *
     * @var string|null $javascript
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("javascript")
     *
     * @FakeMockField()
     */
    protected $javascript;

    /**
     * Url for sending request on delivery price estimation
     *
     * @var string|null $url
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     *
     * @FakeMockField()
     */
    protected $url;

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float|null
     */
    public function getMinPrice(): ?float
    {
        return $this->minPrice;
    }

    /**
     * @param float $minPrice
     */
    public function setMinPrice(float $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return bool|null
     */
    public function getInverted(): ?bool
    {
        return $this->inverted;
    }

    /**
     * @param bool|null $inverted
     */
    public function setInverted(?bool $inverted): void
    {
        $this->inverted = $inverted;
    }

    /**
     * @return float|null
     */
    public function getChargeUpTo(): ?float
    {
        return $this->chargeUpTo;
    }

    /**
     * @param float $chargeUpTo
     */
    public function setChargeUpTo(float $chargeUpTo): void
    {
        $this->chargeUpTo = $chargeUpTo;
    }

    /**
     * @return array|null
     */
    public function getPaymentDeliveryVariants(): ?array
    {
        return $this->paymentDeliveryVariants;
    }

    /**
     * @param array|null $paymentDeliveryVariants
     */
    public function setPaymentDeliveryVariants(?array $paymentDeliveryVariants): void
    {
        $this->paymentDeliveryVariants = $paymentDeliveryVariants;
    }

    /**
     * @return array|null
     */
    public function getPaymentDeliveryVariantsAttributes(): ?array
    {
        return $this->paymentDeliveryVariantsAttributes;
    }

    /**
     * @param array|null $paymentDeliveryVariantsAttributes
     */
    public function setPaymentDeliveryVariantsAttributes(?array $paymentDeliveryVariantsAttributes): void
    {
        $this->paymentDeliveryVariantsAttributes = $paymentDeliveryVariantsAttributes;
    }

    /**
     * @return array|null
     */
    public function getDeliveryLocations(): ?array
    {
        return $this->deliveryLocations;
    }

    /**
     * @param array|null $deliveryLocations
     */
    public function setDeliveryLocations(?array $deliveryLocations): void
    {
        $this->deliveryLocations = $deliveryLocations;
    }

    /**
     * @return array|null
     */
    public function getDeliveryLocationsAttributes(): ?array
    {
        return $this->deliveryLocationsAttributes;
    }

    /**
     * @param array|null $deliveryLocationsAttributes
     */
    public function setDeliveryLocationsAttributes(?array $deliveryLocationsAttributes): void
    {
        $this->deliveryLocationsAttributes = $deliveryLocationsAttributes;
    }

    /**
     * @return array|null
     */
    public function getDeliveryZones(): ?array
    {
        return $this->deliveryZones;
    }

    /**
     * @param array|null $deliveryZones
     */
    public function setDeliveryZones(?array $deliveryZones): void
    {
        $this->deliveryZones = $deliveryZones;
    }

    /**
     * @return array|null
     */
    public function getDeliveryZonesAttributes(): ?array
    {
        return $this->deliveryZonesAttributes;
    }

    /**
     * @param array|null $deliveryZonesAttributes
     */
    public function setDeliveryZonesAttributes(?array $deliveryZonesAttributes): void
    {
        $this->deliveryZonesAttributes = $deliveryZonesAttributes;
    }

    /**
     * @return array|null
     */
    public function getRules(): ?array
    {
        return $this->rules;
    }

    /**
     * @param array|null $rules
     */
    public function setRules(?array $rules): void
    {
        $this->rules = $rules;
    }

    /**
     * @return array|null
     */
    public function getRulesAttributes(): ?array
    {
        return $this->rulesAttributes;
    }

    /**
     * @param array|null $rulesAttributes
     */
    public function setRulesAttributes(?array $rulesAttributes): void
    {
        $this->rulesAttributes = $rulesAttributes;
    }

    /**
     * @return bool|null
     */
    public function getAddPaymentGateways(): ?bool
    {
        return $this->addPaymentGateways;
    }

    /**
     * @param bool|null $addPaymentGateways
     */
    public function setAddPaymentGateways(?bool $addPaymentGateways): void
    {
        $this->addPaymentGateways = $addPaymentGateways;
    }

    /**
     * @return bool|null
     */
    public function getCustomerPickup(): ?bool
    {
        return $this->customerPickup;
    }

    /**
     * @param bool|null $customerPickup
     */
    public function setCustomerPickup(?bool $customerPickup): void
    {
        $this->customerPickup = $customerPickup;
    }

    /**
     * @return null|string
     */
    public function getJavascript(): ?string
    {
        return $this->javascript;
    }

    /**
     * @param null|string $javascript
     */
    public function setJavascript(?string $javascript): void
    {
        $this->javascript = $javascript;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
