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
     * @var int $typeId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("type_id")
     *
     * @FakeMockField()
     */
    public $typeId;

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
     * @var string $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     *
     * @FakeMockField()
     */
    public $description;

    /**
     * @var float $amount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("amount")
     *
     * @FakeMockField()
     */
    public $amount;

    /**
     * @var float $fullAmount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("full_amount")
     *
     * @FakeMockField()
     */
    public $fullAmount;

    /**
     * @var float $percent
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("percent")
     *
     * @FakeMockField()
     */
    public $percent;

    /**
     * @var float $discount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("discount")
     *
     * @FakeMockField()
     */
    public $discount;

    /**
     * @var int $referenceId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("reference_id")
     *
     * @FakeMockField()
     */
    public $referenceId;

    /**
     * @var string $referenceType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("reference_type")
     *
     * @FakeMockField()
     */
    public $referenceType;

    /**
     * @var int $discountCodeId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("discount_code_id")
     *
     * @FakeMockField()
     */
    public $discountCodeId;

    /**
     * @var array $discountProductsIds
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("discount_products_ids")
     */
    public $discountProductsIds = [];

    /**
     * @var array $discountOrderLinesIds
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("discount_order_lines_ids")
     */
    public $discountOrderLinesIds = [];
}
