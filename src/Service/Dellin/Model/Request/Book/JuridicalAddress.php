<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Book;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class JuridicalAddress
 *
 * @package  SaaS\Service\Dellin\Model\Request\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class JuridicalAddress
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
     * @var CustomStreet
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Book\CustomStreet")
     * @Serializer\SerializedName("customStreet")
     *
     * @FakeMockField()
     */
    public $customStreet;

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
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("building")
     *
     * @FakeMockField(value="2")
     */
    public $building;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("structure")
     *
     * @FakeMockField(value="3А")
     */
    public $structure;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("flat")
     *
     * @FakeMockField(value="Б-234")
     */
    public $flat;
}
