<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;

/**
 * Class OrderLine
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrderLine
{
    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var int $orderId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("order_id")
     *
     * @FakeMockField()
     */
    public $orderId;

    /**
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * @var float $salePrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("sale_price")
     *
     * @FakeMockField()
     */
    public $salePrice;

    /**
     * @var float $fullSalePrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_sale_price")
     *
     * @FakeMockField()
     */
    public $fullSalePrice;

    /**
     * @var float $totalPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("total_price")
     *
     * @FakeMockField()
     */
    public $totalPrice;

    /**
     * @var float $fullTotalPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_total_price")
     *
     * @FakeMockField()
     */
    public $fullTotalPrice;

    /**
     * @var float $discountsAmount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("discounts_amount")
     *
     * @FakeMockField()
     */
    public $discountsAmount;

    /**
     * @var int $quantity
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("quantity")
     *
     * @FakeMockField()
     */
    public $quantity;

    /**
     * @var int $reservedQuantity
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("reserved_quantity")
     *
     * @FakeMockField()
     */
    public $reservedQuantity;

    /**
     * @var float $weight
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("weight")
     *
     * @FakeMockField()
     */
    public $weight;

    /**
     * @var string $dimensions
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("dimensions")
     *
     * @FakeMockField()
     */
    public $dimensions;

    /**
     * @var int $variantId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("variant_id")
     *
     * @FakeMockField()
     */
    public $variantId;

    /**
     * @var int $productId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("product_id")
     *
     * @FakeMockField()
     */
    public $productId;

    /**
     * @var int $bundleId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("bundle_id")
     *
     * @FakeMockField()
     */
    public $bundleId;

    /**
     * @var string $sku
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku")
     *
     * @FakeMockField()
     */
    public $sku;

    /**
     * @var string $barcode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("barcode")
     *
     * @FakeMockField()
     */
    public $barcode;

    /**
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * @var string $unit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     *
     * @FakeMockField()
     */
    public $unit;

    /**
     * @var string $comment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comment")
     *
     * @FakeMockField()
     */
    public $comment;

    /**
     * @var int $vat
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("vat")
     *
     * @FakeMockField()
     */
    public $vat;

    /**
     * Destroy marker (1 or true)
     *
     * @var int $destroy
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("_destroy")
     *
     * @FakeMockField(faker="randomElement", arguments={{1,0}})
     */
    public $destroy;
}
