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
 * Class VariantField
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class VariantField
{
    use Traits\Id;
    use Traits\Title;
    use Traits\Position;
    use Traits\Handle;

    const TEXT_FIELD = 'VariantField::TextField';
    const TEXT_AREA = 'VariantField::TextArea';

    /**
     * @var int $applicationId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("application_id")
     *
     * @FakeMockField()
     */
    public $applicationId;

    /**
     * @var string|null $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"VariantField::TextField", "VariantField::TextArea"}})
     */
    public $type;

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
     * @return int|null
     */
    public function getApplicationId(): ?int
    {
        return $this->applicationId;
    }

    /**
     * @param int $applicationId
     */
    public function setApplicationId(int $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
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
}
