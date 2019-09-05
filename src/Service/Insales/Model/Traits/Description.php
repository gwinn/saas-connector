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
 * Trait Description
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Description
{
    /**
     * @var string|null $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     *
     * @FakeMockField()
     */
    protected $description;

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
