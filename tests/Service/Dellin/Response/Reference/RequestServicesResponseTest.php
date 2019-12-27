<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Reference;

use SaaS\Service\Dellin\Model\Response\Reference\RequestServicesResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class RequestServicesResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestServicesResponseTest extends TestCase
{
    public function testGetRequestServices()
    {
        $mockHandler = $this->getMockHandler([['className' => RequestServicesResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getRequestServices();

        static::assertResponse($response);
        static::assertInstanceOf(RequestServicesResponse::class, $response->getResponse());
    }
}
