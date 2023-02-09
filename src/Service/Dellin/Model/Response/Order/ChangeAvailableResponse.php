<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Response\Reference\Metadata as ReferenceMetadata;

/**
 * Class ChangeAvailableResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ChangeAvailableResponse
{
    /**
     * @var ReferenceMetadata
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Reference\Metadata")
     * @Serializer\SerializedName("metadata")
     *
     * @FakeMockField()
     */
    public $metadata;

    /**
     * @var ChangeAvailableData
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\ChangeAvailableData")
     * @Serializer\SerializedName("data")
     *
     * @FakeMockField()
     */
    public $data;
}
