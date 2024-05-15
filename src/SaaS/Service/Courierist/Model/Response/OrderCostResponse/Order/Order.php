<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCostResponse\Order;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Order
 *
 * @category Models
 *
 */
class Order
{
    /**
     * Стоимость заказа
     *
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;
}