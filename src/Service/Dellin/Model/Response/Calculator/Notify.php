<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Notify
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Notify
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("discount")
     *
     * @FakeMockField("0.0")
     */
    public $discount;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField("10.0")
     */
    public $price;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("premium")
     *
     * @FakeMockField("0.0")
     */
    public $premium;

    /**
     * @var array|PremiumDetails[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\PremiumDetails>")
     * @Serializer\SerializedName("premiumDetails")
     */
    public $premiumDetails;

    /**
     * @var array|DiscountDetails[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\DiscountDetails>")
     * @Serializer\SerializedName("discountDetails")
     */
    public $discountDetails;
}
