<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Assignment
 *
 * @category Models
 *
 */
class Assignment
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
     * N=1 - наложенный платеж (по умолчанию)
     * N=2 - расход
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("type")
     */
    public $type;
}