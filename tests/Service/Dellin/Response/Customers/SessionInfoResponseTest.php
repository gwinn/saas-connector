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

use SaaS\Service\Dellin\Model\Response\Customers\SessionInfoResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class SessionInfoResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SessionInfoResponseTest extends TestCase
{
    public function testSessionInfo()
    {
        $mockHandler = $this->getMockHandler([['className' => SessionInfoResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getSessionInfo();

        static::assertResponse($response);
        static::assertInstanceOf(SessionInfoResponse::class, $response->getResponse());
    }
}
