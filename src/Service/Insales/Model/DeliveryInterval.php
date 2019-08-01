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
 * Class DeliveryInterval
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryInterval
{
    use Traits\Description;

    /**
     * @var int $minDays
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("min_days")
     *
     * @FakeMockField()
     */
    protected $minDays;

    /**
     * @var int $maxDays
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("max_days")
     *
     * @FakeMockField()
     */
    protected $maxDays;

    /**
     * @return int|null
     */
    public function getMinDays(): ?int
    {
        return $this->minDays;
    }

    /**
     * @param int $minDays
     */
    public function setMinDays(int $minDays): void
    {
        $this->minDays = $minDays;
    }

    /**
     * @return int|null
     */
    public function getMaxDays(): ?int
    {
        return $this->maxDays;
    }

    /**
     * @param int $maxDays
     */
    public function setMaxDays(int $maxDays): void
    {
        $this->maxDays = $maxDays;
    }
}
