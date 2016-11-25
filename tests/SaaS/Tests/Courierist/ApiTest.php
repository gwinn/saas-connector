<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Courierist
 * @author   Sergey
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */

namespace src\SaaS\Tests\Courierist;

use SaaS\Test\TestCase;
use SaaS\Http\Response;

/**
 * Class Test
 *
 * @category ApiClient
 * @package  SaaS\Tests\Courierist
 * @author   Sergey
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class ApiTest extends TestCase
{
    /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testConstruct()
    {
        $client = static::getCourieristApiClient();
        $this->assertInstanceOf('SaaS\Service\Courierist\Api', $client);
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testGetToken()
    {
        $client = static::getCourieristApiClient();
        $response = $client->getToken();
        return $response;
        static::checkResponse($response);
    }

   /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testOrderCost()
    {
        $parameters = array('locations' => Array
        (
            Array
                (
                    'address' => 'Новый Арбат 2,Москва',
                    'delivery_date' => '2016-05-11'
                ),
             Array
                (
                    'address' => 'Красная площадь, Москва',
                    'latitude' => '55.822470175511',
                    'longitude' => '37.46910618045',
                    'delivery_date' => '2016-05-12'
                )
        ),

    'shipment' => Array
        (
            Array
                (
                    'weight' => '1',
                    'length' => '10'
                ),
            Array
                (
                    'price' => '100',
                    'weight' => '1',
                    'length' => '10',
                    'value' => '100',
                    'unit' => '2'
                )
        ));
        $token = $this->testGetToken();
        $client = static::getCourieristApiClient();
        $response = $client->orderCost($token, $parameters);

        static::checkResponse($response);
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testOrderCreate()
    {
        $parameters = Array(Array
        (
            'comment' => 'Выполнить быстро!',
            'locations' => Array
                (
                     Array
                        (
                            'address' => 'Новый Арбат 2, Москва',
                            'delivery_date' => '2016-05-11',
                            'delivery_from' => '18:00',
                            'delivery_to' => '20:00',
                            'comment' => 'Test',
                            'external_id' => 'MY14124',
                            'contact' => Array
                                (
                                    'name' => 'офис 1',
                                    'phone' =>'', 
                                    'note' =>'',
                                    'type' => '1'
                                ),
                            'assignments' => Array
                                (
                                     Array
                                        (
                                            'name' => 'test owners patience',
                                            'price' => '1000'
                                        ),

                                     Array
                                        (
                                            'name' => 'praise owners humility',
                                            'type' => '2',
                                            'price' => '1000'
                                        ),
                                )
                        ),
                    Array
                        (
                            'address' => 'Красная площадь, Москва',
                            'latitude' => '55.822470175511',
                            'longitude' => '37.46910618045',
                            'delivery_date' => '2016-05-12',
                            'delivery_from' => '18:00',
                            'delivery_to' => '20:00',
                            'external_id' => '555',
                            'contact' => Array
                                (
                                    'name' => 'Клиент 1',
                                    'phone' => '9995551122',
                                    'note' => 'злой',
                                    'type' => '2'
                                )
                        )
                ),
            'shipment' => Array
                (
                     Array
                        (
                            'weight' => '1',
                            'length' => '10'
                        ),
                     Array
                        (
                            'name' => 'Кирпичи',
                            'article' => 'а111',
                            'price' => '100',
                            'weight' => '1',
                            'length' => '10',
                            'value' => '100',
                            'unit' => '2'
                        ),
                )
        ));
        $token = $this->testGetToken();
        $client = static::getCourieristApiClient();
        $response = $client->orderCreate($token, $parameters);
        $testId = $response['orders'][0]['id'];
        static::checkResponse($response);
        return $testId;
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testOrderStatus()
    {
        $parameters = array('status'=>'30');
        $token = $this->testGetToken();
        $id = $this->testOrderCreate();
        $client = static::getCourieristApiClient();
        $response = $client->orderStatus($token, $id, $parameters);
        static::checkResponse($response);
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testOrder()
    {
        $token = $this->testGetToken();
        $id = $this->testOrderCreate();
        $client = static::getCourieristApiClient();
        $response = $client->order($token, $id);
        static::checkResponse($response);
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     *
     * @return void
     */
    public function testOrdersAll()
    {
        $token = $this->testGetToken();
        $client = static::getCourieristApiClient();
        $response = $client->ordersAll($token);
        static::checkResponse($response);
    }
}