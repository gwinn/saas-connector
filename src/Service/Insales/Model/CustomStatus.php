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
    /**
     * @var string $permalink
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("permalink")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $permalink;

    /**
     * @var string $systemStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("system_status")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $systemStatus;

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
     * @var bool $isDefault
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_default")
     *
     * @FakeMockField()
     */
    public $isDefault;

    /**
     * @var string $color
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("color")
     *
     * @FakeMockField(faker="hexColor")
     */
    public $color;
}
