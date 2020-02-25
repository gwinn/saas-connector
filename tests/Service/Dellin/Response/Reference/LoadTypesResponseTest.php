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

use SaaS\Service\Dellin\Model\Response\Reference\LoadTypesResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class LoadTypesResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LoadTypesResponseTest extends TestCase
{
    public function testGetLoadTypes()
    {
        $mockHandler = $this->getMockHandler([['className' => LoadTypesResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getLoadTypes();

        static::assertResponse($response);
        static::assertInstanceOf(LoadTypesResponse::class, $response->getResponse());
    }
}
