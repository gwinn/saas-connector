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
     * @JSM\Type("integer")
     * @JMS\SerializedName("id")
     */
    public $id;

    /**
     * Адрес
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("address")
     */
    public $address;

    /**
     * Внутренний номер заказа у заказчика
     *
     * @var string|null
     *
     * @JSM\Type("string|null")
     * @JMS\SerializedName("external_id")
     */
    public $externalId;

    /**
     * Статус заказа по адресу
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("status")
     */
    public $status;
}