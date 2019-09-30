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
 * Class ParcelCreate
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @JMS\ExclusionPolicy("all")
 * @Annotations\FakeMock()
 */
class ParcelCreate
{
    /**
     * Код пункта выдачи в базе boxberry
     *
     * @var string $updateByTrack
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updateByTrack")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $updateByTrack;

    /**
     * Наименование пункта выдачи
     *
     * @var string $orderId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("order_id")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $orderId;

    /**
     * Полный адрес
     *
     * @var string $palletNumber
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("PalletNumber")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $palletNumber;

    /**
     * Телефон или телефоны
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
     * График работы
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
     * Описание проезда
     *
     * @var string $paymentSum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_sum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $paymentSum;

    /**
     * Срок доставки в днях (по умолчанию срок доставки от Москвы)
     *
     * @var string $deliverySum
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_sum")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $deliverySum;

    /**
     * Код города в Boxberry
     *
     * @var string $vid
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("vid")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $vid;

    /**
     * Наименование города
     *
     * @var ParcelCreate\Kurdost $kurdost
     *
     * @JMS\Type("SaaS\Service\Boxberry\Model\Request\ParcelCreate\Kurdost")
     * @JMS\SerializedName("kurdost")
     *
     * @Annotations\FakeMockField()
     */
    public $kurdost;

    /**
     * Наименование города
     *
     * @var ParcelCreate\Shop $shop
     *
     * @JMS\Type("SaaS\Service\Boxberry\Model\Request\ParcelCreate\Shop")
     * @JMS\SerializedName("shop")
     *
     * @Annotations\FakeMockField()
     */
    public $shop;

    /**
     * Наименование города
     *
     * @var ParcelCreate\Customer $customer
     *
     * @JMS\Type("SaaS\Service\Boxberry\Model\Request\ParcelCreate\Customer")
     * @JMS\SerializedName("customer")
     *
     * @Annotations\FakeMockField()
     */
    public $customer;

    /**
     * Наименование города
     *
     * @var array $items
     *
     * @JMS\Type("array<SaaS\Service\Boxberry\Model\Request\ParcelCreate\Items>")
     * @JMS\SerializedName("items")
     */
    public $items = [];

    /**
     * Блок с информацией о тарных местах (SOAP - количество элементов 24, JSON - неограничено)
     *
     * @var array $weights
     *
     * @JMS\Exclude("weights")
     */
    public $weights;

    /**
     * Тарифная зона (по умолчанию для города отправления - Москва)
     *
     * @var string $issue
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("issue")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $issue;

    /**
     * Наименование населенного пункта
     *
     * @var string $senderName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sender_name")
     *
     * @Annotations\FakeMockField(faker="words", arguments={1, true})
     */
    public $senderName;
}
