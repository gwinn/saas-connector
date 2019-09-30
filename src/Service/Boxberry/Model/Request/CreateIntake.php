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

namespace SaaS\Service\Boxberry\Model\Request;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class CreateIntake
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
class CreateIntake
{
    /**
     * Почтовый индекс
     *
     * @var string $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $zip;

    /**
     * Город
     *
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $city;

    /**
     * Улица
     *
     * @var string $street
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $street;

    /**
     * Дом
     *
     * @var string $house
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("house")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $house;

    /**
     * Корпус
     *
     * @var string $building
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("building")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $building;

    /**
     * Строение
     *
     * @var string $housing
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("housing")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $housing;

    /**
     * офис
     *
     * @var string $flat
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("flat")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $flat;

    /**
     * Контактное лицо
     *
     * @var string $contactPrson
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_person")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $contactPrson;

    /**
     * Контактный телефон
     *
     * @var string $contactPhone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_phone")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $contactPhone;

    /**
     * Дата забора
     *
     * @var string $takingDate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("taking_date")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $takingDate;

    /**
     * Время забора с
     *
     * @var string $takingTimeFrom
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("taking_time_from")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $takingTimeFrom;

    /**
     * Время забора по
     *
     * @var string $takingTimeTo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("taking_time_to")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $takingTimeTo;

    /**
     * Колисество мест
     *
     * @var string $seatsCount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("seats_count")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $seatsCount;

    /**
     * Объем (м3)
     *
     * @var string $volume
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("volume")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $volume;

    /**
     * Вес (кг)
     *
     * @var string $weight
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("weight")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $weight;

    /**
     * Комментарий
     *
     * @var string $comment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comment")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $comment;
}
