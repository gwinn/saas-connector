<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCreate\Order;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\Traits\LocationTrait;
use SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Contact;
use SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Assignment;

/**
 * Class LocationTrait
 *
 * @category Models
 *
 */
class Location
{
    use LocationTrait;
    /**
     * Комментарий для курьера
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("comment")
     */
    public $comment;

    /**
     * Внутренний номер заказа у заказчика
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("external_id")
     */
    public $externalId;

    /**
     * Пин код для курьера на адресе забора (4-6 символов)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("pin")
     */
    public $pin;

    /**
     * Предзаполнение кодов
     * для подтверждения доставки вместо отправки одноразовых (4-6 цифр)
     *
     * @var string|array<string>
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("otp")
     */
    public $otp;

    /**
     * Сумма предоплаты за наложенный платеж
     *
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("prepayment")
     */
    public $prepayment;

    /**
     * Контактное лицо
     *
     * @var Contact
     *
     * @JSM\Type("SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Contact")
     * @JMS\SerializedName("contact")
     */
    public $contact;

    /**
     * Массив поручений
     *
     * @var Assignment[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Assignment>")
     * @JMS\SerializedName("assignments")
     */
    public $assignments;
}