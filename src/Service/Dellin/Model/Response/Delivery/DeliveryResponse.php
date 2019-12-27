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
 * Class CalculateResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryResponse
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
     * @var Data
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Delivery\Data")
     * @Serializer\SerializedName("data")
     *
     * @FakeMockField()
     */
    public $data;
}
