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

use SaaS\Service\Dellin\Model\Response\Book\AddressResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class AddressResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AddressResponseTest extends TestCase
{
    public function testGetContactDetails()
    {
        $mockHandler = $this->getMockHandler([['className' => AddressResponse::class, 'list' => 3, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getAddresses('test');

        static::assertResponse($response);
        static::assertResponseList($response, AddressResponse::class, 3);
    }
}
