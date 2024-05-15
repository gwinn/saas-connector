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
     * @JSM\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * Вес в кг
     *
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("weight")
     */
    public $weight;

    /**
     * Габариты в см
     *
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("length")
     */
    public $length;

    /**
     * Ценность в рублях
     *
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("value")
     */
    public $value;

    /**
     * Количество упаковок, шт
     *
     * @var integer
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("unit")
     */
    public $unit;

    /**
     * id Типа груза
     *
     * @var integer
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("type_id")
     */
    public $typeId;
}