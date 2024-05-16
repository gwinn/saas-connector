<?php

namespace SaaS\Service\Courierist\Model\Response\OrderDelete\Order;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\Traits\OrderTrait;

/**
 * Class Order
 *
 * @category Models
 *
 */

class Order
{
    use OrderTrait;

    /**
     * Адреса зобора и доставки
     *
     * @var Location[]
     *
     * @JSM\Type("SaaS\Service\Courierist\Model\Response\OrderDelete\Order\Location")
     * @JMS\SerializedName("locations")
     */
    public $locations;
}