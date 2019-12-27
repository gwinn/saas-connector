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
class AddressBook
{
    /**
     * @var Member
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Member")
     * @Serializer\SerializedName("sender")
     *
     * @FakeMockField()
     */
    public $sender;

    /**
     * @var Member
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Member")
     * @Serializer\SerializedName("receiver")
     *
     * @FakeMockField()
     */
    public $receiver;

    /**
     * @var Member
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Member")
     * @Serializer\SerializedName("third")
     *
     * @FakeMockField()
     */
    public $third;
}
