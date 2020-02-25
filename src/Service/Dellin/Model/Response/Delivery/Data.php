<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Data
 *
 * @package  SaaS\Service\Dellin\Model\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Data
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("state")
     *
     * @FakeMockField(value="success")
     */
    public $state;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("requestID")
     *
     * @FakeMockField(value="3954004")
     */
    public $requestId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("barcode")
     *
     * @FakeMockField(value="41508460D0905400400000014")
     */
    public $barcode;

    /**
     * @var AddressBook
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\AddressBook")
     * @Serializer\SerializedName("addressBook")
     *
     * @FakeMockField()
     */
    public $addressBook;
}
