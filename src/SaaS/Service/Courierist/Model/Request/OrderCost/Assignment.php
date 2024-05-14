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
     * @var double
     *
     * @JSM\Type("double")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * Тип поручения
     *
     * @var integer
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("type")
     */
    public $type;
}