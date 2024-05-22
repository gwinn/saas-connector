<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCalculate;

use SaaS\Service\Courierist\Model\Response\OrderCalculate\Order\Order;
use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\ResponseModel;

/**
 * Class OrderCostResponse
 *
 * @category Models
 *
 */
class OrderCalculateResponse implements ResponseModel
{
    /**
     * Заказ
     *
     * @var Order
     *
     * @JMS\Type("SaaS\Service\Courierist\Model\Response\OrderCalculate\Order\Order")
     * @JMS\SerializedName("order")
     */
    public $order;
}