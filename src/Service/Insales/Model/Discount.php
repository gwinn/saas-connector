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
 * Class Domain
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Discount
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Destroy;
    use Traits\Description;

    const TYPE_ID_PERCENT = 1;
    const TYPE_ID_MONEY = 2;

    /**
     * @var int $typeId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("type_id")
     *
     * @FakeMockField()
     */
    protected $typeId;

    /**
     * @var float $amount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("amount")
     *
     * @FakeMockField()
     */
    protected $amount;

    /**
     * @var float $fullAmount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_amount")
     *
     * @FakeMockField()
     */
    protected $fullAmount;

    /**
     * @var float $percent
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("percent")
     *
     * @FakeMockField()
     */
    protected $percent;

    /**
     * @var float $discount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("discount")
     *
     * @FakeMockField()
     */
    protected $discount;

    /**
     * @var int $referenceId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("reference_id")
     *
     * @FakeMockField()
     */
    protected $referenceId;

    /**
     * @var string|null $referenceType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("reference_type")
     *
     * @FakeMockField()
     */
    protected $referenceType;

    /**
     * @var int $discountCodeId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("discount_code_id")
     *
     * @FakeMockField()
     */
    protected $discountCodeId;

    /**
     * @var array|null $discountProductsIds
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("discount_products_ids")
     */
    protected $discountProductsIds = [];

    /**
     * @var array|null $discountOrderLinesIds
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("discount_order_lines_ids")
     */
    protected $discountOrderLinesIds = [];

    /**
     * @return int|null
     */
    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     */
    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float|null
     */
    public function getFullAmount(): ?float
    {
        return $this->fullAmount;
    }

    /**
     * @param float $fullAmount
     */
    public function setFullAmount(float $fullAmount): void
    {
        $this->fullAmount = $fullAmount;
    }

    /**
     * @return float|null
     */
    public function getPercent(): ?float
    {
        return $this->percent;
    }

    /**
     * @param float $percent
     */
    public function setPercent(float $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return int|null
     */
    public function getReferenceId(): ?int
    {
        return $this->referenceId;
    }

    /**
     * @param int $referenceId
     */
    public function setReferenceId(int $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return null|string
     */
    public function getReferenceType(): ?string
    {
        return $this->referenceType;
    }

    /**
     * @param null|string $referenceType
     */
    public function setReferenceType(?string $referenceType): void
    {
        $this->referenceType = $referenceType;
    }

    /**
     * @return int|null
     */
    public function getDiscountCodeId(): ?int
    {
        return $this->discountCodeId;
    }

    /**
     * @param int $discountCodeId
     */
    public function setDiscountCodeId(int $discountCodeId): void
    {
        $this->discountCodeId = $discountCodeId;
    }

    /**
     * @return array|null
     */
    public function getDiscountProductsIds(): ?array
    {
        return $this->discountProductsIds;
    }

    /**
     * @param array|null $discountProductsIds
     */
    public function setDiscountProductsIds(?array $discountProductsIds): void
    {
        $this->discountProductsIds = $discountProductsIds;
    }

    /**
     * @return array|null
     */
    public function getDiscountOrderLinesIds(): ?array
    {
        return $this->discountOrderLinesIds;
    }

    /**
     * @param array|null $discountOrderLinesIds
     */
    public function setDiscountOrderLinesIds(?array $discountOrderLinesIds): void
    {
        $this->discountOrderLinesIds = $discountOrderLinesIds;
    }
}
