<?php

namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Response\Calculator\DiscountDetails;
use SaaS\Service\Dellin\Model\Response\Calculator\PremiumDetails;

class CostsCalculation
{
    /**
     * Стоимость услуги
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("price")
     */
    public $price;

    /**
     * Признак договорной цены
     *
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("contractPrice")
     */
    public $contractPrice;

    /**
     * Размер наценки по услуге
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("premium")
     */
    public $premium;

    /**
     * Размер скидки по услуге
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("discount")
     */
    public $discount;

    /**
     * Подробная информация о наценках по услуге
     *
     * @var array|PremiumDetails[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\PremiumDetails>")
     * @Serializer\SerializedName("premiumDetails")
     */
    public $premiumDetails;

    /**
     * Подробная информация о скидках по услуге
     *
     * @var array|DiscountDetails[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\DiscountDetails>")
     * @Serializer\SerializedName("discountDetails")
     */
    public $discountDetails;
}
