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

use SaaS\Service\Dellin\Model\Response\Order\ShipmentPrintPlateResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class ShipmentPrintPlateResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ShipmentPrintPlateResponseTest extends TestCase
{
    public function testGetShipmentPrintPlate()
    {
        $mockHandler = $this->getMockHandler([['className' => ShipmentPrintPlateResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getShipmentPrintPlate('test');

        static::assertResponse($response);
        static::assertInstanceOf(ShipmentPrintPlateResponse::class, $response->getResponse());
    }
}
