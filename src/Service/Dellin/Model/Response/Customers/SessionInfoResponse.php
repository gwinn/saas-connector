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
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SessionInfoResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class SessionInfoResponse
{
    /**
     * @var Session
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Customers\Session")
     * @Serializer\SerializedName("session")
     *
     * @FakeMockField()
     */
    public $session;
}
