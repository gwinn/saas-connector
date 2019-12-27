<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Order;

use SaaS\Service\Dellin\Model\Response\Order\OrderPrintPlateResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class OrderPrintPlateResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class OrderPrintPlateResponseTest extends TestCase
{
    public function testGetPrintPlate()
    {
        $mockHandler = $this->getMockHandler([['className' => OrderPrintPlateResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getPrintPlate('test', 'test');

        static::assertResponse($response);
        static::assertInstanceOf(OrderPrintPlateResponse::class, $response->getResponse());
    }
}
