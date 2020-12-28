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
 * Class Member
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
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
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("counteragentID")
     *
     * @FakeMockField(value="456783515")
     */
    public $counteragentId;

    /**
     * @var Counteragent|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Counteragent")
     * @Serializer\SerializedName("counteragent")
     */
    public $counteragent;

    /**
     * @var array|int[]|null
     *
     * @Serializer\Type("array<integer>")
     * @Serializer\SerializedName("contactIDs")
     */
    public $contactIds;

    /**
     * @var array|ContactPerson[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\ContactPerson>")
     * @Serializer\SerializedName("contactPersons")
     */
    public $contactPersons;

    /**
     * @var array|int[]|null
     *
     * @Serializer\Type("array<integer>")
     * @Serializer\SerializedName("phoneIDs")
     */
    public $phoneIds;

    /**
     * @var array|PhoneNumber[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\PhoneNumber>")
     * @Serializer\SerializedName("phoneNumbers")
     */
    public $phoneNumbers;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("email")
     *
     * @FakeMockField(value="test@mail.ru")
     */
    public $email;

    /**
     * @var DataForReceipt|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\DataForReceipt")
     * @Serializer\SerializedName("dataForReceipt")
     */
    public $dataForReceipt;
}
