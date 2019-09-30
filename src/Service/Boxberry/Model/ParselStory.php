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
 * Class ParselStory
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
class ParselStory
{
    /**
     * трекинг код посылки
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
     * ссылка на скачивание pdf файла с этикетками
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
     * дата создания посылки в формате YYYY.MM.DD HH:MM:SS
     *
     * @var string $date
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("date")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $date;

    /**
     * признак проведения посылки в акт
     *
     * @var boolean $send
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("send")
     *
     * @Annotations\FakeMockField()
     */
    public $send;

    /**
     * штрих код посылки
     *
     * @var string $barcode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("barcode")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $barcode;

    /**
     * номер заказа, присвоенный ИМ
     *
     * @var string $imid
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("imid")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $imid;
}
