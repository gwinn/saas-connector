<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCalculate;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\Traits\LocationTrait;
use SaaS\Service\Courierist\Model\Request\OrderCalculate\Assignment;

/**
 * Class LocationTrait
 *
 * @category Models
 *
 */
class Location
{
    use LocationTrait;
    /**
     * Массив поручений
     *
     * @var Assignment[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Request\OrderCalculate\Assignment>")
     * @JMS\SerializedName("assignments")
     */
    public $assignments;
}