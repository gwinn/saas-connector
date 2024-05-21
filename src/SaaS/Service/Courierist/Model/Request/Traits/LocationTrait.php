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
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     */
    public $address;

    /**
     * Широта
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("latitude")
     */
    public $latitude;

    /**
     * Долгота
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("longtitude")
     */
    public $longtitude;

    /**
     * Дата доставки (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_date")
     */
    public $deliveryDate;

    /**
     * Время доставки от (формат HH:MM)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_from")
     */
    public $deliveryFrom;

    /**
     * Время доставки до (формат HH:MM)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_to")
     */
    public $deliveryTo;
}