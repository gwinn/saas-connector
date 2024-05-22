<?php

namespace SaaS\Service\Courierist\Model\Response\OrderStatusUpdate;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\OrderStatusUpdate\Order\Order;
use SaaS\Service\Courierist\Model\Response\ResponseModel;

class OrderStatusUpdateResponse implements ResponseModel
{
    /**
     * Заказ
     *
     * @var Order
     *
     * @JMS\Type("SaaS\Service\Courierist\Model\Response\OrderStatusUpdate\Order\Order")
     * @JMS\SerializedName("order")
     */
    public $order;
}