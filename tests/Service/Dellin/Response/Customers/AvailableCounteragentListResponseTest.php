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

use SaaS\Service\Dellin\Model\Response\Customers\AvailableCounteragentListResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class AvailableCounteragentListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AvailableCounteragentListResponseTest extends TestCase
{
    public function testGetAvailableCounteragents()
    {
        $mockHandler = $this->getMockHandler([['className' => AvailableCounteragentListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getAvailableCounteragents('test', true);

        static::assertResponse($response);
        static::assertInstanceOf(AvailableCounteragentListResponse::class, $response->getResponse());
    }
}
