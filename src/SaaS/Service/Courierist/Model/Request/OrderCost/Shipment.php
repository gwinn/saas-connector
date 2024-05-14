<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Shipment
 *
 * @category Models
 *
 */
class Shipment
{
    /**
     * Наложенный платеж
     *
     * @var double
     *
     * @JSM\Type("double")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * Вес в кг
     *
     * @var double
     *
     * @JSM\Type("double")
     * @JMS\SerializedName("weight")
     */
    public $weight;

    /**
     * Габариты в см
     *
     * @var double
     *
     * @JSM\Type("double")
     * @JMS\SerializedName("length")
     */
    public $length;

    /**
     * Ценность в рублях
     *
     * @var double
     *
     * @JSM\Type("double")
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
