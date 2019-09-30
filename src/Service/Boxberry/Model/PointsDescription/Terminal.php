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

namespace SaaS\Service\Boxberry\Model\PointsDescription;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class Terminal
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
trait Terminal
{

    /**
     * Код в базе boxberry
     *
     * @var string $terminalCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalCode")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalCode;

    /**
     * Наименование
     *
     * @var string $terminalName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalName")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalName;

    /**
     * Наименование юр. лица
     *
     * @var string $terminalOrganization
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalOrganization")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalOrganization;

    /**
     * Код города в Boxberry
     *
     * @var string $terminalCityCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalCityCode")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalCityCode;

    /**
     * Наименование города
     *
     * @var string $terminalCityName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalCityName")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalCityName;

    /**
     * Полный адрес
     *
     * @var string $terminalAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalAddress")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalAddress;

    /**
     * Телефон
     *
     * @var string $terminalPhone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TerminalPhone")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $terminalPhone;
}
