<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCreate\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Contact
 *
 * @category Models
 *
 */
class Contact
{
    /**
     * Имя
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Мобильный телефон (10 символов, начинается с 9)
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     */
    public $phone;

    /**
     * Валидный email адрес
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     */
    public $email;

    /**
     * Примечание или телефон в любом формате
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("note")
     */
    public $note;

    /**
     * Тип контактного лица
     * 1 - сотрудник заказчика
     * 2 - другое
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("type")
     */
    public $type;
}