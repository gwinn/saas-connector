<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCalculate\Order;
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
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * Дата оценки (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("estimate_at")
     */
    public $estimateAt;

    /**
     * Интервалы доставки
     *
     * @var array
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("delivery_intervals")
     */
    public $deliveryIntervals;
}