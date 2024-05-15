<?php

namespace SaaS\Service\Courierist\Model\Request\Traits;

/**
 * Class LocationTrait.
 */
trait LocationTrait
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
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("latitude")
     */
    public $latitude;

    /**
     * Долгота
     *
     * @var float
     *
     * @JSM\Type("float")
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
}