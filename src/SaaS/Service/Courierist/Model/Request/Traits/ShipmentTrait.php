<?php

namespace SaaS\Service\Courierist\Model\Request\Traits;

/**
 * Class ShipmentTrait.
 */
trait ShipmentTrait
{
    /**
     * Наложенный платеж
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * Вес в кг
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("weight")
     */
    public $weight;

    /**
     * Габариты в см
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("length")
     */
    public $length;

    /**
     * Ценность в рублях
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("value")
     */
    public $value;

    /**
     * Количество упаковок, шт
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("unit")
     */
    public $unit;

    /**
     * id Типа груза
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("type_id")
     */
    public $typeId;
}