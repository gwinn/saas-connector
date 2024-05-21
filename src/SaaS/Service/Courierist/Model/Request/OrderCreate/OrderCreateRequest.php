<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCreate;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Order;

/**
 * Class OrderCreateRequest
 *
 * @category Models
 *
 */
class OrderCreateRequest
{
    /**
     * Заказы
     *
     * @var Order[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Order>")
     * @JMS\SerializedName("orders")
     */
    public $orders;
}