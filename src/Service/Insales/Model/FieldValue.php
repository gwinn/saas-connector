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
 * Class FieldValue
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class FieldValue
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Handle;
    use Traits\Name;

    /**
     * @var int $fieldId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("field_id")
     *
     * @FakeMockField()
     */
    protected $fieldId;

    /**
     * @var string|null $value
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("value")
     *
     * @FakeMockField()
     */
    protected $value;

    /**
     * @var string|null $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField()
     */
    protected $type;

    /**
     * @return int|null
     */
    public function getFieldId(): ?int
    {
        return $this->fieldId;
    }

    /**
     * @param int $fieldId
     */
    public function setFieldId(int $fieldId): void
    {
        $this->fieldId = $fieldId;
    }

    /**
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param null|string $value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
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
}
