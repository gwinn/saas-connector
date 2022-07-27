<?php

namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Response\Delivery\Metadata;

/**
 * Class CalculateResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator\V2
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CalculateResponse
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
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\Data")
     * @Serializer\SerializedName("data")
     *
     * @FakeMockField()
     */
    public $data;
}
