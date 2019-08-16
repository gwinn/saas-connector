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

namespace SaaS\Service\Boxberry\Model\Request\ParcelCreate;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class Shop
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
class Shop
{
    /**
     * Код пункта выдачи
     *
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $name;

    /**
     * Код пункта поступления
     *
     * @var string $name1
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name1")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $name1;
}
