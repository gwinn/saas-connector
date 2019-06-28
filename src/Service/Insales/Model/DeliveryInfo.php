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
 * Class DeliveryInfo
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryInfo
{
    /**
     * @var int $deliveryVariantId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("delivery_variant_id")
     *
     * @FakeMockField()
     */
    public $deliveryVariantId;

    /**
     * @var int $tariffId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("tariff_id")
     *
     * @FakeMockField()
     */
    public $tariffId;

    /**
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

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
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    public $price;

    /**
     * @var string $shippingCompany
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shipping_company")
     *
     * @FakeMockField()
     */
    public $shippingCompany;

    /**
     * @var DeliveryInterval $deliveryInterval
     *
     * @JMS\Type("SaaS\Service\Insales\Model\DeliveryInterval")
     * @JMS\SerializedName("delivery_interval")
     *
     * @FakeMockField()
     */
    public $deliveryInterval;

    /**
     * @var Outlet $outlet
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Outlet")
     * @JMS\SerializedName("outlet")
     *
     * @FakeMockField()
     */
    public $outlet;

    /**
     * @var array $errors
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("errors")
     */
    public $errors = [];

    /**
     * @var array $warnings
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("warnings")
     */
    public $warnings = [];
}
