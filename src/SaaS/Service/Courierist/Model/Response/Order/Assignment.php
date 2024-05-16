<?php

namespace SaaS\Service\Courierist\Model\Response\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Location
 *
 * @category Models
 *
 */
class Assignment
{
    /**
     * Id поручения
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("id")
     */
    public $id;

    /**
     * Название услуги
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Статус поручения
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * Описание статуса поручения
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("statusLabel")
     */
    public $statusLabel;
}