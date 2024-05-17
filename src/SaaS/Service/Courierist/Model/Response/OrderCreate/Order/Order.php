<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCreate\Order;

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
     * Оплата при получении
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("pod")
     */
    public $pod;

    /**
     * Время изменения статуса
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("status_at")
     */
    public $statusAt;

    /**
     * Время изменения статуса
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("locations")
     */
    public $locations;
}