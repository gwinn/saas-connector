<?php

namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SuspendResumeInfo
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class SuspendResumeInfo
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminalInfo")
     */
    public $terminalInfo;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("availableTill")
     */
    public $availableTill;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("warning")
     */
    public $warning;

    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("terminalId")
     */
    public $terminalId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("stateInfo")
     */
    public $stateInfo;
}
