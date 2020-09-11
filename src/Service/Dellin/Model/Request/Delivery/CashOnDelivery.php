<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CashOnDelivery
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CashOnDelivery
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderNumber")
     *
     * @FakeMockField(value="123456")
     */
    public $orderNumber;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderDate")
     *
     * @FakeMockField(value="2018-04-09")
     */
    public $orderDate;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentType")
     *
     * @FakeMockField(value="cash")
     */
    public $paymentType;

    /**
     * @var array|Product[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\Product>")
     * @Serializer\SerializedName("products")
     */
    public $products;
}
