<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Tracker;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrderDates
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
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
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("finish")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $finish;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_receiver")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $arrivalToReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_osp_sender")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $arrivalToOspSender;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_osp_receiver_accdoc")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $arrivalToOspReceiverAccDoc;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("first_document_created_date")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $firstDocumentCreatedDate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("draftLastUpdate")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $draftLastUpdate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_from_osp_sender")
     *
     * @FakeMockField(value="2017-03-29")
     */
    public $derrivalFromOspSender;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_from_osp_receiver_accdoc")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $derrivalFromOspReceiverAccDoc;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_osp_receiver")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $arrivalToOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_osp_receiver_max")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $arrivalToOspReceiverMax;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveout_from_osp_receiver")
     *
     * @FakeMockField(value="2017-03-30 00:00:00")
     */
    public $giveoutFromOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveout_from_osp_receiver_max")
     *
     * @FakeMockField(value="2017-03-30 00:00:00")
     */
    public $giveoutFromOspReceiverMax;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("processing_date")
     *
     * @FakeMockField(value="2017-03-25")
     */
    public $processingDate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_from_osp_receiver")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $derrivalFromOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_from_osp_receiver_max")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $derrivalFromOspReceiverMax;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("warehousing")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $warehousing;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("decline_date")
     *
     * @FakeMockField(value="2017-03-30")
     */
    public $declineDate;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("pickup")
     *
     * @FakeMockField(value="2017-03-28")
     */
    public $pickup;
}
