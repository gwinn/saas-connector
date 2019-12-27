<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Reference;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class OpfListResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OpfListResponse
{
    /**
     * @var Metadata
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Reference\Metadata")
     * @Serializer\SerializedName("metadata")
     *
     * @FakeMockField()
     */
    public $metadata;

    /**
     * @var array|OpfData[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Reference\OpfData>")
     * @Serializer\SerializedName("data")
     */
    public $data;
}
