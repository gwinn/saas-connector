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
 * Class Property
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Property
{
    use Traits\Id;
    use Traits\Title;
    use Traits\Position;
    use Traits\Permalink;

    /**
     * @var bool|null $backoffice
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("backoffice")
     *
     * @FakeMockField()
     */
    public $backoffice;

    /**
     * @var bool|null $isHidden
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_hidden")
     *
     * @FakeMockField()
     */
    public $isHidden;

    /**
     * @var bool|null $isNavigational
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_navigational")
     *
     * @FakeMockField()
     */
    public $isNavigational;

    /**
     * @return bool|null
     */
    public function getBackoffice(): ?bool
    {
        return $this->backoffice;
    }

    /**
     * @param bool|null $backoffice
     */
    public function setBackoffice(?bool $backoffice): void
    {
        $this->backoffice = $backoffice;
    }

    /**
     * @return bool|null
     */
    public function getisHidden(): ?bool
    {
        return $this->isHidden;
    }

    /**
     * @param bool|null $isHidden
     */
    public function setIsHidden(?bool $isHidden): void
    {
        $this->isHidden = $isHidden;
    }

    /**
     * @return bool|null
     */
    public function getisNavigational(): ?bool
    {
        return $this->isNavigational;
    }

    /**
     * @param bool|null $isNavigational
     */
    public function setIsNavigational(?bool $isNavigational): void
    {
        $this->isNavigational = $isNavigational;
    }
}
