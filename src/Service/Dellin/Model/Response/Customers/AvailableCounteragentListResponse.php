<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Customers;

use Er1z\FakeMock\Annotations\FakeMock;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AvailableCounteragentListResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class AvailableCounteragentListResponse
{
    /**
     * @var array|Counteragent[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Customers\Counteragent>")
     * @Serializer\SerializedName("counteragents")
     */
    public $counteragents;
}
