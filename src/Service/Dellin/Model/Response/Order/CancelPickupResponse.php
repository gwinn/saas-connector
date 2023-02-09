<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Response\Delivery\Metadata;

/**
 * Class CancelPickupResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CancelPickupResponse
{
    /**
     * @var Metadata
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Metadata")
     * @Serializer\SerializedName("metadata")
     *
     * @FakeMockField()
     */
    public $metadata;

    /**
     * @var CancelPickupData
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\CancelPickupData")
     * @Serializer\SerializedName("data")
     */
    public $data;
}
