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
use SaaS\Service\Insales\Model\Traits;

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
    use Traits\Id;
    use Traits\Name;

    /**
     * @var string|null $code
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $code;

    /**
     * @var string|null $unit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $unit;

    /**
     * @var bool|null $isDefault
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_default")
     *
     * @FakeMockField()
     */
    public $isDefault;

    /**
     * @var bool|null $exchangeRateRound
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("exchange_rate_round")
     *
     * @FakeMockField()
     */
    public $exchangeRateRound;

    /**
     * @var bool|null $exchangeRateUseCb
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

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return null|string
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param null|string $unit
     */
    public function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return bool|null
     */
    public function getisDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool|null $isDefault
     */
    public function setIsDefault(?bool $isDefault): void
    {
        $this->isDefault = $isDefault;
    }

    /**
     * @return bool|null
     */
    public function getExchangeRateRound(): ?bool
    {
        return $this->exchangeRateRound;
    }

    /**
     * @param bool|null $exchangeRateRound
     */
    public function setExchangeRateRound(?bool $exchangeRateRound): void
    {
        $this->exchangeRateRound = $exchangeRateRound;
    }

    /**
     * @return bool|null
     */
    public function getExchangeRateUseCb(): ?bool
    {
        return $this->exchangeRateUseCb;
    }

    /**
     * @param bool|null $exchangeRateUseCb
     */
    public function setExchangeRateUseCb(?bool $exchangeRateUseCb): void
    {
        $this->exchangeRateUseCb = $exchangeRateUseCb;
    }

    /**
     * @return float|null
     */
    public function getExchangeRateManual(): ?float
    {
        return $this->exchangeRateManual;
    }

    /**
     * @param float $exchangeRateManual
     */
    public function setExchangeRateManual(float $exchangeRateManual): void
    {
        $this->exchangeRateManual = $exchangeRateManual;
    }

    /**
     * @return float|null
     */
    public function getExchangeRatePercent(): ?float
    {
        return $this->exchangeRatePercent;
    }

    /**
     * @param float $exchangeRatePercent
     */
    public function setExchangeRatePercent(float $exchangeRatePercent): void
    {
        $this->exchangeRatePercent = $exchangeRatePercent;
    }

    /**
     * @return float|null
     */
    public function getCbRate(): ?float
    {
        return $this->cbRate;
    }

    /**
     * @param float $cbRate
     */
    public function setCbRate(float $cbRate): void
    {
        $this->cbRate = $cbRate;
    }

    /**
     * @return float|null
     */
    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    /**
     * @param float $exchangeRate
     */
    public function setExchangeRate(float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }
}
