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
use SaaS\Service\Dellin\Model\Response\Reference\RequestTerminalsResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class RequestTerminalsResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestTerminalsResponseTest extends TestCase
{
    public function testGetRequestTerminals()
    {
        $mockHandler = $this->getMockHandler([['className' => RequestTerminalsResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getRequestTerminals('test', null, 'test');

        static::assertResponse($response);
        static::assertInstanceOf(RequestTerminalsResponse::class, $response->getResponse());
    }
}
