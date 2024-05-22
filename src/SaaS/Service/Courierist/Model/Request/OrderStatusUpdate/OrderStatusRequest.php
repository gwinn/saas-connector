<?php

namespace SaaS\Service\Courierist\Model\Request\OrderStatusUpdate;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\RequestModel;

/**
 * Class OrderStatusRequest
 *
 * @category Models
 *
 */
class OrderStatusRequest implements RequestModel
{
    /**
     * Статус заказа
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * Отмена забора и доставки груза только через диспетчера при true
     *
     * @var bool
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_manual_processing")
     */
    public $isManualProcessing;
}