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
 * Class ProductBundleComponent
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ProductBundleComponent
{
    use Traits\Id;

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
     * @var bool|null $free
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("free")
     *
     * @FakeMockField()
     */
    public $free;

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
     * @return bool|null
     */
    public function getFree(): ?bool
    {
        return $this->free;
    }

    /**
     * @param bool|null $free
     */
    public function setFree(?bool $free): void
    {
        $this->free = $free;
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
}
