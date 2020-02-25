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
 * Class OrderDates
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrderDates
{
    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToOspReceiver")
     *
     * @FakeMockField(value="2019-11-27")
     */
    public $arrivalToOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToOspReceiverMax")
     */
    public $arrivalToOspReceiverMax;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToOspReceiverAccdoc")
     */
    public $arrivalToOspReceiverAccDoc;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToOspSender")
     */
    public $arrivalToOspSender;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToReceiver")
     */
    public $arrivalToReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("declineDate")
     */
    public $declineDate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalFromOspReceiver")
     *
     * @FakeMockField(value="2019-11-27 00:00:00")
     */
    public $derivalFromOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalFromOspReceiverMax")
     */
    public $derivalFromOspReceiverMax;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalFromOspReceiverAccdoc")
     */
    public $derivalFromOspReceiverAccDoc;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveoutFromOspReceiver")
     */
    public $giveoutFromOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveoutFromOspReceiverMax")
     */
    public $giveoutFromOspReceiverMax;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalFromOspSender")
     *
     * @FakeMockField(value="2019-11-22 00:00:00")
     */
    public $derivalFromOspSender;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("draftLastUpdate")
     */
    public $draftLastUpdate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("finish")
     */
    public $finish;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("firstDocumentCreatedDate")
     */
    public $firstDocumentCreatedDate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("pickup")
     *
     * @FakeMockField(value="2019-11-20 00:00:00")
     */
    public $pickup;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("processingDate")
     *
     * @FakeMockField(value="2019-11-11")
     */
    public $processingDate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("warehousing")
     */
    public $warehousing;
}
