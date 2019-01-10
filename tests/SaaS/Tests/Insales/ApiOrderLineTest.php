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
 * Class ApiOrderLineTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiOrderLineTest extends TestCase
{

    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function orderLineProviderException()
    {
        return array(
            'empty_data' => array(
                null,
                array()
            ),
            'product_id_not_found' => array(
                123,
                array(
                    'quantity' => 1
                )
            ),
            'quantity_not_found' => array(
                123,
                array(
                    'variant_id' => 123
                )
            ),
            'not_found' => array(
                123,
                array(
                )
            )
        );
    }

    /**
     * Test using the method orderLineCreate to give exception
     *
     * @dataProvider orderLineProviderException
     * @expectedException \SaaS\Exception\InsalesApiException
     * @param $orderId
     * @param $orderLine
     */
    public function testOrderLineCreateException($orderId, $orderLine)
    {
        $client = static::getInsalesApiClient();
        $client->orderLineCreate($orderId, $orderLine);
    }

    /**
     * Test using the method orderLineUpdate to give exception
     *
     * @dataProvider orderLineProviderException
     * @expectedException \SaaS\Exception\InsalesApiException
     * @param $orderId
     * @param $orderLine
     */
    public function testOrderLineUpdateException($orderId, $orderLine)
    {
        $client = static::getInsalesApiClient();
        $client->orderLineUpdate($orderId, $orderLine);
    }

    /**
     * Test using the method orderLineDelete to give exception
     *
     * @dataProvider orderLineProviderException
     * @expectedException \SaaS\Exception\InsalesApiException
     * @param $orderId
     * @param $orderLine
     */
    public function testOrderLineDeleteException($orderId, $orderLine)
    {
        $client = static::getInsalesApiClient();
        $client->orderLineDelete($orderId, $orderLine);
    }

    /**
     * Test using the method orderLineCreate
     *
     * @return array
     */
    public function testOrderLineCreate()
    {
        $client = static::getInsalesApiClient();
        $order = $client->ordersList()->offsetGet(0);
        $product = $client->productsList()->offsetGet(0);

        $orderLines = array(
            array(
                'quantity' => 2,
                'product_id'=> $product['id']
            )
        );

        $response = $client->orderLineCreate($order['id'], $orderLines);
        $order = $response->getResponse();
        $dateCreate = $order['order_changes'][0]['created_at'];

        foreach ($order['order_lines'] as $line) {
            if ($line['product_id'] == $product['id'] && $line['created_at'] == $dateCreate) {
                $createLineId = $line['id'];
            }
        }
        static::checkResponse($response);
        return array(
            'orderId' => $order['id'],
            'orderLineId' => isset($createLineId) ? $createLineId : $order['order_lines'][0]['id']
        );
    }


    /**
     * Test using the method orderLineUpdate
     *
     * @depends testOrderLineCreate
     * @param $ids
     * @return
     */
    public function testOrderLinesUpdate($ids)
    {
        $client = static::getInsalesApiClient();

        $orderLine = array(array(
            'id' => $ids['orderLineId'],
            'quantity' => 1,
            'comment' => 'New comment'
        ));
        $response = $client->orderLineUpdate($ids['orderId'], $orderLine);

        static::checkResponse($response);
        return $ids;
    }

    /**
     * Test using the method orderLineDelete
     *
     * @depends testOrderLinesUpdate
     * @param $ids
     */
    public function testOrderLinesDelete($ids)
    {
        $client = static::getInsalesApiClient();
        $orderLine = array(array(
            'id' => $ids['orderLineId'],
            '_destroy' => true
        ));
        $response = $client->orderLineDelete($ids['orderId'], $orderLine);
        static::checkResponse($response);
    }

}
