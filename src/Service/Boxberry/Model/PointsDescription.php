<?php
/**
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
 * Class PointsDescription
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
class PointsDescription
{
    use PointsDescription\WorkShedule;
    use PointsDescription\Terminal;

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
     * Наименование юр. лица
     *
     * @var string $organization
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Organization")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $organization;

    /**
     * Почтовый индекс
     *
     * @var integer $zipCode
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ZipCode")
     *
     * @Annotations\FakeMockField()
     */
    public $zipCode;

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
     * Наименование населенного пункта
     *
     * @var integer $settlement
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("Settlement")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $settlement;

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
     * Название улицы
     *
     * @var string $street
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Street")
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
     * @JMS\SerializedName("House")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $house;

    /**
     * Корпус
     *
     * @var string $structure
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Structure")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $structure;

    /**
     * Строение
     *
     * @var string $housing
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Housing")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $housing;

    /**
     * Офис/Квартира
     *
     * @var string $apartment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Apartment")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $apartment;

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
     * Выдача посылок только из зарубежных интернет-магазинов (true/false)
     *
     * @var boolean $foreignOnlineStoresOnly
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("ForeignOnlineStoresOnly")
     *
     * @Annotations\FakeMockField()
     */
    public $foreignOnlineStoresOnly;

    /**
     * Выдача только полностью оплаченных посылок:
     * true - только выдача посылок без приема оплаты,
     * false - выдача любых посылок
     *
     * @var boolean $prepaidOrdersOnly
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("PrepaidOrdersOnly")
     *
     * @Annotations\FakeMockField()
     */
    public $prepaidOrdersOnly;

    /**
     * Возможность оплаты банковской картой (true/false)
     *
     * @var boolean $acquiring
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("Acquiring")
     *
     * @Annotations\FakeMockField()
     */
    public $acquiring;

    /**
     * Наличие планшета для цифровой подписи:
     * true - Подпись получателя будет хранится в системе boxberry в электронном виде,
     * false - отсутствуют подписи в электронном виде
     *
     * @var boolean $digitalSignature
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("DigitalSignature")
     *
     * @Annotations\FakeMockField()
     */
    public $digitalSignature;

    /**
     * Тип пункта выдачи: 1- собственное отделение, 2- партнерское
     *
     * @var integer $typeOfOffice
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("TypeOfOffice")
     *
     * @Annotations\FakeMockField()
     */
    public $typeOfOffice;

    /**
     * Пункт выдачи осуществляет курьерскую доставку (true/false)
     *
     * @var boolean $courierDelivery
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("CourierDelivery")
     *
     * @Annotations\FakeMockField()
     */
    public $courierDelivery;

    /**
     * Прием писем и посылок от физ.лиц (true/false)
     *
     * @var boolean $receptionLaP
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("ReceptionLaP")
     *
     * @Annotations\FakeMockField()
     */
    public $receptionLaP;

    /**
     * Выдача писем и посылок физ.лиц (true/false)
     *
     * @var boolean $deliveryLaP
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("DeliveryLaP")
     *
     * @Annotations\FakeMockField()
     */
    public $deliveryLaP;

    /**
     * Ограничение веса, кг
     *
     * @var integer $loadLimit
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("LoadLimit")
     *
     * @Annotations\FakeMockField()
     */
    public $loadLimit;

    /**
     * Ограничение объема, м3
     *
     * @var integer $volumeLimit
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("VolumeLimit")
     *
     * @Annotations\FakeMockField()
     */
    public $volumeLimit;

    /**
     * Возможность частичной выдачи заказа (true/false)
     *
     * @var boolean $enablePartialDelivery
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("EnablePartialDelivery")
     *
     * @Annotations\FakeMockField()
     */
    public $enablePartialDelivery;

    /**
     * Возможность примерки (true/false)
     *
     * @var boolean $enableFitting
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("EnableFitting")
     *
     * @Annotations\FakeMockField()
     */
    public $enableFitting;

    /**
     * Тип примерки: 1 - частичная, 2 - полная
     *
     * @var boolean $fittingType
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("fittingType")
     *
     * @Annotations\FakeMockField()
     */
    public $fittingType;

    /**
     * Массив фотографий пункта выдачи
     *
     * @var array $photos
     *
     * @JMS\Type("array<PointsDescription\Photos>")
     * @JMS\SerializedName("photos")
     */
    public $photos;

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
     * Возможный вид транспортировки:
     * 0 - любой транспорт,
     * 1 - автотранспорт,
     * 2 - авиадоставка
     *
     * @var integer $transType
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("TransType")
     *
     * @Annotations\FakeMockField()
     */
    public $transType;

    /**
     * Прием международных возвратов (0/1)
     *
     * @var integer $interRefunds
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("InterRefunds")
     *
     * @Annotations\FakeMockField()
     */
    public $interRefunds;

    /**
     * Экспресс-прием заказов от интернет-магазинов (0/1)
     *
     * @var integer $expressReception
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ExpressReception")
     *
     * @Annotations\FakeMockField()
     */
    public $expressReception;

    /**
     * Отделение является терминалом (0/1)
     *
     * @var integer $terminal
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("Terminal")
     *
     * @Annotations\FakeMockField()
     */
    public $terminal;

    /**
     * Отделение осуществляет выдачу посылок (0/1)
     *
     * @var integer $issuanceBoxberry
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("IssuanceBoxberry")
     *
     * @Annotations\FakeMockField()
     */
    public $issuanceBoxberry;

    /**
     * Фактический график работы отделения,
     * содержит актуальную информацию в случае временных изменений в работе отделения.
     * Передается json-кодированной строкой
     *
     * @var string $schedule
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("schedule")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $schedule;
}
