<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrderRequest
 *
 * @package  SaaS\Service\Dellin\Model\Request\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrderRequest
{
    /**
     * @var array|string[]|null
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("docIds")
     */
    public $docIds;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderNumber")
     *
     * @FakeMockField(value="1234567889")
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
     * @FakeMockField(value="2019-11-02")
     */
    public $orderDate;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("barcode")
     *
     * @FakeMockField(value="1345678")
     */
    public $barcode;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("dateStart")
     *
     * @FakeMockField(value="2019-11-11 10:10")
     */
    public $dateStart;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("dateEnd")
     *
     * @FakeMockField(value="2019-11-12 10:10")
     */
    public $dateEnd;

    /**
     * @var array|string[]|null
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("states")
     */
    public $states;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("page")
     *
     * @FakeMockField(value="1")
     */
    public $page;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("lastUpdate")
     *
     * @FakeMockField(value="2019-11-12 10:10")
     */
    public $lastUpdate;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("orderDatesExtended")
     *
     * @FakeMockField(value="true")
     */
    public $orderDatesExtended;

    /**
     * Available: ordered_at | updated_at
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderBy")
     *
     * @FakeMockField(value="ordered_at")
     */
    public $orderBy;
}
