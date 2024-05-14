<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Location
 *
 * @category Models
 *
 */
class Location
{
    /**
     * Адрес
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("address")
     */
    public $address;

    /**
     * Широта
     *
     * @var double
     *
     * @JSM\Type("double")
     * @JMS\SerializedName("latitude")
     */
    public $latitude;

    /**
     * Долгота
     *
     * @var double
     *
     * @JSM\Type("double")
     * @JMS\SerializedName("longtitude")
     */
    public $longtitude;

    /**
     * Дата доставки (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("delivery_date")
     */
    public $deliveryDate;

    /**
     * Время доставки от (формат HH:MM)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("delivery_from")
     */
    public $deliveryFrom;

    /**
     * Время доставки до (формат HH:MM)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("delivery_to")
     */
    public $deliveryTo;

    /**
     * Массив поручений
     *
     * @var Assignment[]
     *
     * @JSM\Type("array<Gwinn\SaaS\Service\Courierist\OrderData\Assignment>")
     * @JMS\SerializedName("assignments")
     */
    public $assignments;
}