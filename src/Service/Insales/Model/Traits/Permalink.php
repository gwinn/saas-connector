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
 * Trait Permalink
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Permalink
{
    /**
     * Permalink
     *
     * @var string|null $permalink
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("permalink")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    protected $permalink;

    /**
     * @return null|string
     */
    public function getPermalink(): ?string
    {
        return $this->permalink;
    }

    /**
     * @param null|string $permalink
     */
    public function setPermalink(?string $permalink): void
    {
        $this->permalink = $permalink;
    }
}
