<?php

namespace SaaS\Service\Courierist\Model\Response\OrderGet;

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
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    public $description;

    /**
     * Цена услуги
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("price")
     */
    public $price;
}