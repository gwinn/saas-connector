<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCreate;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\OrderCreate\Order\Order;
use SaaS\Service\Courierist\Model\Response\ResponseModel;

/**
 * Class OrderCreateResponse
 *
 * @category Models
 *
 */
class OrderCreateResponse implements ResponseModel
{
    /**
     * Заказ
     *
     * @var Order[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Response\OrderCreate\Order\Order>")
     * @JMS\SerializedName("orders")
     */
    public $orders;
}