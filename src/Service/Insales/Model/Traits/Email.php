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
 * Trait Id
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Email
{
    /**
     * @var string|null $email
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     *
     * @FakeMockField(faker="email")
     */
    protected $email;

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}
