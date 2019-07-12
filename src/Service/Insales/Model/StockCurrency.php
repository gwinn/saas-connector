<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;

/**
 * Class StockCurrency
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class StockCurrency
{
    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var string $code
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $code;

    /**
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @FakeMockField()
     */
    public $name;

    /**
     * @var string $unit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $unit;

    /**
     * @var bool $isDefault
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_default")
     *
     * @FakeMockField()
     */
    public $isDefault;

    /**
     * @var bool $exchangeRateRound
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("exchange_rate_round")
     *
     * @FakeMockField()
     */
    public $exchangeRateRound;

    /**
     * @var bool $exchangeRateUseCb
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("exchange_rate_use_cb")
     *
     * @FakeMockField()
     */
    public $exchangeRateUseCb;

    /**
     * @var float $exchangeRateManual
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("exchange_rate_manual")
     *
     * @FakeMockField()
     */
    public $exchangeRateManual;

    /**
     * @var float $exchangeRatePercent
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("exchange_rate_percent")
     *
     * @FakeMockField()
     */
    public $exchangeRatePercent;

    /**
     * @var float $cbRate
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("cb_rate")
     *
     * @FakeMockField()
     */
    public $cbRate;

    /**
     * @var float $exchangeRate
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("exchange_rate")
     *
     * @FakeMockField()
     */
    public $exchangeRate;
}
