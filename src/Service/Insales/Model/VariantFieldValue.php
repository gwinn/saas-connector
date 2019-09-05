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
 * Class VariantFieldValue
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class VariantFieldValue
{
    use Traits\Id;

    /**
     * @var int $variantFieldId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("variant_field_id")
     *
     * @FakeMockField()
     */
    public $variantFieldId;

    /**
     * @var string|null $value
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("value")
     *
     * @FakeMockField()
     */
    public $value;

    /**
     * @return int|null
     */
    public function getVariantFieldId(): ?int
    {
        return $this->variantFieldId;
    }

    /**
     * @param int $variantFieldId
     */
    public function setVariantFieldId(int $variantFieldId): void
    {
        $this->variantFieldId = $variantFieldId;
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
}
