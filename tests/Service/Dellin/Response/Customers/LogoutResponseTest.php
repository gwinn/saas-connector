<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Customers;

use SaaS\Service\Dellin\Model\Response\Customers\LogoutResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class LogoutResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LogoutResponseTest extends TestCase
{
    public function testLogout()
    {
        $mockHandler = $this->getMockHandler([['className' => LogoutResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->logout();

        static::assertResponse($response);
        static::assertInstanceOf(LogoutResponse::class, $response->getResponse());
    }
}
