<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

use SaaS\Service\Courierist\Model\Request\OrderCost\Location;
use SaaS\Service\Courierist\Model\Request\OrderCost\Shipment;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderCostRequest
 *
 * @category Models
 *
 */
class OrderCostRequest
{
    /**
     * Массив из адресов забора и доставки
     *
     * @var Location[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Request\OrderCost\Location>")
     * @JMS\SerializedName("locations")
     */
    public $locations;

    /**
     * Массив грузов к заказу
     *
     * @var Shipment[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Request\OrderCost\Shipment>")
     * @JMS\SerializedName("shipment")
     */
    public $shipment;
}