<?php

namespace SaaS\Service\Courierist\Model\Request\Traits;

trait AssignmentTrait
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
     * Тип поручения
     *
     * 1 - получить деньги (по умолчанию)
     * 2 - отдать деньги
     *
     * @var integer
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("type")
     */
    public $type;
}