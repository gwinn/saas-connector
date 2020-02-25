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

use SaaS\Service\Dellin\Model\Request\Book\CounteragentRequest;
use SaaS\Service\Dellin\Model\Response\Book\CounteragentResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class CounteragentResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class CounteragentResponseTest extends TestCase
{
    public function testSetCounteragent()
    {
        $mockHandler = $this->getMockHandler([['className' => CounteragentResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->setCounteragent($this->fakeMock->fill(CounteragentRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(CounteragentResponse::class, $response->getResponse());
    }
}
