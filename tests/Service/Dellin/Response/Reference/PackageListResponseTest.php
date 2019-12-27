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

use SaaS\Service\Dellin\Model\Response\Reference\PackageListResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class PackageListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PackageListResponseTest extends TestCase
{
    public function testGetPackages()
    {
        $mockHandler = $this->getMockHandler([['className' => PackageListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getPackages();

        static::assertResponse($response);
        static::assertInstanceOf(PackageListResponse::class, $response->getResponse());
    }
}
