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
 * Class Rule
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Rule
{
    use Traits\Id;

    /**
     * @var float $orderPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("order_price")
     *
     * @FakeMockField()
     */
    public $orderPrice;

    /**
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    public $price;

    /**
     * @var float $orderWeight
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("order_weight")
     *
     * @FakeMockField()
     */
    public $orderWeight;

    /**
     * @return float|null
     */
    public function getOrderPrice(): ?float
    {
        return $this->orderPrice;
    }

    /**
     * @param float $orderPrice
     */
    public function setOrderPrice(float $orderPrice): void
    {
        $this->orderPrice = $orderPrice;
    }

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
    public function getOrderWeight(): ?float
    {
        return $this->orderWeight;
    }

    /**
     * @param float $orderWeight
     */
    public function setOrderWeight(float $orderWeight): void
    {
        $this->orderWeight = $orderWeight;
    }
}
