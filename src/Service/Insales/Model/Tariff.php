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
 * Class Tariff
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Tariff
{
    use Traits\Id;

    /**
     * Delivery tariff price
     *
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    public $price;

    /**
     * Increment which increases delivery price; measured in kg
     *
     * @var float $step
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("step")
     *
     * @FakeMockField()
     */
    public $step;

    /**
     * Price of increment
     *
     * @var float $stepPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("step_price")
     *
     * @FakeMockField()
     */
    public $stepPrice;

    /**
     * Max weight for tariff
     *
     * @var float $maxWeight
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("max_weight")
     *
     * @FakeMockField()
     */
    public $maxWeight;

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float|null
     */
    public function getStep(): ?float
    {
        return $this->step;
    }

    /**
     * @param float $step
     */
    public function setStep(float $step): void
    {
        $this->step = $step;
    }

    /**
     * @return float|null
     */
    public function getStepPrice(): ?float
    {
        return $this->stepPrice;
    }

    /**
     * @param float $stepPrice
     */
    public function setStepPrice(float $stepPrice): void
    {
        $this->stepPrice = $stepPrice;
    }

    /**
     * @return float|null
     */
    public function getMaxWeight(): ?float
    {
        return $this->maxWeight;
    }

    /**
     * @param float $maxWeight
     */
    public function setMaxWeight(float $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }
}
