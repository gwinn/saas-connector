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
 * Class ParselSendStory
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
class ParselSendStory
{
    /**
     * список трекинг кодов посылок в акте
     *
     * @var string $track
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("track")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $track;

    /**
     * ссылка на скачивание акта, если доступна
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
     * дата создания акта в формате YYYY.MM.DD HH:MM:SS
     *
     * @var string $date
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("date")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $date;
}
