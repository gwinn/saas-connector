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
    /**
     * Only for removal: id of delivery variant and payment gateway binding you want to delete
     *
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
     * Set it 1 to delete this payment variant
     *
     * @var int $destroy
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("_destroy")
     *
     * @FakeMockField(faker="randomElement", arguments={{1,0}})
     */
    public $destroy;
}
