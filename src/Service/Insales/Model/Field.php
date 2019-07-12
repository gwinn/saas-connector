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
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * @var int $position
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("position")
     *
     * @FakeMockField()
     */
    public $position;

    /**
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * @var string $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"Field::TextField", "Field::TextArea"}})
     */
    public $type;

    /**
     * @var bool $active
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("active")
     *
     * @FakeMockField()
     */
    public $active;

    /**
     * @var int $destiny
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("destiny")
     *
     * @FakeMockField(faker="numberBetween", arguments={1, 5})
     */
    public $destiny;

    /**
     * @var string $systemName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("system_name")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $systemName;

    /**
     * @var string $handle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("handle")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $handle;

    /**
     * @var bool $forBuyer
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("for_buyer")
     *
     * @FakeMockField()
     */
    public $forBuyer;

    /**
     * @var bool|null $hideInBackoffice
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("hide_in_backoffice")
     *
     * @FakeMockField()
     */
    public $hideInBackoffice = null;

    /**
     * @var bool|null $isIndexed
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_indexed")
     *
     * @FakeMockField()
     */
    public $isIndexed = null;

    /**
     * @var bool $obligatory
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("obligatory")
     *
     * @FakeMockField()
     */
    public $obligatory;

    /**
     * @var bool $showInCheckout
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("show_in_checkout")
     *
     * @FakeMockField()
     */
    public $showInCheckout;

    /**
     * @var bool $showInResult
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("show_in_result")
     *
     * @FakeMockField()
     */
    public $showInResult;

    /**
     * @var string $officeTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("office_title")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $officeTitle;

    /**
     * @var string $example
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("example")
     *
     * @FakeMockField()
     */
    public $example;

    /**
     * @var array $fieldOptions
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldOption>")
     * @JMS\SerializedName("field_options")
     *
     * @FakeMockField()
     */
    public $fieldOptions = [];
}
