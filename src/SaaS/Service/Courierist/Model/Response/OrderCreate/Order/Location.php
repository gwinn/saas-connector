<?php

namespace SaaS\Service\Courierist\Model\Response\OrderCreate\Order;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\Traits\LocationTrait;

/**
 * Class Order
 *
 * @category Models
 *
 */
class Location
{
    use LocationTrait;

    /**
     * Id Назначенной задачи
     *
     * @var int|null
     *
     * @JSM\Type("integer|null")
     * @JMS\SerializedName("task_id")
     */
    public $taskId;

    /**
     * Номер или название адреса
     *
     * @var string|null
     *
     * @JSM\Type("string|null")
     * @JMS\SerializedName("address_place")
     */
    public $addressPlace;

    /**
     * Тип адреса, id записи
     *
     * @var int|null
     *
     * @JSM\Type("integer|null")
     * @JMS\SerializedName("address_type_id")
     */
    public $addressTypeId;

    /**
     * Детали адреса: подъезд, домофон, этаж и прочее
     *
     * @var string
     *
     * @JSM\Type("string|null")
     * @JMS\SerializedName("address_details")
     */
    public $addressDetails;

    /**
     * Id контакта
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("contact_id")
     */
    public $contactId;

    /**
     * Начало интервала прибытия на адрес
     *
     * @var string
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("delivery_from")
     */
    public $deliveryFrom;

    /**
     * Конец интервала прибытия на адрес
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("delivery_to")
     */
    public $deliveryTo;

    /**
     * Ссылка для отслеживания
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("trackingLink")
     */
    public $trackingLink;

    /**
     * Причина изменения/отмены
     *
     * @var string|null
     *
     * @JSM\Type("string|null")
     * @JMS\SerializedName("reason")
     */
    public $reason;

    /**
     * Комментарий для курьера
     *
     * @var string|null
     *
     * @JSM\Type("string|null")
     * @JMS\SerializedName("comment")
     */
    public $comment;

    /**
     * Сумма к получению на адресе
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("income")
     */
    public $income;

    /**
     * Способ оплаты:
     * null - сумма income не получена
     * 1 - сумма income получена наличными
     * 2 - сумма income оплачена картой
     *
     * @var int|null
     *
     * @JSM\Type("integer|null")
     * @JMS\SerializedName("payment_type")
     */
    public $paymentType;

    /**
     * Сумма предоплаты за наложенный платеж
     *
     * @var int
     *
     * @JSM\Type("integer")
     * @JMS\SerializedName("prepayment")
     */
    public $prepayment;

    /**
     * Дата посещения адреса в формате (YYYY-MM-DD)
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("delivery_date")
     */
    public $deliveryDate;
}