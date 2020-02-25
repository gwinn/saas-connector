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
 * Class LoadUnload
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class LoadUnload
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("derival")
     *
     * @FakeMockField(value="3510.0")
     */
    public $derival;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("arrival")
     *
     * @FakeMockField(value="4500.0")
     */
    public $arrival;
}
