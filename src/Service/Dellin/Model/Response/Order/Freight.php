<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Freight
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Freight
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="Мебельная фурнитура")
     */
    public $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("weight")
     *
     * @FakeMockField(value="0.1")
     */
    public $weight;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("oversizedWeight")
     */
    public $oversizedWeight;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("volume")
     *
     * @FakeMockField(value="0.1")
     */
    public $volume;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("oversizedVolume")
     */
    public $oversizedVolume;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("places")
     *
     * @FakeMockField(value="1")
     */
    public $places;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("oversizedPlaces")
     *
     * @FakeMockField(value="39513109")
     */
    public $oversizedPlaces;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("length")
     *
     * @FakeMockField(value="0.1")
     */
    public $length;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("width")
     *
     * @FakeMockField(value="0.1")
     */
    public $width;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("height")
     *
     * @FakeMockField(value="0.1")
     */
    public $height;
}
