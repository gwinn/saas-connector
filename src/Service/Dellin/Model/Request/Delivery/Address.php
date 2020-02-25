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
 * Class Address
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Address
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("street")
     *
     * @FakeMockField(value="7800000000004380000000000")
     */
    public $street;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("house")
     *
     * @FakeMockField(value="4")
     */
    public $house;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("building")
     *
     * @FakeMockField(value="3")
     */
    public $building;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("structure")
     *
     * @FakeMockField(value="лит. А")
     */
    public $structure;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("flat")
     *
     * @FakeMockField(value="214а")
     */
    public $flat;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("save")
     *
     * @FakeMockField(value="true")
     */
    public $save;
}
