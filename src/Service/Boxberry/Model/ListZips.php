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
 * Class ListZips
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
class ListZips
{
    /**
     * Почтовый индекс
     *
     * @var string $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Zip")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $zip;

    /**
     * Наименование города
     *
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("City")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $city;

    /**
     * Район
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
     * Регион
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
     * Зона курьерской доставки
     *
     * @var integer $zoneExpressDelivery
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ZoneExpressDelivery")
     *
     * @Annotations\FakeMockField()
     */
    public $zoneExpressDelivery;

    /**
     * Удаленность почтового индекса, принимает значения от 0 до 9, где 0 - индекс не является удаленным.
     *
     * @var integer $remoteness
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("Remoteness")
     *
     * @Annotations\FakeMockField()
     */
    public $remoteness;
}
