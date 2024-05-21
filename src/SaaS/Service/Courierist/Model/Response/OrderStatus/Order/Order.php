<?php

namespace SaaS\Service\Courierist\Model\Response\OrderStatus\Order;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\Traits\OrderTrait;

/**
 * Class Order
 *
 * @category Models
 *
 */

class Order
{
    use OrderTrait;

    /**
     * Дата-время изменения статуса (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status_at")
     */
    public $statusAt;

    /**
     * Отмена забора и доставки груза только через диспетчера
     *
     * @var bool
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_manual_processing")
     */
    public $isManualProcessing;
}