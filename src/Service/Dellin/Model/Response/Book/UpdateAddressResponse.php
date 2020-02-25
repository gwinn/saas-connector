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
 * Class UpdateAddressResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class UpdateAddressResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("counteragentID")
     *
     * @FakeMockField(value="1")
     */
    public $counteragentId;

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
     * @FakeMockField(value="")
     */
    public $flat;
}
