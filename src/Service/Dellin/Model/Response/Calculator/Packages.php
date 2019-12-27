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
 * Class Packages
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Packages
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bag")
     *
     * @FakeMockField(value="70.0")
     */
    public $bag;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("pallet")
     *
     * @FakeMockField(value="70.0")
     */
    public $pallet;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("box")
     *
     * @FakeMockField(value="70.0")
     */
    public $box;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("crate")
     *
     * @FakeMockField(value="70.0")
     */
    public $crate;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("premium")
     *
     * @FakeMockField(value="50.0")
     */
    public $premium;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("discount")
     *
     * @FakeMockField(value="10.0")
     */
    public $discount;

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
