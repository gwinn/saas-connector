<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrderDates
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
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
     * @Serializer\SerializedName("pickup")
     *
     * @FakeMockField(value="2019-04-24")
     */
    public $pickup;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_osp_sender")
     *
     * @FakeMockField(value="2019-04-24")
     */
    public $arrivalToOspSender;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_from_osp_sender")
     *
     * @FakeMockField(value="2019-04-24")
     */
    public $derrivalFromOspSender;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_osp_receiver")
     *
     * @FakeMockField(value="2019-04-29")
     */
    public $arrivalToOspReceiver;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_from_osp_receiver")
     *
     * @FakeMockField(value="2019-04-26")
     */
    public $derrivalFromOspReceiver;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("create_to")
     *
     * @FakeMockField(value="14:00")
     */
    public $createTo;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sender_address_time")
     *
     * @FakeMockField(value="16:00")
     */
    public $senderAddressTime;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sender_terminal_time")
     *
     * @FakeMockField(value="16:00")
     */
    public $senderTerminalTime;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_airport")
     *
     * @FakeMockField(value="2019-04-25")
     */
    public $arrivalToAirport;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival_to_airport_max")
     *
     * @FakeMockField(value="2019-04-26")
     */
    public $arrivalToAirportMax;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveout_from_osp_receiver")
     *
     * @FakeMockField(value="2019-04-25 00:00:00")
     */
    public $giveoutFromOspReceiver;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveout_from_osp_receiver_max")
     *
     * @FakeMockField(value="2019-04-26 00:00:00")
     */
    public $giveoutFromOspReceiverMax;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_to_address")
     *
     * @FakeMockField(value="2019-04-26")
     */
    public $derrivalToAddress;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derrival_to_address_max")
     *
     * @FakeMockField(value="2019-04-27")
     */
    public $derrivalToAddressMax;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("limitationTime")
     *
     * @FakeMockField(value="17:00")
     */
    public $limitationTime;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derival_startTime")
     *
     * @FakeMockField(value="09:00")
     */
    public $derivalStartTime;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derival_endTime")
     *
     * @FakeMockField(value="18:00")
     */
    public $derivalEndTime;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derival_schedule")
     *
     * @FakeMockField(value="пн-пт: 09:00-18:00; сб, вс: 10:00-16:00")
     */
    public $derivalSchedule;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("order_dates_info")
     *
     * @FakeMockField(value="Расчетная дата указана при условии сдачи груза на терминал отправки до 18:00")
     */
    public $orderDatesInfo;
}
