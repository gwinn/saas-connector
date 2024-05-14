<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCost;

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
     * @JSM\Type("array<Gwinn\SaaS\Service\Courierist\OrderData\Location>")
     * @JMS\SerializedName("locations")
     */
    public $locations;

    /**
     * Массив грузов к заказу
     *
     * @var Shipment[]
     *
     * @JSM\Type("array<Gwinn\SaaS\Service\Courierist\OrderData\Shipment>")
     * @JMS\SerializedName("shipment")
     */
    public $shipment;
}