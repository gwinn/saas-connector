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
    const TEXT_FIELD = 'VariantField::TextField';
    const TEXT_AREA = 'VariantField::TextArea';

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
     * @var int $applicationId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("application_id")
     *
     * @FakeMockField()
     */
    public $applicationId;

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
     * @FakeMockField(faker="randomElement", arguments={{"VariantField::TextField", "VariantField::TextArea"}})
     */
    public $type;

    /**
     * @var bool $isHidden
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_hidden")
     *
     * @FakeMockField()
     */
    public $isHidden;

    /**
     * @var string $handle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("handle")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $handle;
}
