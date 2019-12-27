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

use SaaS\Service\Dellin\Model\Response\Customers\LoginResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class LoginResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LoginResponseTest extends TestCase
{
    public function testLogin()
    {
        $mockHandler = $this->getMockHandler([['className' => LoginResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->login('login', 'password');

        static::assertResponse($response);
        static::assertInstanceOf(LoginResponse::class, $response->getResponse());
    }
}
