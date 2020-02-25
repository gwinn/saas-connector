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
 * Class AddressBook
 *
 * @package  SaaS\Service\Dellin\Model\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Member
{
    /**
     * @var Counteragent
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Counteragent")
     * @Serializer\SerializedName("counteragent")
     *
     * @FakeMockField()
     */
    public $counteragent;

    /**
     * @var Address
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Address")
     * @Serializer\SerializedName("address")
     *
     * @FakeMockField()
     */
    public $address;

    /**
     * @var array|ContactPerson[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Delivery\ContactPerson>")
     * @Serializer\SerializedName("contactPersons")
     */
    public $contactPersons;

    /**
     * @var array|PhoneNumber[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Delivery\PhoneNumber>")
     * @Serializer\SerializedName("phoneNumbers")
     */
    public $phoneNumbers;
}
