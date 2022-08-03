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
namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

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
     * Дата передачи груза на адресе отправителя
     *
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
     * Время, до которого необходимо забрать груз на адресе отправителя
     *
     * Format: HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("senderAddressTime")
     *
     * @FakeMockField(value="18:00:00")
     */
    public $senderAddressTime;

    /**
     * Время, до которого необходимо передать груз на терминал отправителя
     *
     * Format: HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("senderTerminalTime")
     *
     * @FakeMockField(value="15:00:00")
     */
    public $senderTerminalTime;

    /**
     * Дата прибытия на терминал-отправитель
     *
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToOspSender")
     *
     * @FakeMockField(value="2019-04-24")
     */
    public $arrivalToOspSender;

    /**
     * Дата отправки с терминала-отправителя
     *
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalFromOspSender")
     *
     * @FakeMockField(value="2019-04-24")
     */
    public $derivalFromOspSender;

    /**
     * Дата прибытия на терминал-получатель
     *
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToOspReceiver")
     *
     * @FakeMockField(value="2019-04-24")
     */
    public $arrivalToOspReceiver;

    /**
     * Дата прибытия на терминал получателя/в аэропорт
     *
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToAirport")
     *
     * @FakeMockField(value="2019-04-25")
     */
    public $arrivalToAirport;

    /**
     * Максимальная дата прибытия на терминал получателя/в аэропорт (в случае, если возможно увеличение срока прибытия)
     *
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrivalToAirportMax")
     *
     * @FakeMockField(value="2019-04-26")
     */
    public $arrivalToAirportMax;

    /**
     * Дата и время, с которого груз готов к выдаче на терминале
     *
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveoutFromOspReceiver")
     *
     * @FakeMockField(value="2019-04-25 00:00:00")
     */
    public $giveoutFromOspReceiver;

    /**
     * Максимальная дата и время, с которого груз готов к выдаче на
     * терминале (в случае, если возможно увеличение срока готовности)
     *
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("giveoutFromOspReceiverMax")
     *
     * @FakeMockField(value="2019-04-26 00:00:00")
     */
    public $giveoutFromOspReceiverMax;

    /**
     * Дата отправки с терминала-получателя
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalFromOspReceiver")
     *
     * @FakeMockField(value="2019-04-26")
     */
    public $derivalFromOspReceiver;

    /**
     * Время, до которого необходимо подать заявку на доставку от адреса
     *
     * Format: HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("createTo")
     *
     * @FakeMockField(value="14:00:00")
     */
    public $createTo;

    /**
     * Дата и время, с которого возможна доставка до клиента
     *
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalToAddress")
     *
     * @FakeMockField(value="2022-08-05 10:00:00")
     */
    public $derivalToAddress;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derivalToAddressMax")
     *
     * @FakeMockField(value="2022-08-05 17:00:00")
     */
    public $derivalToAddressMax;
}
