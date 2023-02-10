<?php

namespace SaaS\Tests\Service\Dellin\Response\Order;

use SaaS\Service\Dellin\Model\Response\Order\ChangeAvailableResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class ChangeAvailableResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ChangeAvailableResponseTest extends TestCase
{
    public function testGetChangeAvailable()
    {
        $mockHandler = $this->getMockHandler([['className' => ChangeAvailableResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getChangeAvailable(111);

        static::assertResponse($response);
        static::assertInstanceOf(ChangeAvailableResponse::class, $response->getResponse());
    }
}
