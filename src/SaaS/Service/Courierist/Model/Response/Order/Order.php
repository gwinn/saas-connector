<?php

namespace SaaS\Service\Courierist\Model\Response\Order;
use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\OrderDelete\Order\Location;
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
     * Адреса забора и доставки
     *
     * @var Location[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Response\Order\Location>")
     * @JMS\SerializedName("locations")
     */
    public $locations;
}