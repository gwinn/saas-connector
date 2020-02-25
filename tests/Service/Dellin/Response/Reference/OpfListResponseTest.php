<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Reference;

use SaaS\Service\Dellin\Model\Response\Reference\OpfListResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class OpfListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class OpfListResponseTest extends TestCase
{
    public function testGetOpfList()
    {
        $mockHandler = $this->getMockHandler([['className' => OpfListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getOpfList('test', null, 'test');

        static::assertResponse($response);
        static::assertInstanceOf(OpfListResponse::class, $response->getResponse());
    }
}
