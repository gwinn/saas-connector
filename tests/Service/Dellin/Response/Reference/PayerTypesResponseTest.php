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

use SaaS\Service\Dellin\Model\Response\Reference\PayerTypesResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class PayerTypesResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PayerTypesResponseTest extends TestCase
{
    public function testGetPayerTypes()
    {
        $mockHandler = $this->getMockHandler([['className' => PayerTypesResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getPayerTypes();

        static::assertResponse($response);
        static::assertInstanceOf(PayerTypesResponse::class, $response->getResponse());
    }
}
