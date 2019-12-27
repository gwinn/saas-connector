<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Book;

use SaaS\Service\Dellin\Model\Request\Book\Address;
use SaaS\Service\Dellin\Model\Response\Book\UpdateAddressResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class UpdateAddressResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class UpdateAddressResponseTest extends TestCase
{
    public function testCreateAddress()
    {
        $mockHandler = $this->getMockHandler([['className' => UpdateAddressResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->createAddress('test', $this->fakeMock->fill(Address::class));

        static::assertResponse($response);
        static::assertInstanceOf(UpdateAddressResponse::class, $response->getResponse());
    }

    public function testEditAddress()
    {
        $mockHandler = $this->getMockHandler([['className' => UpdateAddressResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->editAddress('test', 'test');

        static::assertResponse($response);
        static::assertInstanceOf(UpdateAddressResponse::class, $response->getResponse());
    }
}
