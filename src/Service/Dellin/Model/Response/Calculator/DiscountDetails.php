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
 * Class DiscountDetails
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DiscountDetails
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="Скидка 1")
     */
    public $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     *
     * @FakeMockField(value="50.0")
     */
    public $value;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("date")
     *
     * @FakeMockField(value="2016-01-01")
     */
    public $date;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("announcement")
     *
     * @FakeMockField(value="true")
     */
    public $announcement;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("public")
     *
     * @FakeMockField(value="true")
     */
    public $public;
}
