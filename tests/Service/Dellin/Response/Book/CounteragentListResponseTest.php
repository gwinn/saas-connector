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

use SaaS\Service\Dellin\Model\Response\Book\CounteragentListResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class CounteragentListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class CounteragentListResponseTest extends TestCase
{
    public function testGetCounteragents()
    {
        $mockHandler = $this->getMockHandler([['className' => CounteragentListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getCounteragents();

        static::assertResponse($response);
        static::assertInstanceOf(CounteragentListResponse::class, $response->getResponse());
    }
}
