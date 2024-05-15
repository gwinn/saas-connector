<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

use SaaS\Service\Courierist\Model\Request\OrderCost\Location;
use SaaS\Service\Courierist\Model\Request\OrderCost\Shipment;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderCost
 *
 * @category Models
 *
 */
class OrderCost
{
    /**
     * Массив из адресов забора и доставки
     *
     * @var Location[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Request\OrderCost\Location>")
     * @JMS\SerializedName("locations")
     */
    public $locations;

    /**
     * Массив грузов к заказу
     *
     * @var Shipment[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Request\OrderCost\Shipment>")
     * @JMS\SerializedName("shipment")
     */
    public $shipment;
}