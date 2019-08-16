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
 * Class ZipCheck
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
class ZipCheck
{
    /**
     * Возможность курьерской доставки по заданному индексу (true/false)
     *
     * @var boolean $expressDelivery
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("ExpressDelivery")
     *
     * @Annotations\FakeMockField()
     */
    public $expressDelivery;

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
