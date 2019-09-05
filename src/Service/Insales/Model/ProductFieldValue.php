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
 * Class ProductFieldValue
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ProductFieldValue
{
    use Traits\Id;

    /**
     * @var int $productFieldId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("product_field_id")
     *
     * @FakeMockField()
     */
    public $productFieldId;

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
    public function getProductFieldId(): ?int
    {
        return $this->productFieldId;
    }

    /**
     * @param int $productFieldId
     */
    public function setProductFieldId(int $productFieldId): void
    {
        $this->productFieldId = $productFieldId;
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
