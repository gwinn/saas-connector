<?php

namespace SaaS\Tests\Service\Dellin\Response\Order;

use SaaS\Service\Dellin\Model\Request\Order\CancelPickupRequest;
use SaaS\Service\Dellin\Model\Response\Order\CancelPickupResponse;
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
class CancelPickupResponseTest extends TestCase
{
    public function testGetChangeAvailable()
    {
        $mockHandler = $this->getMockHandler([['className' => CancelPickupResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->cancelPickup($this->fakeMock->fill(CancelPickupRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(CancelPickupResponse::class, $response->getResponse());
    }
}
