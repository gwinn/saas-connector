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
 * Trait Destroy
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Destroy
{
    /**
     *  Destroy marker (1 or true)
     *
     * @var int $destroy
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("_destroy")
     *
     * @FakeMockField(faker="randomElement", arguments={{1,0}})
     */
    protected $destroy;

    /**
     * @return int|null
     */
    public function getDestroy(): ?int
    {
        return $this->destroy;
    }

    /**
     * @param int $destroy
     */
    public function setDestroy(int $destroy): void
    {
        $this->destroy = $destroy;
    }
}
