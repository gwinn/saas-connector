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

use SaaS\Service\Dellin\Model\Response\Reference\FreightTypesResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class FreightTypesResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FreightTypesResponseTest extends TestCase
{
    public function testGetFreightTypes()
    {
        $mockHandler = $this->getMockHandler([['className' => FreightTypesResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getFreightTypes('test');

        static::assertResponse($response);
        static::assertInstanceOf(FreightTypesResponse::class, $response->getResponse());
    }
}
