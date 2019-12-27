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
 * Class Express
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Express
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="3062.5")
     */
    public $price;

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

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("insurance")
     *
     * @FakeMockField(value="350.0")
     */
    public $insurance;

    /**
     * @var InsuranceComponents
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\InsuranceComponents")
     * @Serializer\SerializedName("insurance_components")
     *
     * @FakeMockField()
     */
    public $insuranceComponents;

    /**
     * @var Notify
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Notify")
     * @Serializer\SerializedName("notify")
     *
     * @FakeMockField()
     */
    public $notify;
}
