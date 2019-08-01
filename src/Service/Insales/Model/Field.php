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
 * Class Field
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Field
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;
    use Traits\Position;
    use Traits\Handle;

    const TEXT_FIELD = 'Field::TextField';
    const TEXT_AREA = 'Field::TextArea';
    const CHECKBOX = 'Field::Checkbox';
    const FILE_FIELD = 'Field::FileField';
    const DELIVERY = 'Field::Delivery';
    const PICK_POINT = 'Field::PickPoint';
    const SELECT = 'Field::Select';

    const DESTINY_SHIPPING_ADDRESS = 1;
    const DESTINY_CLIENT_INDIVIDUAL = 2;
    const DESTINY_ORDER = 3;
    const DESTINY_ORDER_LINE = 4;
    const DESTINY_CLIENT_JURIDICAL = 5;

    /**
     * @var string|null $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"Field::TextField", "Field::TextArea"}})
     */
    protected $type;

    /**
     * @var bool|null $active
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("active")
     *
     * @FakeMockField()
     */
    protected $active;

    /**
     * @var int $destiny
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("destiny")
     *
     * @FakeMockField(faker="numberBetween", arguments={1, 5})
     */
    protected $destiny;

    /**
     * @var string|null $systemName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("system_name")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    protected $systemName;

    /**
     * @var bool|null $forBuyer
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("for_buyer")
     *
     * @FakeMockField()
     */
    protected $forBuyer;

    /**
     * @var bool|null $hideInBackoffice
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("hide_in_backoffice")
     *
     * @FakeMockField()
     */
    protected $hideInBackoffice = null;

    /**
     * @var bool|null $isIndexed
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_indexed")
     *
     * @FakeMockField()
     */
    protected $isIndexed = null;

    /**
     * @var bool|null $obligatory
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("obligatory")
     *
     * @FakeMockField()
     */
    protected $obligatory;

    /**
     * @var bool|null $showInCheckout
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("show_in_checkout")
     *
     * @FakeMockField()
     */
    protected $showInCheckout;

    /**
     * @var bool|null $showInResult
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("show_in_result")
     *
     * @FakeMockField()
     */
    protected $showInResult;

    /**
     * @var string|null $officeTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("office_title")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    protected $officeTitle;

    /**
     * @var string|null $example
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("example")
     *
     * @FakeMockField()
     */
    protected $example;

    /**
     * @var array $fieldOptions
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldOption>")
     * @JMS\SerializedName("field_options")
     */
    protected $fieldOptions = [];

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
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     */
    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return int|null
     */
    public function getDestiny(): ?int
    {
        return $this->destiny;
    }

    /**
     * @param int $destiny
     */
    public function setDestiny(int $destiny): void
    {
        $this->destiny = $destiny;
    }

    /**
     * @return null|string
     */
    public function getSystemName(): ?string
    {
        return $this->systemName;
    }

    /**
     * @param null|string $systemName
     */
    public function setSystemName(?string $systemName): void
    {
        $this->systemName = $systemName;
    }

    /**
     * @return bool|null
     */
    public function getForBuyer(): ?bool
    {
        return $this->forBuyer;
    }

    /**
     * @param bool|null $forBuyer
     */
    public function setForBuyer(?bool $forBuyer): void
    {
        $this->forBuyer = $forBuyer;
    }

    /**
     * @return bool|null
     */
    public function getHideInBackoffice(): ?bool
    {
        return $this->hideInBackoffice;
    }

    /**
     * @param bool|null $hideInBackoffice
     */
    public function setHideInBackoffice(?bool $hideInBackoffice): void
    {
        $this->hideInBackoffice = $hideInBackoffice;
    }

    /**
     * @return bool|null
     */
    public function isIndexed(): ?bool
    {
        return $this->isIndexed;
    }

    /**
     * @param bool|null $isIndexed
     */
    public function setIsIndexed(?bool $isIndexed): void
    {
        $this->isIndexed = $isIndexed;
    }

    /**
     * @return bool|null
     */
    public function getObligatory(): ?bool
    {
        return $this->obligatory;
    }

    /**
     * @param bool|null $obligatory
     */
    public function setObligatory(?bool $obligatory): void
    {
        $this->obligatory = $obligatory;
    }

    /**
     * @return bool|null
     */
    public function getShowInCheckout(): ?bool
    {
        return $this->showInCheckout;
    }

    /**
     * @param bool|null $showInCheckout
     */
    public function setShowInCheckout(?bool $showInCheckout): void
    {
        $this->showInCheckout = $showInCheckout;
    }

    /**
     * @return bool|null
     */
    public function getShowInResult(): ?bool
    {
        return $this->showInResult;
    }

    /**
     * @param bool|null $showInResult
     */
    public function setShowInResult(?bool $showInResult): void
    {
        $this->showInResult = $showInResult;
    }

    /**
     * @return null|string
     */
    public function getOfficeTitle(): ?string
    {
        return $this->officeTitle;
    }

    /**
     * @param null|string $officeTitle
     */
    public function setOfficeTitle(?string $officeTitle): void
    {
        $this->officeTitle = $officeTitle;
    }

    /**
     * @return null|string
     */
    public function getExample(): ?string
    {
        return $this->example;
    }

    /**
     * @param null|string $example
     */
    public function setExample(?string $example): void
    {
        $this->example = $example;
    }

    /**
     * @return array
     */
    public function getFieldOptions(): array
    {
        return $this->fieldOptions;
    }

    /**
     * @param array $fieldOptions
     */
    public function setFieldOptions(array $fieldOptions): void
    {
        $this->fieldOptions = $fieldOptions;
    }
}
