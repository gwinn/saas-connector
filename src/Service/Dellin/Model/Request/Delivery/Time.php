<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Time
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Time
{
    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("worktimeStart")
     *
     * @FakeMockField(value="09:00")
     */
    public $worktimeStart;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("worktimeEnd")
     *
     * @FakeMockField(value="18:00")
     */
    public $worktimeEnd;

    /**
     * Format: HH:MM
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("breakStart")
     *
     * @FakeMockField(value="12:30")
     */
    public $breakStart;

    /**
     * Format: HH:MM
     *
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("breakEnd")
     *
     * @FakeMockField(value="13:30")
     */
    public $breakEnd;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("exactTime")
     *
     * @FakeMockField(value="true")
     */
    public $exactTime;
}
