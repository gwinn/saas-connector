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

use SaaS\Service\Dellin\Model\Request\Reference\AvailablePackageRequest;
use SaaS\Service\Dellin\Model\Response\Reference\AvailablePackageListResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class AvailablePackageListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AvailablePackageListResponseTest extends TestCase
{
    public function testGetAvailablePackages()
    {
        $mockHandler = $this->getMockHandler([['className' => AvailablePackageListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getAvailablePackages($this->fakeMock->fill(AvailablePackageRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(AvailablePackageListResponse::class, $response->getResponse());
    }
}
