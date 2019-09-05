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
 * Class ClientTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientTest extends TestCase
{
    public function testClientsCount()
    {
        $count = rand(1, 100);

        $mockHandler = $this->getMockHandler([[
            'statusCode' => 200,
            'className' => Insales\Model\Response\CountResponse::class,
            'fixedValue' => ['count' => $count]
        ]]);

        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->clientsCount();

        static::assertResponse($response);
        static::assertEquals($count, $response->getResponse()->getCount());
    }

    public function testClientCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Client::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();

        $client = new Insales\Model\Client();
        $fakeMock->fill($client);

        $response = $apiClient->clientCreate(new Insales\Model\Request\ClientRequest($client));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Client::class, $response->getResponse());
    }

    public function testClientUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Client::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $client = new Insales\Model\Client();
        $fakeMock->fill($client);

        $response = $apiClient->clientUpdate(new Insales\Model\Request\ClientRequest($client));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Client::class, $response->getResponse());
    }

    public function testClientDelete()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Response\StatusResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->clientDelete(1);

        static::assertResponse($response);
        static::assertEquals('ok', $response->getResponse()->status);
    }
}
