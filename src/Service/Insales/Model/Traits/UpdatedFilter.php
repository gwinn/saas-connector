<?php

/**
 * PHP version 7.0
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Traits;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMockField;

/**
 * Trait UpdatedFilter
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait UpdatedFilter
{
    /**
     * @var string|null $updatedSince
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_since")
     *
     * @FakeMockField()
     */
    protected $updatedSince;

    /**
     * @var int $fromId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("from_id")
     *
     * @FakeMockField()
     */
    protected $fromId;

    /**
     * @param string $updatedSince
     */
    public function setUpdatedSince(string $updatedSince): void
    {
        $this->updatedSince = $updatedSince;
    }

    /**
     * @return string|null
     */
    public function getUpdatedSince(): ?string
    {
        return $this->updatedSince;
    }

    /**
     * @param int $fromId
     */
    public function setFromId(int $fromId): void
    {
        $this->fromId = $fromId;
    }

    /**
     * @return int|null
     */
    public function getFromId(): ?int
    {
        return $this->fromId;
    }
}
