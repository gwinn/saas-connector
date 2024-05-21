<?php

namespace SaaS\Service\Courierist\Model\Response\Traits;

/**
 * Class OrderTrait
 *
 * @category Models
 *
 */
trait OrderTrait
{
    /**
     * id Заказа
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("order")
     */
    public $id;

    /**
     * Трек-номер Заказа
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     */
    public $code;

    /**
     * Цена Заказа
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * Дата создания (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     */
    public $createdAt;

    /**
     * Дата оценки (формат YYYY-MM-DD)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("estimate_at")
     */
    public $estimateAt;

    /**
     * Статус
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("status")
     */
    public $status;
}