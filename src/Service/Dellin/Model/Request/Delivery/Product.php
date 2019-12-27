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
 * Class Product
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Product
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productName")
     *
     * @FakeMockField(value="Кофеварка BRAUN")
     */
    public $productName;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productCode")
     *
     * @FakeMockField(value="K-2300")
     */
    public $productCode;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productAmount")
     *
     * @FakeMockField(value="1")
     */
    public $productAmount;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("costWithVAT")
     *
     * @FakeMockField(value="17800")
     */
    public $costWithVAT;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("VATRate")
     *
     * @FakeMockField(value="18")
     */
    public $vatRate;
}
