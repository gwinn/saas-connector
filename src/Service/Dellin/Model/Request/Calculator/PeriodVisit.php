<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ArrivalUnLoading
 *
 * @package  SaaS\Service\Dellin\Model\Request\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class PeriodVisit
{
    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("start")
     */
    public $start;

    /**
     * Format: HH:MM
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("end")
     */
    public $end;
}
