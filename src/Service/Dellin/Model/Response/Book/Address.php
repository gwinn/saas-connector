<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Book;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Address
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
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
     * @Serializer\SerializedName("id")
     *
     * @FakeMockField(value="1")
     */
    public $id;

    /**
     * Available: delivery | juridical
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     *
     * @FakeMockField(value="delivery")
     */
    public $type;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("cityID")
     *
     * @FakeMockField(value="200601")
     */
    public $cityId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("code")
     *
     * @FakeMockField(value="7800000000002080000000000")
     */
    public $code;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("address")
     *
     * @FakeMockField(value="190000, г. Санкт-Петербург, Васи Алексеева ул, д. 125 кв/оф. 513")
     */
    public $address;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("street")
     *
     * @FakeMockField(value="Васи Алексеева")
     */
    public $street;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("house")
     *
     * @FakeMockField(value="125")
     */
    public $house;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("building")
     *
     * @FakeMockField(value="")
     */
    public $building;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("structure")
     *
     * @FakeMockField(value="")
     */
    public $structure;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("flat")
     *
     * @FakeMockField(value="513")
     */
    public $flat;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("contacts")
     *
     * @FakeMockField(value="2")
     */
    public $contacts;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("phones")
     *
     * @FakeMockField(value="4")
     */
    public $phones;
}
