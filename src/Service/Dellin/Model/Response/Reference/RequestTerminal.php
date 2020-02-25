<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Reference;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class RequestTerminal
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class RequestTerminal
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("id")
     *
     * @FakeMockField(value="1")
     */
    public $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("city")
     *
     * @FakeMockField(value="Санкт-Петербург")
     */
    public $city;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("cityID")
     *
     * @FakeMockField(value="1")
     */
    public $cityId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("city_code")
     *
     * @FakeMockField(value="7800000000000000000000000")
     */
    public $cityCode;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="Санкт-Петербург-Парнас")
     */
    public $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("address")
     *
     * @FakeMockField(value="Санкт-Петербург, 1-й Верхний пер, дом № 12, литера Б")
     */
    public $address;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("default")
     *
     * @FakeMockField(value="true")
     */
    public $default;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("express")
     *
     * @FakeMockField(value="true")
     */
    public $express;
}
