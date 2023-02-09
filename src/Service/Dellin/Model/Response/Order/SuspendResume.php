<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SuspendResume
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class SuspendResume
{
    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("available")
     */
    public $available;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("displayName")
     */
    public $displayName;

    /**
     * @var SuspendResumeInfo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\SuspendResumeInfo")
     * @Serializer\SerializedName("info")
     *
     * @FakeMockField()
     */
    public $info;
}
