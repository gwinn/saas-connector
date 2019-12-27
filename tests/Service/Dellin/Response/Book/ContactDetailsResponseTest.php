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

use SaaS\Service\Dellin\Model\Response\Book\ContactDetailsResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class ContactDetailsResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ContactDetailsResponseTest extends TestCase
{
    public function testGetContactDetails()
    {
        $mockHandler = $this->getMockHandler([['className' => ContactDetailsResponse::class, 'list' => 3, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getContactDetails('test');

        static::assertResponse($response);
        static::assertResponseList($response, ContactDetailsResponse::class, 3);
    }
}
