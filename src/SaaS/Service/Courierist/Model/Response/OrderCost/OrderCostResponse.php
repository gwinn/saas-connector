<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCost;

use SaaS\Service\Courierist\Model\Response\OrderCost\Order\Order;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderCostResponse
 *
 * @category Models
 *
 */
class OrderCostResponse
{
    /**
     * Заказ
     *
     * @var Order
     *
     * @JMS\Type("SaaS\Service\Courierist\Model\Response\OrderCost\Order\Order")
     * @JMS\SerializedName("order")
     */
    public $order;
}