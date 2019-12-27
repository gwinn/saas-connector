<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Air
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Air
{
    /**
     * Format: YYYY-MM-DD
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalDate")
     */
    public $arrivalDate;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveoutDate")
     */
    public $giveoutDate;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("warehousingDate")
     */
    public $warehousingDate;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("deliveryDate")
     */
    public $deliveryDate;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     */
    public $comment;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderId")
     */
    public $orderId;
}
