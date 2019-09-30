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

namespace SaaS\Service\Boxberry\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class ListPoints
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
class ListPoints
{
    /**
     * Код пункта выдачи в базе boxberry
     *
     * @var string $code
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Code")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $code;

    /**
     * Наименование пункта выдачи
     *
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Name")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $name;

    /**
     * Полный адрес
     *
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Address")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $address;

    /**
     * Телефон или телефоны
     *
     * @var string $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Phone")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $phone;

    /**
     * График работы
     *
     * @var string $workShedule
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkShedule")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $workShedule;

    /**
     * Описание проезда
     *
     * @var string $tripDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TripDescription")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $tripDescription;

    /**
     * Срок доставки в днях (по умолчанию срок доставки от Москвы)
     *
     * @var string $deliveryPeriod
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("DeliveryPeriod")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $deliveryPeriod;

    /**
     * Код города в Boxberry
     *
     * @var string $cityCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CityCode")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $cityCode;

    /**
     * Наименование города
     *
     * @var string $cityName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CityName")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $cityName;

    /**
     * Тарифная зона (по умолчанию для города отправления - Москва)
     *
     * @var string $tariffZone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TariffZone")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $tariffZone;

    /**
     * Наименование населенного пункта
     *
     * @var string $settlement
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Settlement")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $settlement;

    /**
     * Область
     *
     * @var string $area
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Area")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $area;

    /**
     * Наименование страны
     *
     * @var string $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Country")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $country;

    /**
     * Координаты GPS
     *
     * @var string $gps
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("GPS")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $gps;

    /**
     * Адрес сокращенный (улица, дом, номер квартиры)
     *
     * @var string $addressReduce
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("AddressReduce")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $addressReduce;

    /**
     * Выдача только полностью оплаченных посылок:
     * "Yes" - только выдача посылок без приема оплаты,
     * "No" - выдача любых посылок
     *
     * @var string $onlyPrepaidOrders
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("OnlyPrepaidOrders")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $onlyPrepaidOrders;

    /**
     * Возможность оплаты банковской картой (Yes/No)
     *
     * @var string $acquiring
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Acquiring")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $acquiring;

    /**
     * Наличие планшета для цифровой подписи:
     * "Yes" - Подпись получателя будет хранится в системе boxberry в электронном виде
     * "No" - отсутствуют подписи в электронном виде
     *
     * @var string $digitalSignature
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("DigitalSignature")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $digitalSignature;

    /**
     * Код страны в Boxberry
     *
     * @var string $countryCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CountryCode")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $countryCode;

    /**
     * Отделение осуществляет курьерскую доставку (Yes/No)
     *
     * @var string $nalKD
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("NalKD")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $nalKD;

    /**
     * Станция метро
     *
     * @var string $metro
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Metro")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $metro;

    /**
     * Тип пункта выдачи: 1- собственное отделение, 2- партнерское
     *
     * @var string $typeOfOffice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TypeOfOffice")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $typeOfOffice;

    /**
     * Ограничение объема, м3
     *
     * @var string $volumeLimit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("VolumeLimit")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $volumeLimit;

    /**
     * Ограничение веса, кг
     *
     * @var string $loadLimit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("LoadLimit")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $loadLimit;
}
