<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Delivery;

use SaaS\Service\Dellin\Model\Request\Delivery\DeliveryRequest;
use SaaS\Service\Dellin\Model\Response\Delivery\DeliveryResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class DeliveryResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class DeliveryResponseTest extends TestCase
{
    public function testCreateDelivery()
    {
        $mockHandler = $this->getMockHandler([['className' => DeliveryResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->createDelivery($this->fakeMock->fill(DeliveryRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(DeliveryResponse::class, $response->getResponse());
    }
}
