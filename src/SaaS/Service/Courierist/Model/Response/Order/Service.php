<?php

namespace SaaS\Service\Courierist\Model\Response\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Location
 *
 * @category Models
 *
 */
class Service
{
    /**
     * Описание услуги
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("description")
     */
    public $description;

    /**
     * Цена услуги
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("price")
     */
    public $price;
}