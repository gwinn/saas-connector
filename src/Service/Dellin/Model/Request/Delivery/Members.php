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
 * Class Members
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Members
{
    /**
     * @var Requester
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Requester")
     * @Serializer\SerializedName("requester")
     *
     * @FakeMockField()
     */
    public $requester;

    /**
     * @var Member
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Member")
     * @Serializer\SerializedName("sender")
     */
    public $sender;

    /**
     * @var Member
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Member")
     * @Serializer\SerializedName("receiver")
     */
    public $receiver;

    /**
     * @var Member|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Member")
     * @Serializer\SerializedName("third")
     */
    public $third;
}
