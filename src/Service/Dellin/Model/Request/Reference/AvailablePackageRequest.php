<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Reference;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AvailablePackageRequest
 *
 * @package  SaaS\Service\Dellin\Model\Request\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class AvailablePackageRequest
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalPoint")
     *
     * @FakeMockField(value="1000000100000160000000000")
     */
    public $arrivalPoint;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalPoint")
     *
     * @FakeMockField(value="7800000000000000000000000")
     */
    public $derivalPoint;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("length")
     *
     * @FakeMockField(value="1")
     */
    public $length;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("width")
     *
     * @FakeMockField(value="1")
     */
    public $width;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("height")
     *
     * @FakeMockField(value="1")
     */
    public $height;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("weight")
     *
     * @FakeMockField(value="1")
     */
    public $weight;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("quantity")
     *
     * @FakeMockField(value="1")
     */
    public $quantity;
}
