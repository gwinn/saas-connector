<?php

namespace SaaS\Service\Dellin\Model\Request\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Request\Delivery\ContactPerson;
use SaaS\Service\Dellin\Model\Request\Delivery\PhoneNumber;

/**
 * Class CancelPickupRequest
 *
 * @package  SaaS\Service\Dellin\Model\Request\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CancelPickupRequest
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderID")
     */
    public $orderID;

    /**
     * @var int[]
     *
     * @Serializer\Type("array<int>")
     * @Serializer\SerializedName("contactIDs")
     */
    public $contactIDs;

    /**
     * @var ContactPerson[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\ContactPerson>")
     * @Serializer\SerializedName("contactPersons")
     */
    public $contactPersons;

    /**
     * @var int[]
     *
     * @Serializer\Type("array<int>")
     * @Serializer\SerializedName("phoneIDs")
     */
    public $phoneIDs;

    /**
     * @var PhoneNumber[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\PhoneNumber>")
     * @Serializer\SerializedName("phoneNumbers")
     */
    public $phoneNumbers;
}
