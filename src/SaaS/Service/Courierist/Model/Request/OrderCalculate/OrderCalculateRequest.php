<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCalculate;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\RequestModel;

/**
 * Class OrderCostRequest
 *
 * @category Models
 *
 */
class OrderCalculateRequest implements RequestModel
{
    /**
     * Массив из адресов забора и доставки
     *
     * @var Location[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Request\OrderCalculate\Location>")
     * @JMS\SerializedName("locations")
     */
    public $locations;

    /**
     * Массив грузов к заказу
     *
     * @var Shipment[]
     *
     * @JMS\Type("array<SaaS\Service\Courierist\Model\Request\OrderCalculate\Shipment>")
     * @JMS\SerializedName("shipment")
     */
    public $shipment;
}