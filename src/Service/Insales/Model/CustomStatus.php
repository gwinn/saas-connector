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
 * Class CustomStatus
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CustomStatus
{
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;
    use Traits\Position;
    use Traits\Permalink;

    /**
     * @var string|null $systemStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("system_status")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    protected $systemStatus;

    /**
     * @var bool|null $isDefault
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_default")
     *
     * @FakeMockField()
     */
    protected $isDefault;

    /**
     * @var string|null $color
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("color")
     *
     * @FakeMockField(faker="hexColor")
     */
    protected $color;

    /**
     * @return null|string
     */
    public function getSystemStatus(): ?string
    {
        return $this->systemStatus;
    }

    /**
     * @param null|string $systemStatus
     */
    public function setSystemStatus(?string $systemStatus): void
    {
        $this->systemStatus = $systemStatus;
    }

    /**
     * @return bool|null
     */
    public function isDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool|null $isDefault
     */
    public function setIsDefault(?bool $isDefault): void
    {
        $this->isDefault = $isDefault;
    }

    /**
     * @return null|string
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param null|string $color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }
}
