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
use SaaS\Service\Insales\Model\Traits;

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
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;

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
     * @var bool|null $available
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("available")
     *
     * @FakeMockField()
     */
    public $available;

    /**
     * @var array|null $variantFieldValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\VariantFieldValue>")
     * @JMS\SerializedName("variant_field_values")
     */
    public $variantFieldValues = [];

    /**
     * @var string|null $sku
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $sku;

    /**
     * @var string|null $barcode
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
     * @var array|null $prices
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("prices")
     */
    public $prices;

    /**
     * @var array|null $pricesInSiteCurrency
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("prices_in_site_currency")
     */
    public $pricesInSiteCurrency;

    /**
     * @var array|null $optionValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OptionValue>")
     * @JMS\SerializedName("option_values")
     */
    public $optionValues;

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    /**
     * @param bool|null $available
     */
    public function setAvailable(?bool $available): void
    {
        $this->available = $available;
    }

    /**
     * @return array|null
     */
    public function getVariantFieldValues(): ?array
    {
        return $this->variantFieldValues;
    }

    /**
     * @param array|null $variantFieldValues
     */
    public function setVariantFieldValues(?array $variantFieldValues): void
    {
        $this->variantFieldValues = $variantFieldValues;
    }

    /**
     * @return null|string
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param null|string $sku
     */
    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return null|string
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * @param null|string $barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
    }

    /**
     * @return int|null
     */
    public function getImageId(): ?int
    {
        return $this->imageId;
    }

    /**
     * @param int $imageId
     */
    public function setImageId(int $imageId): void
    {
        $this->imageId = $imageId;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float|null
     */
    public function getCostPrice(): ?float
    {
        return $this->costPrice;
    }

    /**
     * @param float $costPrice
     */
    public function setCostPrice(float $costPrice): void
    {
        $this->costPrice = $costPrice;
    }

    /**
     * @return float|null
     */
    public function getCostPriceInSiteCurrency(): ?float
    {
        return $this->costPriceInSiteCurrency;
    }

    /**
     * @param float $costPriceInSiteCurrency
     */
    public function setCostPriceInSiteCurrency(float $costPriceInSiteCurrency): void
    {
        $this->costPriceInSiteCurrency = $costPriceInSiteCurrency;
    }

    /**
     * @return float|null
     */
    public function getPriceInSiteCurrency(): ?float
    {
        return $this->priceInSiteCurrency;
    }

    /**
     * @param float $priceInSiteCurrency
     */
    public function setPriceInSiteCurrency(float $priceInSiteCurrency): void
    {
        $this->priceInSiteCurrency = $priceInSiteCurrency;
    }

    /**
     * @return float|null
     */
    public function getBasePrice(): ?float
    {
        return $this->basePrice;
    }

    /**
     * @param float $basePrice
     */
    public function setBasePrice(float $basePrice): void
    {
        $this->basePrice = $basePrice;
    }

    /**
     * @return float|null
     */
    public function getOldPrice(): ?float
    {
        return $this->oldPrice;
    }

    /**
     * @param float $oldPrice
     */
    public function setOldPrice(float $oldPrice): void
    {
        $this->oldPrice = $oldPrice;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float|null
     */
    public function getPrice2(): ?float
    {
        return $this->price2;
    }

    /**
     * @param float $price2
     */
    public function setPrice2(float $price2): void
    {
        $this->price2 = $price2;
    }

    /**
     * @return float|null
     */
    public function getBasePriceInSiteCurrency(): ?float
    {
        return $this->basePriceInSiteCurrency;
    }

    /**
     * @param float $basePriceInSiteCurrency
     */
    public function setBasePriceInSiteCurrency(float $basePriceInSiteCurrency): void
    {
        $this->basePriceInSiteCurrency = $basePriceInSiteCurrency;
    }

    /**
     * @return float|null
     */
    public function getOldPriceInSiteCurrency(): ?float
    {
        return $this->oldPriceInSiteCurrency;
    }

    /**
     * @param float $oldPriceInSiteCurrency
     */
    public function setOldPriceInSiteCurrency(float $oldPriceInSiteCurrency): void
    {
        $this->oldPriceInSiteCurrency = $oldPriceInSiteCurrency;
    }

    /**
     * @return float|null
     */
    public function getPrice2InSiteCurrency(): ?float
    {
        return $this->price2InSiteCurrency;
    }

    /**
     * @param float $price2InSiteCurrency
     */
    public function setPrice2InSiteCurrency(float $price2InSiteCurrency): void
    {
        $this->price2InSiteCurrency = $price2InSiteCurrency;
    }

    /**
     * @return array|null
     */
    public function getPrices(): ?array
    {
        return $this->prices;
    }

    /**
     * @param array|null $prices
     */
    public function setPrices(?array $prices): void
    {
        $this->prices = $prices;
    }

    /**
     * @return array|null
     */
    public function getPricesInSiteCurrency(): ?array
    {
        return $this->pricesInSiteCurrency;
    }

    /**
     * @param array|null $pricesInSiteCurrency
     */
    public function setPricesInSiteCurrency(?array $pricesInSiteCurrency): void
    {
        $this->pricesInSiteCurrency = $pricesInSiteCurrency;
    }

    /**
     * @return array|null
     */
    public function getOptionValues(): ?array
    {
        return $this->optionValues;
    }

    /**
     * @param array|null $optionValues
     */
    public function setOptionValues(?array $optionValues): void
    {
        $this->optionValues = $optionValues;
    }
}
