<?php

namespace SaaS\Service\Courierist\Model\Response\OrderGet;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\Traits\LocationTrait;
use SaaS\Service\Courierist\Model\Response\OrderGet\Picking;
use SaaS\Service\Courierist\Model\Response\OrderGet\Assignment;
use SaaS\Service\Courierist\Model\Response\OrderGet\Service;

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
     * @JMS\Type("integer|null")
     * @JMS\SerializedName("task_id")
     */
    public $taskId;

    /**
     * Ссылка для отслеживания заказа
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("trackingLink")
     */
    public $trackingLink;

    /**
     * Причина изменения/отмены
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("reason")
     */
    public $reason;

    /**
     * Список грузов, которые забираюстя
     *
     * @var Picking[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Response\Order\Picking>")
     * @JMS\SerializedName("pickings")
     */
    public $pickings;

    /**
     * Список грузов, которые доставляются
     *
     * @var array
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("deliveries")
     */
    public $deliveries;

    /**
     * Поручения
     *
     * @var Assignment[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Response\Order\Assignment>")
     * @JMS\SerializedName("assignments")
     */
    public $assignments;

    /**
     * Услуги
     *
     * @var Service[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Response\Order\Service>")
     * @JMS\SerializedName("services")
     */
    public $services;
}