<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCost\Order;
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

    /**
     * Дата оценки (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("estimate_at")
     */
    public $estimateAt;
}