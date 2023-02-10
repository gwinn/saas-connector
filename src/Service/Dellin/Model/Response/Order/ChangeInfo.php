<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ChangeInfo
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ChangeInfo
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
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("info")
     */
    public $info;
}
