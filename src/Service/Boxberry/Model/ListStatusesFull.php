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
 * Class ListStatusesFull
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
class ListStatusesFull
{
    /**
     * Массив статусов
     *
     * @var array $statuses
     *
     * @JMS\Type("array<SaaS\Service\Boxberry\Model\ListStatuses>")
     * @JMS\SerializedName("statuses")
     */
    public $statuses = [];

    /**
     * Признак частичной выдачи заказа (true / false)
     *
     * @var string $pd
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("PD")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $pd;

    /**
     * Сумма фактически принятых денежных средств с получателя
     *
     * @var string $sum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $sum;

    /**
     * Тип оплаты. Возможные значения: "Касса", "Банк", "Эквайринг"
     *
     * @var string $paymentMethod
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("PaymentMethod")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $paymentMethod;

    /**
     * Вес заказа фактический, кг
     *
     * @var float $weight
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("Weight")
     *
     * @Annotations\FakeMockField()
     */
    public $weight;

    /**
     * массив товаров (присутствует при PD=true)
     *
     * @var array $products
     *
     * @JMS\Type("array<SaaS\Service\Boxberry\Model\ListStatusesFull\Products>")
     * @JMS\SerializedName("products")
     */
    public $products = [];
}
