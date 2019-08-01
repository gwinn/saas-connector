<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Insales;

use SaaS\Service\Insales;

/**
 * Class OrderTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class OrderTest extends TestCase
{
    public function testOrdersCount()
    {
        $count = rand(1, 100);

        $mockHandler = $this->getMockHandler([[
            'statusCode' => 200,
            'className' => Insales\Model\Response\CountResponse::class,
            'fixedValue' => ['count' => $count]
        ]]);

        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->ordersCount();

        static::assertResponse($response);
        static::assertEquals($count, $response->getResponse()->getCount());
    }

    public function testOrderCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Order::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();

        $order = new Insales\Model\Order();
        $fakeMock->fill($order);

        $response = $apiClient->orderCreate(new Insales\Model\Request\OrderRequest($order));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Order::class, $response->getResponse());
    }

    public function testOrderUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Order::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $order = new Insales\Model\Order();
        $fakeMock->fill($order);

        $response = $apiClient->orderUpdate(new Insales\Model\Request\OrderRequest($order));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Order::class, $response->getResponse());
    }

    public function testOrderDelete()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Response\StatusResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->orderDelete(1);

        static::assertResponse($response);
        static::assertEquals('ok', $response->getResponse()->status);
    }
}
