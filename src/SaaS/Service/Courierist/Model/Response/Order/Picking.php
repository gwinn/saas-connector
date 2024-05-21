<?php

namespace SaaS\Service\Courierist\Model\Response\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Picking
 *
 * @category Models
 *
 */
class Picking
{
    /**
     * Идентификатор груза
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     */
    public $id;

    /**
     * Артикул груза
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("article")
     */
    public $article;

    /**
     * Название груза
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Статус груза
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * Описание статуса груза
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("statusLabel")
     */
    public $statusLabel;

    /**
     * Ценность груза
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("value")
     */
    public $value;

    /**
     * Ширина груза
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("weight")
     */
    public $weight;

    /**
     * Длина груза
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("length")
     */
    public $length;
}