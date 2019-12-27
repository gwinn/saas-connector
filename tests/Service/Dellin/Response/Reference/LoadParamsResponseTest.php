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

use SaaS\Service\Dellin\Model\Response\Reference\LoadParamsResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class LoadParamsResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LoadParamsResponseTest extends TestCase
{
    public function testGetLoadParams()
    {
        $mockHandler = $this->getMockHandler([['className' => LoadParamsResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getLoadParams();

        static::assertResponse($response);
        static::assertInstanceOf(LoadParamsResponse::class, $response->getResponse());
    }
}
