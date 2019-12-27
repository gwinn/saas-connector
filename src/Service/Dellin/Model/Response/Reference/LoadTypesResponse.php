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
 * Class LoadTypesResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class LoadTypesResponse
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
     * @var LoadTypeData
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Reference\LoadTypeData")
     * @Serializer\SerializedName("data")
     *
     * @FakeMockField()
     */
    public $data;
}
