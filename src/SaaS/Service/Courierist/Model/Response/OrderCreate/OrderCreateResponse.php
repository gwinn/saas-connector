<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCreate;

use SaaS\Service\Courierist\Model\Response\OrderCreate\Order\Order;

/**
 * Class OrderCreateResponse
 *
 * @category Models
 *
 */
class OrderCreateResponse
{
    /**
     * Заказ
     *
     * @var Order[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Response\OrderCreate\Order\Order>")
     * @JMS\SerializedName("order")
     */
    public $order;
}