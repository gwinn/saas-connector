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
 * Class Domain
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Domain
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;

    /**
     * @var string|null $domain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("domain")
     *
     * @FakeMockField(faker="domainName")
     */
    protected $domain;

    /**
     * @var bool|null $main
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("main")
     *
     * @FakeMockField()
     */
    protected $main;

    /**
     * @return null|string
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param null|string $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return bool|null
     */
    public function getMain(): ?bool
    {
        return $this->main;
    }

    /**
     * @param bool|null $main
     */
    public function setMain(?bool $main): void
    {
        $this->main = $main;
    }
}
