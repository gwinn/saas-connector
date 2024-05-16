<?php

namespace SaaS\Service\Courierist\Model\Request\OrderStatus;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderStatus
 *
 * @category Models
 *
 */
class OrderStatus
{
    /**
     * Статус заказа
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * Отмена забора и доставки груза только через диспетчера при true
     *
     * @var bool
     *
     * @JSM\Type("boolean")
     * @JMS\SerializedName("is_manual_processing")
     */
    public $isManualProcessing;
}