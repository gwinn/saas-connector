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

namespace SaaS\Service\Boxberry\Model\ListStatusesFull;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations;

/**
 * Class Products
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
class Products
{
    /**
     * Наименование товарной позиции
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
     * Выданное количество единиц товарной позиции
     *
     * @var integer $give
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("Give")
     *
     * @Annotations\FakeMockField()
     */
    public $give;

    /**
     * Количество единиц товарной позиции на возврат
     *
     * @var integer $return
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("Return")
     *
     * @Annotations\FakeMockField()
     */
    public $return;

    /**
     * Артикул товарной позиции
     *
     * @var string $comment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Item_ID")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $itemId;
}
