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
 * Class Variant
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Variant
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
     * @var int $productId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("product_id")
     *
     * @FakeMockField()
     */
    public $productId;

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
     * @var bool $available
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("available")
     *
     * @FakeMockField()
     */
    public $available;

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
     * @var array $variantFieldValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\VariantFieldValue>")
     * @JMS\SerializedName("variant_field_values")
     */
    public $variantFieldValues = [];

    /**
     * @var string $sku
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku")
     *
     * @FakeMockField(faker="words", arguments={1, true})
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
     * @var int $imageId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("image_id")
     *
     * @FakeMockField()
     */
    public $imageId;

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
     * @var float $quantity
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("quantity")
     *
     * @FakeMockField()
     */
    public $quantity;

    /**
     * @var float $costPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("cost_price")
     *
     * @FakeMockField()
     */
    public $costPrice;

    /**
     * @var float $costPriceInSiteCurrency
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("cost_price_in_site_currency")
     *
     * @FakeMockField()
     */
    public $costPriceInSiteCurrency;

    /**
     * @var float $priceInSiteCurrency
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price_in_site_currency")
     *
     * @FakeMockField()
     */
    public $priceInSiteCurrency;

    /**
     * @var float $basePrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("base_price")
     *
     * @FakeMockField()
     */
    public $basePrice;

    /**
     * @var float $oldPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("old_price")
     *
     * @FakeMockField()
     */
    public $oldPrice;

    /**
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    public $price;

    /**
     * @var float $price2
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price2")
     *
     * @FakeMockField()
     */
    public $price2;

    /**
     * @var float $basePriceInSiteCurrency
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("base_price_in_site_currency")
     *
     * @FakeMockField()
     */
    public $basePriceInSiteCurrency;

    /**
     * @var float $oldPriceInSiteCurrency
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("old_price_in_site_currency")
     *
     * @FakeMockField()
     */
    public $oldPriceInSiteCurrency;

    /**
     * @var float $oldPriceInSiteCurrency
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price2_in_site_currency")
     *
     * @FakeMockField()
     */
    public $price2InSiteCurrency;

    /**
     * @var array $prices
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("prices")
     */
    public $prices;

    /**
     * @var array $pricesInSiteCurrency
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("prices_in_site_currency")
     */
    public $pricesInSiteCurrency;

    /**
     * @var array $optionValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OptionValue>")
     * @JMS\SerializedName("option_values")
     */
    public $optionValues;
}
