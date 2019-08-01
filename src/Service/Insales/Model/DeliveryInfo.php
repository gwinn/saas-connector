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
 * Class DeliveryInfo
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryInfo
{
    use Traits\Title;
    use Traits\Description;

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
     * @var int $tariffId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("tariff_id")
     *
     * @FakeMockField()
     */
    protected $tariffId;

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
     * @var string|null $shippingCompany
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shipping_company")
     *
     * @FakeMockField()
     */
    protected $shippingCompany;

    /**
     * @var DeliveryInterval $deliveryInterval
     *
     * @JMS\Type("SaaS\Service\Insales\Model\DeliveryInterval")
     * @JMS\SerializedName("delivery_interval")
     *
     * @FakeMockField()
     */
    protected $deliveryInterval;

    /**
     * @var Outlet $outlet
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Outlet")
     * @JMS\SerializedName("outlet")
     *
     * @FakeMockField()
     */
    protected $outlet;

    /**
     * @var array|null $errors
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("errors")
     */
    protected $errors = [];

    /**
     * @var array|null $warnings
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("warnings")
     */
    protected $warnings = [];

    public function __construct()
    {
        $this->deliveryInterval = new DeliveryInterval();
        $this->outlet = new Outlet();
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
    public function getTariffId(): ?int
    {
        return $this->tariffId;
    }

    /**
     * @param int $tariffId
     */
    public function setTariffId(int $tariffId): void
    {
        $this->tariffId = $tariffId;
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
     * @return null|string
     */
    public function getShippingCompany(): ?string
    {
        return $this->shippingCompany;
    }

    /**
     * @param null|string $shippingCompany
     */
    public function setShippingCompany(?string $shippingCompany): void
    {
        $this->shippingCompany = $shippingCompany;
    }

    /**
     * @return DeliveryInterval
     */
    public function getDeliveryInterval(): DeliveryInterval
    {
        return $this->deliveryInterval;
    }

    /**
     * @param DeliveryInterval $deliveryInterval
     */
    public function setDeliveryInterval(DeliveryInterval $deliveryInterval): void
    {
        $this->deliveryInterval = $deliveryInterval;
    }

    /**
     * @return Outlet
     */
    public function getOutlet(): Outlet
    {
        return $this->outlet;
    }

    /**
     * @param Outlet $outlet
     */
    public function setOutlet(Outlet $outlet): void
    {
        $this->outlet = $outlet;
    }

    /**
     * @return array|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param array|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * @return array|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * @param array|null $warnings
     */
    public function setWarnings(?array $warnings): void
    {
        $this->warnings = $warnings;
    }
}
