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
 * Class ApiOrdersTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiOrdersTest extends TestCase
{
    /**
     * Provider filter for exception tests CRUD
     *
     * @return array
     */
    public function orderFilterProviderException()
    {
        return array(
            'no_valid_status' => array(
                array(
                    'status' => 'new'
                )
            ),
        );
    }

    /**
     * Provider order for exception tests CRUD
     *
     * @return array
     */
    public function orderProviderException()
    {
        return array(
            'empty_data' => array(
                null,
                array()
            ),
            'order_not_found' => array(
                123,
                array()
            ),
            'order_line_not_found' => array(
                123,
                array(
                    'client' => array(),
                    'payment_gateway_id' => 123,
                    'order_lines_attributes' => array(
                        array(
                            'quantity' => 0,
                            'variant_id' => 0
                        ),
                        array(
                            'quantity' => 0,
                            'product_id' => 0,
                            'variant_id' => 0
                        ),
                        array(
                            'product_id' => 0,
                            'variant_id' => 0
                        ),
                        array(
                            'quantity' => 0,
                            'product_id' => 0,
                        ),
                        array(
                            'variant_id' => 0
                        ),
                        array(
                            'product_id' => 0,
                        ),
                        array(
                            'quantity' => 0,
                        )
                    ),
                )
            ),
        );
    }

    /**
     * Test using the method ordersCount to give exception
     *
     * @dataProvider orderFilterProviderException
     * @expectedException \InvalidArgumentException
     * @param $filter
     */
    public function testOrdersCountException($filter)
    {
        $client = static::getInsalesApiClient();
        $client->ordersCount($filter);
    }

    /**
     * Test using the method ordersCount
     */
    public function testOrdersCount()
    {
        $client = static::getInsalesApiClient();
        $response = $client->ordersCount();
        static::checkResponse($response);
    }

    /**
     * Test using the method ordersList to give exception
     *
     * @dataProvider orderFilterProviderException
     * @expectedException \InvalidArgumentException
     * @param $filter
     */
    public function testOrdersListException($filter)
    {
        $client = static::getInsalesApiClient();
        $client->ordersList($filter);
    }

    /**
     * Test using the method ordersList
     */
    public function testOrdersList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->ordersList();
        static::checkResponse($response);
    }

    /**
     * Test using the method orderGet to give exception
     *
     * @dataProvider orderProviderException
     * @expectedException \InvalidArgumentException
     * @param $orderId
     */
    public function testOrderGetException($orderId)
    {
        $client = static::getInsalesApiClient();
        $client->orderGet($orderId);
    }

    /**
     * Test using the method orderCreate to give exception
     *
     * @dataProvider orderProviderException
     * @expectedException \InvalidArgumentException
     */
    public function testOrderCreateException($orderId, $order)
    {
        $client = static::getInsalesApiClient();
        $client->orderCreate($order);
    }

    /**
     * Test using the method orderUpdate to give exception
     *
     * @dataProvider orderProviderException
     * @expectedException \InvalidArgumentException
     * @param $orderId
     * @param $order
     */
    public function testOrderUpdateException($orderId, $order)
    {
        $client = static::getInsalesApiClient();
        $client->orderUpdate($orderId, $order);
    }

    /**
     * Test using the method orderDelete to give exception
     *
     * @dataProvider orderProviderException
     * @expectedException \InvalidArgumentException
     * @param $orderId
     */
    public function testOrderDeleteException($orderId)
    {
        $client = static::getInsalesApiClient();
        $client->orderDelete($orderId);
    }

    /**
     * Test using the method orderCreate
     *
     * @return mixed
     */
    public function testOrderCreate()
    {
        $client = static::getInsalesApiClient();

        $product = $client->productsList()->offsetGet(0);
        $customer = $client->clientsList()->offsetGet(0);
        $delivery = $client->deliveryVariantsList()->offsetGet(0);
        $payment = $client->paymentGatewaysList()->offsetGet(0);

        $order = array(
            'order_lines_attributes' => array(
                array(
                    'quantity' => 2,
                    'product_id' => $product['id']
                )
            ),
            'client' => array(
                'id' => $customer['id'],
                'name' => $customer['name'],
                'phone' => $customer['phone']
            ),
            'shipping_address_attributes' => array(
                'address' => 'address',
                'name' => $customer['name']
            ),
            'delivery_variant_id' => $delivery['id'],
            'payment_gateway_id' => $payment['id']

        );
        $response = $client->orderCreate($order);

        static::checkResponse($response);
        return $response->offsetGet('id');
    }

    /**
     * Test using the method orderDelete
     *
     * @depends testOrderCreate
     * @param $orderId
     */
    public function testOrderDelete($orderId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->orderDelete($orderId);
        static::checkResponse($response);
    }

}
