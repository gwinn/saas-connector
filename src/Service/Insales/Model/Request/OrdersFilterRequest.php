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
     * @var array $fulfillmentStatus
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("fulfillment_status")
     *
     * @FakeMockField()
     */
    public $fulfillmentStatus;

    /**
     * Array of delivery variant ids
     *
     * @var array $deliveryVariant
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("delivery_variant")
     *
     * @FakeMockField()
     */
    public $deliveryVariant;

    /**
     * Array of payment gateway ids
     *
     * @var array $paymentGatewayId
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("payment_gateway_id")
     *
     * @FakeMockField()
     */
    public $paymentGatewayId;

    /**
     * Order status, values: open / closed
     *
     * @var string $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     *
     * @FakeMockField()
     */
    public $status;

    /**
     * Get deleted orders
     *
     * @var bool $deleted
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("deleted")
     *
     * @FakeMockField()
     */
    public $deleted;
}
