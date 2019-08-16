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

namespace SaaS\Service\Boxberry\Model\Request;

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
     * код пункта приема посылок (если не указан, то используется код п/п из настроек ЛК ИМ)
     *
     * @var string $targetstart
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("targetstart")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $targetstart;

    /**
     * ПВЗ (для расчета доставки до отделения)
     *
     * @var string $target
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("target")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $target;

    /**
     * стоимость заказа без учета стоимости доставки
     *
     * @var string $ordersum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ordersum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $ordersum;

    /**
     * сумма к оплате
     *
     * @var string $paysum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("paysum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $paysum;

    /**
     * Заявленная стоимость доставки (на расчет не влияет)
     *
     * @var string $deliverysum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("deliverysum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $deliverysum;

    /**
     * вес посылки (грамм)
     *
     * @var string $weight
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("weight")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $weight;

    /**
     * высота коробки (см)
     *
     * @var string $height
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("height")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $height;

    /**
     * ширина коробки (см)
     *
     * @var string $width
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("width")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $width;

    /**
     * глубина коробки (см)
     *
     * @var string $depth
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("depth")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $depth;

    /**
     * почтовый индекс получателя  (для расчета курьерской доставки). Код пункта выдачи (target) игнорируется
     *
     * @var string $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $zip;

    /**
     * Расчет с учетом наценок, установленных в ЛК ИМ
     * - Настройки средств интеграции - Расчеты - Включить настройки расчета
     *
     * Возможные значения: 1 - получить расчет с учетом индивидуальных настроек
     *
     * @var string $sucrh
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sucrh")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $sucrh;

    /**
     * название CMS. Параметр предназначен для разработчиков CMS, проводящих интеграцию с Boxberry
     *
     * @var string $cms
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("cms")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $cms;
}
