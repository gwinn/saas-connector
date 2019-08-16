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
 * Class ListServices
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
class ListServices
{
    /**
     * Дата начисления в формате "ГГГГ-ММ-ДДTЧЧ:ММ:СС"
     *
     * @var string $date
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Date")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $date;

    /**
     * Название услуги
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
     * Сумма начисленная за оказание услуги, руб
     *
     * @var string $sum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("Sum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $sum;

    /**
     * Способ оплаты. Возможные значения: "Касса", "Банк", "Эквайринг"
     *
     * @var integer $paymentMethod
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("PaymentMethod")
     *
     * @Annotations\FakeMockField()
     */
    public $paymentMethod;
}
