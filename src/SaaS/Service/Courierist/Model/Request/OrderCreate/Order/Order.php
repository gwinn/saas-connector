<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCreate\Order;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Shipment;
use SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Location;
use SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Contact;

/**
 * Class Order
 *
 * @category Models
 *
 */
class Order
{
    /**
     * Комментарий к заказу для логистов
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("comment")
     */
    public $comment;

    /**
     * Частичная доставка допустима (true / false или не передается)
     *
     * @var bool|null
     *
     * @JSM\Type("boolean|null")
     * @JMS\SerializedName("is_partial_delivering")
     */
    public $isPartialDelivering;

    /**
     * Вскрытие заводской упаковки допустимо (true / false или не передается)
     *
     * @var bool|null
     *
     * @JSM\Type("boolean|null")
     * @JMS\SerializedName("is_opening_package_allowed")
     */
    public $isOpeningPackageAllowed;

    /**
     * Примерка/проверка грузов в заказе допустима (true / false или не передается)
     *
     * @var bool|null
     *
     * @JSM\Type("boolean|null")
     * @JMS\SerializedName("is_fitting_allowed")
     */
    public $isFittingAllowed;

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
     * Массив из адресов забора и доставки
     *
     * @var Location[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Location>")
     * @JMS\SerializedName("locations")
     */
    public $locations;

    /**
     * Массив грузов к заказу
     *
     * @var Shipment[]
     *
     * @JSM\Type("array<SaaS\Service\Courierist\Model\Request\OrderCreate\Order\Shipment>")
     * @JMS\SerializedName("shipment")
     */
    public $shipment;

    /**
     * Тестовая строка, будет возвращена в тексте сообщения о ошибке в виде
     * [DEBUG: test]
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("debug")
     */
    public $debug;
}