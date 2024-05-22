<?php

namespace SaaS\Service\Courierist\Model\Response\OrderDelete;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\OrderDelete\Order\Order;
use SaaS\Service\Courierist\Model\Response\ResponseModel;

/**
 * Class OrderDeleteResponse
 *
 * @category Models
 *
 */
class OrderDeleteResponse implements ResponseModel
{
    /**
     * Заказ
     *
     * @var Order
     *
     * @JMS\Type("SaaS\Service\Courierist\Model\Request\OrderDelete\Order\Order")
     * @JMS\SerializedName("order")
     */
    public $order;
}