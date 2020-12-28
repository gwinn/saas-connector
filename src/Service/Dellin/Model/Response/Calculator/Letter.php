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
 * Class Letter
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Letter
{
    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="300.0")
     */
    public $price;

    /**
     * @var Time
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Time")
     * @Serializer\SerializedName("time")
     *
     * @FakeMockField()
     */
    public $time;
}
