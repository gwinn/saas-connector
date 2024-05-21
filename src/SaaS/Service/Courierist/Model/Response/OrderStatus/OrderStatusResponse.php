<?php

namespace SaaS\Service\Courierist\Model\Response\OrderStatus;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\OrderStatus\Order\Order;

class OrderStatusResponse
{
    /**
     * Заказ
     *
     * @var Order
     *
     * @JMS\Type("SaaS\Service\Courierist\Model\Response\OrderStatus\Order\Order")
     * @JMS\SerializedName("order")
     */
    public $order;
}