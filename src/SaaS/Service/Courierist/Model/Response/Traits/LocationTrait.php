<?php

namespace SaaS\Service\Courierist\Model\Response\Traits;

/**
 * Class LocationTrait
 *
 * @category Models
 *
 */
trait LocationTrait
{
    /**
     * Идентификатор
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     */
    public $id;

    /**
     * Адрес
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     */
    public $address;

    /**
     * Внутренний номер заказа у заказчика
     *
     * @var string|null
     *
     * @JMS\Type("string|null")
     * @JMS\SerializedName("external_id")
     */
    public $externalId;

    /**
     * Статус заказа по адресу
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("status")
     */
    public $status;
}