<?php

namespace SaaS\Service\Courierist\Model\Request\Order;

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
     * @JSM\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Мобильный телефон (10 символов, начинается с 9)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("phone")
     */
    public $phone;

    /**
     * Видимый email адрес
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("email")
     */
    public $email;

    /**
     * Примечание
     *
     * @var string
     *
     * @JSM\Type("string")
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
     * @JSM\Type("integer")
     * @JMS\SerializedName("type")
     */
    public $type;
}