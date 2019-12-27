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

use SaaS\Service\Dellin\Model\Response\Book\ContactResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class ContactResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ContactResponseTest extends TestCase
{
    public function testCreateContact()
    {
        $mockHandler = $this->getMockHandler([['className' => ContactResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->createContact('test', 'test');

        static::assertResponse($response);
        static::assertInstanceOf(ContactResponse::class, $response->getResponse());
    }

    public function testEditContact()
    {
        $mockHandler = $this->getMockHandler([['className' => ContactResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->editContact('test', 'test');

        static::assertResponse($response);
        static::assertInstanceOf(ContactResponse::class, $response->getResponse());
    }
}
