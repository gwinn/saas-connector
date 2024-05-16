<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\Traits\LocationTrait;
use SaaS\Service\Courierist\Model\Request\OrderCost\Assignment;

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
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Request\OrderCost\Assignment>")
     * @JMS\SerializedName("assignments")
     */
    public $assignments;
}