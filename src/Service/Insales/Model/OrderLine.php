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
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;
    use Traits\Destroy;

    /**
     * @var int $orderId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("order_id")
     *
     * @FakeMockField()
     */
    protected $orderId;

    /**
     * @var float $salePrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("sale_price")
     *
     * @FakeMockField()
     */
    protected $salePrice;

    /**
     * @var float $fullSalePrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_sale_price")
     *
     * @FakeMockField()
     */
    protected $fullSalePrice;

    /**
     * @var float $totalPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("total_price")
     *
     * @FakeMockField()
     */
    protected $totalPrice;

    /**
     * @var float $fullTotalPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_total_price")
     *
     * @FakeMockField()
     */
    protected $fullTotalPrice;

    /**
     * @var float $discountsAmount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("discounts_amount")
     *
     * @FakeMockField()
     */
    protected $discountsAmount;

    /**
     * @var int $quantity
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("quantity")
     *
     * @FakeMockField()
     */
    protected $quantity;

    /**
     * @var int $reservedQuantity
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("reserved_quantity")
     *
     * @FakeMockField()
     */
    protected $reservedQuantity;

    /**
     * @var float $weight
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("weight")
     *
     * @FakeMockField()
     */
    protected $weight;

    /**
     * @var string|null $dimensions
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("dimensions")
     *
     * @FakeMockField()
     */
    protected $dimensions;

    /**
     * @var int $variantId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("variant_id")
     *
     * @FakeMockField()
     */
    protected $variantId;

    /**
     * @var int $productId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("product_id")
     *
     * @FakeMockField()
     */
    protected $productId;

    /**
     * @var int $bundleId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("bundle_id")
     *
     * @FakeMockField()
     */
    protected $bundleId;

    /**
     * @var string|null $sku
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku")
     *
     * @FakeMockField()
     */
    protected $sku;

    /**
     * @var string|null $barcode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("barcode")
     *
     * @FakeMockField()
     */
    protected $barcode;

    /**
     * @var string|null $unit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     *
     * @FakeMockField()
     */
    protected $unit;

    /**
     * @var string|null $comment
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comment")
     *
     * @FakeMockField()
     */
    protected $comment;

    /**
     * @var int $vat
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("vat")
     *
     * @FakeMockField()
     */
    protected $vat;

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return float|null
     */
    public function getSalePrice(): ?float
    {
        return $this->salePrice;
    }

    /**
     * @param float $salePrice
     */
    public function setSalePrice(float $salePrice): void
    {
        $this->salePrice = $salePrice;
    }

    /**
     * @return float|null
     */
    public function getFullSalePrice(): ?float
    {
        return $this->fullSalePrice;
    }

    /**
     * @param float $fullSalePrice
     */
    public function setFullSalePrice(float $fullSalePrice): void
    {
        $this->fullSalePrice = $fullSalePrice;
    }

    /**
     * @return float|null
     */
    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return float|null
     */
    public function getFullTotalPrice(): ?float
    {
        return $this->fullTotalPrice;
    }

    /**
     * @param float $fullTotalPrice
     */
    public function setFullTotalPrice(float $fullTotalPrice): void
    {
        $this->fullTotalPrice = $fullTotalPrice;
    }

    /**
     * @return float|null
     */
    public function getDiscountsAmount(): ?float
    {
        return $this->discountsAmount;
    }

    /**
     * @param float $discountsAmount
     */
    public function setDiscountsAmount(float $discountsAmount): void
    {
        $this->discountsAmount = $discountsAmount;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int|null
     */
    public function getReservedQuantity(): ?int
    {
        return $this->reservedQuantity;
    }

    /**
     * @param int $reservedQuantity
     */
    public function setReservedQuantity(int $reservedQuantity): void
    {
        $this->reservedQuantity = $reservedQuantity;
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
     * @return null|string
     */
    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    /**
     * @param null|string $dimensions
     */
    public function setDimensions(?string $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return int|null
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * @param int $variantId
     */
    public function setVariantId(int $variantId): void
    {
        $this->variantId = $variantId;
    }

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
     * @return int|null
     */
    public function getBundleId(): ?int
    {
        return $this->bundleId;
    }

    /**
     * @param int $bundleId
     */
    public function setBundleId(int $bundleId): void
    {
        $this->bundleId = $bundleId;
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
     * @return null|string
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param null|string $unit
     */
    public function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return null|string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param null|string $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int|null
     */
    public function getVat(): ?int
    {
        return $this->vat;
    }

    /**
     * @param int $vat
     */
    public function setVat(int $vat): void
    {
        $this->vat = $vat;
    }
}
