<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Boxberry;

use SaaS\Service\Boxberry;

/**
 * Class DeliveryCostsTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class DeliveryCostsTest extends TestCase
{
    public function testDeliveryCosts()
    {
        $request = $this->getMockData(['className' => Boxberry\Model\Request\DeliveryCosts::class]);

        $responseForMock = [
            'className' => Boxberry\Model\DeliveryCosts::class,
            'statusCode' => 200
        ];

        $apiClient = $this->getApiClient($this->getMockHandler([$responseForMock]));
        $response = $apiClient->deliveryCosts($request);

        static::assertResponse($response);
        static::assertResponseList(
            $response,
            Boxberry\Model\DeliveryCosts::class,
            Boxberry\Model\DeliveryCosts::class
        );
    }
}
