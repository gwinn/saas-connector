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
 * Class ParselSend
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
class ParselSend
{
    /**
     * номер акта
     *
     * @var string $id
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $id;

    /**
     * ссылка на печатную форму акта
     *
     * @var string $label
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("label")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $label;

    /**
     * ссылка на печатную форму этикеток
     *
     * @var string $sticker
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sticker")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $sticker;
}
