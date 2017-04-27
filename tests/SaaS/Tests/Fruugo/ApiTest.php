<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Tests\Fruugo;

use SaaS\Http\ResponseXML;
use SaaS\Test\TestCase;
use SaaS\Service\Fruugo\Api;

/**
 * Class ApiTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiTest extends TestCase
{
    /**
     * Test successful Api client init
     *
     * @group fruugo
     */
    public function testConstruct()
    {
        $client = static::getFruugoApiClient();
        $this->assertInstanceOf('SaaS\Service\Fruugo\Api', $client);
    }

    /**
     * Test Api client init with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testConstructNullArguments()
    {
        new Api(null, null);
    }

    /**
     * Test method OrdersDownload with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testOrdersDownloadNullArguments()
    {
        $client = static::getFruugoApiClient();
        $client->ordersDownload(null);
    }

    /**
     * Test method OrdersConfirm with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testOrdersConfirmNullArguments()
    {
        $client = static::getFruugoApiClient();
        $client->ordersConfirm(null);
    }

    /**
     * Test method OrdersCancel with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testOrdersCancelNullArguments()
    {
        $client = static::getFruugoApiClient();
        $client->ordersCancel(null, null);
    }

    /**
     * Test method OrderShip with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testOrderShipNullArguments()
    {
        $client = static::getFruugoApiClient();
        $client->orderShip(null);
    }

    /**
     * Test method OrderReturn with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testOrderReturnNullArguments()
    {
        $client = static::getFruugoApiClient();
        $client->orderReturn(null);
    }

    /**
     * Test method OrderPackinglist with trow exception
     *
     * @expectedException \InvalidArgumentException
     * @group fruugo
     */
    public function testOrderPackinglistNullArguments()
    {
        $client = static::getFruugoApiClient();
        $client->orderPackinglist(null, null);
    }

    /**
     * Test successful performance method OrderDownload
     *
     * @group fruugo
     */
    public function testOrdersDownload()
    {
        $client = static::getFruugoApiClient();
        $from = new \DateTime();
        $from->modify('-30 day');
        $response = $client->ordersDownload($from->format('Y-m-d'));

        $this->checkResponseXML($response);

        return $response;
    }

    /**
     * Test method OrdersConfirm with trow exception
     *
     * @depends testOrdersDownload
     * @group fruugo
     */
    public function OrdersConfirm(ResponseXML $orders)
    {
        $orders = $orders->offsetGet('order');

        if (!empty($orders)) {
            $order = array_shift($orders);
            $client = static::getFruugoApiClient();
            $response = $client->ordersConfirm($order['orderId']);
            $this->checkResponseXML($response);
        } else {
            echo "Не найден ни один заказ за 20 дней\n";
        }

    }

    private function checkResponseXML(ResponseXML $response)
    {
        self::assertInstanceOf('SaaS\Http\ResponseXML', $response);
        self::assertTrue(in_array($response->getStatusCode(), array(200, 201)));
        self::assertTrue($response->isSuccessful());
    }
}
