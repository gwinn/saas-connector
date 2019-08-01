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
 * Class PaymentDeliveryVariant
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class PaymentDeliveryVariant
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\Destroy;

    /**
     * For creation: id of payment gateway you want to bind with this delivery variant
     *
     * @var int $paymentGatewayId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("payment_gateway_id")
     *
     * @FakeMockField()
     */
    public $paymentGatewayId;

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
}
