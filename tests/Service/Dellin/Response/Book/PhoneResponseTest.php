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

use SaaS\Service\Dellin\Model\Response\Book\PhoneResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class PhoneResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PhoneResponseTest extends TestCase
{
    public function testCreatePhone()
    {
        $mockHandler = $this->getMockHandler([['className' => PhoneResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->createPhone('test', 'test', 'test');

        static::assertResponse($response);
        static::assertInstanceOf(PhoneResponse::class, $response->getResponse());
    }

    public function testEditPhone()
    {
        $mockHandler = $this->getMockHandler([['className' => PhoneResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->editPhone('test', 'test', 'test');

        static::assertResponse($response);
        static::assertInstanceOf(PhoneResponse::class, $response->getResponse());
    }
}
