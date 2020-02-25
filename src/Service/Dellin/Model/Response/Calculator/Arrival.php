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
 * Class Arrival
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Arrival
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminal")
     *
     * @FakeMockField(value="Москва")
     */
    public $terminal;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="50.0")
     */
    public $price;

    /**
     * @var array|Terminal[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\Terminal>")
     * @Serializer\SerializedName("terminals")
     */
    public $terminals;

    /**
     * @var array|TerminalExpress[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\TerminalExpress>")
     * @Serializer\SerializedName("terminals_express")
     */
    public $terminalsExpress;
}
