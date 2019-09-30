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
 * Class PointsForParcels
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
class PointsForParcels
{
    /**
     * Код пункта приема
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
     * Наименование
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
     * Населенный пункт
     *
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("City")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $city;
}
