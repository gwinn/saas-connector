<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Request;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use SaaS\Service\Insales\Model\Traits\PageFilter;
use SaaS\Service\Insales\Model\Traits\UpdatedFilter;

/**
 * Class OrdersFilterRequest
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrdersFilterRequest extends FilterRequest
{
    use PageFilter;
    use UpdatedFilter;

    /**
     * Array of statuses
     *
     * @var array|null $fulfillmentStatus
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("fulfillment_status")
     *
     * @FakeMockField()
     */
    protected $fulfillmentStatus;

    /**
     * Array of delivery variant ids
     *
     * @var array|null $deliveryVariant
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("delivery_variant")
     *
     * @FakeMockField()
     */
    protected $deliveryVariant;

    /**
     * Array of payment gateway ids
     *
     * @var array|null $paymentGatewayId
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("payment_gateway_id")
     *
     * @FakeMockField()
     */
    protected $paymentGatewayId;

    /**
     * Order status, values: open / closed
     *
     * @var string|null $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     *
     * @FakeMockField()
     */
    protected $status;

    /**
     * Get deleted orders
     *
     * @var bool|null $deleted
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("deleted")
     *
     * @FakeMockField()
     */
    protected $deleted;

    /**
     * @return array|null
     */
    public function getFulfillmentStatus(): ?array
    {
        return $this->fulfillmentStatus;
    }

    /**
     * @param array $fulfillmentStatus
     */
    public function setFulfillmentStatus(array $fulfillmentStatus): void
    {
        $this->fulfillmentStatus = $fulfillmentStatus;
    }

    /**
     * @return array|null
     */
    public function getDeliveryVariant(): ?array
    {
        return $this->deliveryVariant;
    }

    /**
     * @param array $deliveryVariant
     */
    public function setDeliveryVariant(array $deliveryVariant): void
    {
        $this->deliveryVariant = $deliveryVariant;
    }

    /**
     * @return array|null
     */
    public function getPaymentGatewayId(): ?array
    {
        return $this->paymentGatewayId;
    }

    /**
     * @param array $paymentGatewayId
     */
    public function setPaymentGatewayId(array $paymentGatewayId): void
    {
        $this->paymentGatewayId = $paymentGatewayId;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool|null
     */
    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}
