<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Order;

use SaaS\Service\Dellin\Model\Response\Order\OrderListResponse;
use SaaS\Service\Dellin\Model\Request\Order\OrderRequest;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class OrderListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class OrderListResponseTest extends TestCase
{
    public function testGetOrders()
    {
        $mockHandler = $this->getMockHandler([['className' => OrderListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getOrders($this->fakeMock->fill(OrderRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(OrderListResponse::class, $response->getResponse());
    }
}
