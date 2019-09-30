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
 * Class ListCities
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
class ListCities
{
    /**
     * Наименование города
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
     * Код города в boxberry
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
     * Код страны
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
     * Префикс: г - Город, п - Поселок и т.д
     *
     * @var string $prefix
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Prefix")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $prefix;

    /**
     * Прием писем и посылок от физ.лиц (0/1)
     *
     * @var integer $receptionLaP
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ReceptionLaP")
     *
     * @Annotations\FakeMockField()
     */
    public $receptionLaP;

    /**
     * Выдача писем и посылок физ.лиц (0/1)
     *
     * @var integer $deliveryLaP
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("DeliveryLaP")
     *
     * @Annotations\FakeMockField()
     */
    public $deliveryLaP;

    /**
     * Прием заказов от ИМ на пунктах выдачи (0/1)
     *
     * @var integer $reception
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("Reception")
     *
     * @Annotations\FakeMockField()
     */
    public $reception;

    /**
     * Прием международных возвратов (0/1)
     *
     * @var integer $foreignReceptionReturns
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ForeignReceptionReturns")
     *
     * @Annotations\FakeMockField()
     */
    public $foreignReceptionReturns;

    /**
     * Наличие терминала в городе (0/1)
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
     * ИД КЛАДРа
     *
     * @var string $kladr
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Kladr")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $kladr;

    /**
     * Регион
     *
     * @var string $region
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Region")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $region;

    /**
     * Составное уникальное имя (для городов с не уникальным наименованием город + область + район)
     *
     * @var string $uniqName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("UniqName")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $uniqName;

    /**
     * Район
     *
     * @var string $district
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("District")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $district;

    /**
     * Наличие курьерского забора (0/1)
     *
     * @var integer $courierReception
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("CourierReception")
     *
     * @Annotations\FakeMockField()
     */
    public $courierReception;
}
