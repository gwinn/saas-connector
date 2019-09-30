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
 * Class ParcelCreate
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
class ParcelCreate
{
    /**
     * Трек-номер посылки для отслеживания
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
     * Ссылка на печать этикетки (генерируется если не передан штрих-код интернет-магазина)
     *
     * @var string $label
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("label")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $label;
}
