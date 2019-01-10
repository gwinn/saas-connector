<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */


namespace SaaS\Tests\Insales;

use SaaS\Test\TestCase;
/**
 * Class ApiReferenceTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiReferenceTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function providerException()
    {
        return array(
            'empty_data' => array(
                null,
                array(),
                array()
            ),
            'order_not_found' => array(
                123,
                array(),
                array()
            ),
        );
    }

    /**
     * Test using the method orderShippingAddressUpdate to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     * @dataProvider providerException
     * @param $orderId
     * @param $address
     */
    public function testOrderShippingAddressUpdateException($orderId, $address)
    {
        $client = static::getInsalesApiClient();
        $client->orderShippingAddressUpdate($orderId, $address);
    }

    /**
     * Test using the method orderShippingAddressUpdate to give exception
     */
    public function testOrderShippingAddressUpdate()
    {
        $client = static::getInsalesApiClient();
        $order = $client->ordersList()->offsetGet(0);
        $address = array(
            'address' => 'New address'
        );
        $response = $client->orderShippingAddressUpdate($order['id'], $address);
        static::checkResponse($response);
    }
    
    /**
     * Test using the method orderCustomStatusUpdate to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     * @dataProvider providerException
     * @param $orderId
     * @param $status
     * @param $fulfilmentStatus
     */
    public function testOrderCustomStatusUpdateException($orderId, $status, $fulfilmentStatus)
    {
        $client = static::getInsalesApiClient();
        $client->orderCustomStatusUpdate($orderId, $status, $fulfilmentStatus);
    }

    /**
     * Test using the method orderCustomStatusUpdate
     */
    public function testOrderCustomStatusUpdate()
    {
        $client = static::getInsalesApiClient();
        $order = $client->ordersList()->offsetGet(0);

        $response = $client->orderCustomStatusUpdate($order['id'], 'otmenen', 'declined');
        static::checkResponse($response);
    }

}
