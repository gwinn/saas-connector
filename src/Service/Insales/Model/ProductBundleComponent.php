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
     * @var bool $free
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
}
