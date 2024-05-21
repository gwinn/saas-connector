<?php

namespace SaaS\Service\Courierist\Model\Request\Traits;

trait AssignmentTrait
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
     * Тип поручения
     *
     * 1 - получить деньги (по умолчанию)
     * 2 - отдать деньги
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("type")
     */
    public $type;
}