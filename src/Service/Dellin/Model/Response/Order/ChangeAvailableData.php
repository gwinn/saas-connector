<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ChangeAvailableData
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ChangeAvailableData
{
    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("receiver")
     *
     * @FakeMockField()
     */
    public $receiver;

    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("payer")
     *
     * @FakeMockField()
     */
    public $payer;

    /**
     * @var ContactInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ContactInfo")
     * @Serializer\SerializedName("contactInfo")
     *
     * @FakeMockField()
     */
    public $contactInfo;

    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("pickupInfo")
     *
     * @FakeMockField()
     */
    public $pickupInfo;

    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("deliveryInfo")
     *
     * @FakeMockField()
     */
    public $deliveryInfo;

    /**
     * @var SuspendResume
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\SuspendResume")
     * @Serializer\SerializedName("suspend")
     *
     * @FakeMockField()
     */
    public $suspend;

    /**
     * @var SuspendResume
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\SuspendResume")
     * @Serializer\SerializedName("resume")
     *
     * @FakeMockField()
     */
    public $resume;

    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("cancelPickup")
     *
     * @FakeMockField()
     */
    public $cancelPickup;

    /**
     * @var ChangeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeInfo")
     * @Serializer\SerializedName("cancelDelivery")
     *
     * @FakeMockField()
     */
    public $cancelDelivery;
}
