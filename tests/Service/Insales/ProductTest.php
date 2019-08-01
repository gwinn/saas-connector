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
 * Class ProductTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ProductTest extends TestCase
{
    public function testProductsCount()
    {
        $count = rand(1, 100);

        $mockHandler = $this->getMockHandler([[
            'statusCode' => 200,
            'className' => Insales\Model\Response\CountResponse::class,
            'fixedValue' => ['count' => $count]
        ]]);

        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->productsCount();

        static::assertResponse($response);
        static::assertEquals($count, $response->getResponse()->getCount());
    }

    public function testProductCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Product::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();

        $product = new Insales\Model\Product();
        $fakeMock->fill($product);

        $response = $apiClient->productCreate(new Insales\Model\Request\ProductRequest($product));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Product::class, $response->getResponse());
    }

    public function testProductUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Product::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $product = new Insales\Model\Product();
        $fakeMock->fill($product);

        $response = $apiClient->productUpdate(new Insales\Model\Request\ProductRequest($product));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Product::class, $response->getResponse());
    }

    public function testProductDelete()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Response\StatusResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->productDelete(1);

        static::assertResponse($response);
        static::assertEquals('ok', $response->getResponse()->status);
    }
}
