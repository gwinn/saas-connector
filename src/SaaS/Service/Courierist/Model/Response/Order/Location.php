<?php

namespace SaaS\Service\Courierist\Model\Response\Order;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\Traits\LocationTrait;
use SaaS\Service\Courierist\Model\Response\Order\Picking;
use SaaS\Service\Courierist\Model\Response\Order\Assignment;
use SaaS\Service\Courierist\Model\Response\Order\Service;

/**
 * Class Location
 *
 * @category Models
 *
 */
class Location
{
    use LocationTrait;

    /**
     * id назначенной задачи
     *
     * @var int|null
     *
     * @JSM\Type("integer|null")
     * @JMS\SerializedName("task_id")
     */
    public $taskId;

    /**
     * Ссылка для отслеживания заказа
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("trackingLink")
     */
    public $trackingLink;

    /**
     * Причина изменения/отмены
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("reason")
     */
    public $reason;

    /**
     * Список грузов, которые забираюстя
     *
     * @var Picking[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Response\Order\Picking>")
     * @JMS\SerializedName("pickings")
     */
    public $pickings;

    /**
     * Список грузов, которые доставляются
     *
     * @var array
     *
     * @JSM\Type("array")
     * @JMS\SerializedName("deliveries")
     */
    public $deliveries;

    /**
     * Поручения
     *
     * @var Assignment[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Response\Order\Assignment>")
     * @JMS\SerializedName("assignments")
     */
    public $assignments;

    /**
     * Услуги
     *
     * @var Service[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Response\Order\Service>")
     * @JMS\SerializedName("services")
     */
    public $services;
}