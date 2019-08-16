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
 * Class Items
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
class Items
{
    /**
     * Артикул товара
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
     * Наименование товара
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
     * Единица измерения
     *
     * @var string $unitName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("UnitName")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $unitName;

    /**
     * Процент НДС (число от 0 до 20)
     *
     * @var string $nds
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("nds")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $nds;

    /**
     * Цена за единицу товара
     *
     * @var string $price
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("price")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $price;

    /**
     * Количество единиц товара
     *
     * @var string $quantity
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("quantity")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $quantity;
}
