<?php
/**
     *
     *
 * PHP version 7.1
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace SaaS\Service\Boxberry\Model\Request\ParcelCreate;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class Kurdost
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @Annotations\FakeMock()
 */
class Kurdost
{
    /**
     * Почтовый индекс адреса получателя
     *
     * @var string $index
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("index")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $index;

    /**
     * Населенный пункт получателя.
     *
     * Для небольших населенных пунктов указывать дополнительно Область, Район, Город
     * адрес проверяется сторонним сервисом и должен определяться однозначно.
     *
     * Допустимы варианты:
     * Свердловская, Кушва, Баранчинский
     * Свердловская обл, г Кушва, поселок Баранчинский
     *
     * @var string $citi
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("citi")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $citi;

    /**
     * Адрес получателя
     *
     * @var string $addressp
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("addressp")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $addressp;

    /**
     * Дата курьерской доставки (формат ГГГГ-ММ-ДД). Может принимать значения +1 +5 дней от текущей даты.
     * Значение по умолчанию - текущая дата + 1 день.
     * По другим направлениям игнорируется.
     *
     * @var string $deliveryDate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_date")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $deliveryDate;

    /**
     * Время курьерской доставки ОТ (формат чч:мм).
     * Значение по умолчанию 10:00
     *
     * @var string $timesfrom1
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("timesfrom1")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $timesfrom1;

    /**
     * Время курьерской доставки ДО (формат чч:мм)
     * Значение по умолчанию 18:00
     *
     * Интервал доставки "ОТ-ДО" должен быть не менее 3 часов.
     * Если интервал меньше 3 часов, он корректируется без уведомления.
     *
     * @var string $timesto1
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("timesto1")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $timesto1;

    /**
     * Альтернативное время, от
     *
     * @var string $timesfrom2
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("timesfrom2")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $timesfrom2;

    /**
     * Альтернативное время, до
     *
     * @var string $timesto2
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("timesto2")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $timesto2;

    /**
     * Время доставки текстовый формат
     *
     * @var string $timep
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("timep")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $timep;

    /**
     * Комментарий по доставке
     *
     * @var string $comentk
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comentk")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $comentk;

    /**
     * Тип отправления, возможные значения:
     * 0 - Посылка,
     * 2 - Курьер Онлайн,
     * 3 - Посылка Онлайн,
     * 5 - Посылка 1й класс.
     *
     * Если не передано, значение по умолчанию 0.
     *
     * @var string $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $type;

    /**
     * Хрупкая посылка, возможные значения 0 и 1.
     * Если не передано, значение по умолчанию 0.
     *
     * @var string $fragile
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fragile")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $fragile;

    /**
     * Строгий тип, возможные значения 0 и 1.
     * Если не передано, значение по умолчанию 0.
     *
     * @var string $strong
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("strong")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $strong;

    /**
     * Оптимизация тарифа, возможные значения 0 и 1. Если не передано, значение по умолчанию 1.
     * Параметры strong и optimize являются взаимоисключающими и не могут одновременно принимать значение 1.
     *
     * @var string $optimize
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("optimize")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $optimize;

    /**
     * Тип упаковки, возможные значения:
     * 0 - упаковка ИМ, сумма сторон </= 106 см
     * 1 - упаковка ИМ, сумма сторон > 106 см
     * 2 - упаковка Boxberry, сумма сторон </= 106 см
     * 3 - упаковка Boxberry, сумма сторон > 106 см
     *
     * @var integer $packingType
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("packing_type")
     *
     * @Annotations\FakeMockField()
     */
    public $packingType;

    /**
     * Строгая упаковка, возможные значения:
     * true - изменение упаковки в процессе транспортировки запрещено
     * false - изменение упаковки разрешено
     *
     * @var boolean $packingStrict
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("packing_strict")
     *
     * @Annotations\FakeMockField()
     */
    public $packingStrict;
}
