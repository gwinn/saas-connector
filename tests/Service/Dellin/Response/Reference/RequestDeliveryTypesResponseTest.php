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

use SaaS\Service\Dellin\Model\Response\Reference\RequestDeliveryTypesResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class RequestDeliveryTypesResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestDeliveryTypesResponseTest extends TestCase
{
    public function testGetRequestDeliveryTypes()
    {
        $mockHandler = $this->getMockHandler([['className' => RequestDeliveryTypesResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getRequestDeliveryTypes();

        static::assertResponse($response);
        static::assertInstanceOf(RequestDeliveryTypesResponse::class, $response->getResponse());
    }
}
