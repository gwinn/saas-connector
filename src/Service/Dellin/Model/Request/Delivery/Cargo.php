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
 * Class Cargo
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Cargo
{
    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("quantity")
     *
     * @FakeMockField(value="1")
     */
    public $quantity;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("length")
     *
     * @FakeMockField(value="0.42")
     */
    public $length;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("width")
     *
     * @FakeMockField(value="0.18")
     */
    public $width;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("height")
     *
     * @FakeMockField(value="0.3")
     */
    public $height;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("weight")
     *
     * @FakeMockField(value="25.0")
     */
    public $weight;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("totalVolume")
     *
     * @FakeMockField(value="0.02")
     */
    public $totalVolume;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("totalWeight")
     *
     * @FakeMockField(value="25.0")
     */
    public $totalWeight;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("oversizedWeight")
     *
     * @FakeMockField(value="25.0")
     */
    public $oversizedWeight;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("oversizedVolume")
     *
     * @FakeMockField(value="0.02")
     */
    public $oversizedVolume;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("hazardClass")
     *
     * @FakeMockField(value="2.1")
     */
    public $hazardClass;

    /**
     * @var Insurance|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Insurance")
     * @Serializer\SerializedName("insurance")
     */
    public $insurance;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("freightUID")
     *
     * @FakeMockField(value="0x9c2acaea110d75ba48fdc7a83c976269")
     */
    public $freightUid;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("freightName")
     *
     * @FakeMockField(value="Запчасти для трактора")
     */
    public $freightName;
}
