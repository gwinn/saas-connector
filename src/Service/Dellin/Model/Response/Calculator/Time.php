<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Time
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
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
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("genitive")
     *
     * @FakeMockField(value="3 дней")
     */
    public $genitive;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("nominative")
     *
     * @FakeMockField(value="3 дня")
     */
    public $nominative;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     *
     * @FakeMockField(value="3")
     */
    public $value;
}
