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
 * Class DeliveryCosts
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
class DeliveryCosts
{
    /**
     * Итоговая стоимость доставки (равна price_base + price_service)
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
     * Стоимость базового тарифа
     *
     * @var string $priceBase
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("price_base")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $priceBase;

    /**
     * Стоимость обязательных дополнительных услуг, которые будут оказаны по отправлению согласно договора, такие как:
     *
     * @var string $priceService
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("price_service")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $priceService;

    /**
     * Срок доставки в календарных днях
     *
     * @var string $deliveryPeriod
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_period")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $deliveryPeriod;
}
