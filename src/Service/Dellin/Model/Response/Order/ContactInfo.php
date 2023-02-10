<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ContactInfo
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ContactInfo
{
    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("changeSender")
     *
     * @FakeMockField()
     */
    public $changeSender;

    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("changeReceiver")
     *
     * @FakeMockField()
     */
    public $changeReceiver;
}
