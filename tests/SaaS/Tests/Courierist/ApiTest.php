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
    private $testId;

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
     * Test exception Api client init
     *
     * @group courierist
     *
     * @expectedException \ErrorException
     * @return void
     */
    public function testConstructException()
    {
        static::getCourieristApiClient('aa', 'aa');
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
        $token = $client->getToken();
        $this->assertNotEmpty($token);
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
        $parameters = array(
            'locations' => array(
                array(
                    'address' => 'Новый Арбат 2,Москва',
                    'delivery_date' => '2016-05-11'
                ),
                array(
                    'address' => 'Красная площадь, Москва',
                    'latitude' => '55.822470175511',
                    'longitude' => '37.46910618045',
                    'delivery_date' => '2016-05-12'
                )
            ),
            'shipment' => array(
                array(
                    'weight' => '1',
                    'length' => '10'
                ),
                array(
                    'price' => '100',
                    'weight' => '1',
                    'length' => '10',
                    'value' => '100',
                    'unit' => '2'
                )
            )
        );

        $client = static::getCourieristApiClient();
        $token = $client->getToken();
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
        $parameters = array(
            array(
                'comment' => 'Выполнить быстро!',
                'locations' => array(
                    array(
                        'address' => 'Новый Арбат 2, Москва',
                        'delivery_date' => '2016-05-11',
                        'delivery_from' => '18:00',
                        'delivery_to' => '20:00',
                        'comment' => 'Test',
                        'external_id' => 'MY14124',
                        'contact' => array(
                            'name' => 'офис 1',
                            'phone' =>'',
                            'note' =>'',
                            'type' => '1'
                        ),
                        'assignments' => array(
                            array(
                                'name' => 'test owners patience',
                                'price' => '1000'
                            ),
                            array(
                                'name' => 'praise owners humility',
                                'type' => '2',
                                'price' => '1000'
                            ),
                        )
                    ),
                    array(
                        'address' => 'Красная площадь, Москва',
                        'latitude' => '55.822470175511',
                        'longitude' => '37.46910618045',
                        'delivery_date' => '2016-05-12',
                        'delivery_from' => '18:00',
                        'delivery_to' => '20:00',
                        'external_id' => '555',
                        'contact' => array(
                            'name' => 'Клиент 1',
                            'phone' => '9995551122',
                            'note' => 'злой',
                            'type' => '2'
                        )
                    )
                ),
                'shipment' => array(
                    array(
                        'weight' => '1',
                        'length' => '10'
                    ),
                    array(
                        'name' => 'Кирпичи',
                        'article' => 'а111',
                        'price' => '100',
                        'weight' => '1',
                        'length' => '10',
                        'value' => '100',
                        'unit' => '2'
                    ),
                )
            )
        );

        $client = static::getCourieristApiClient();
        $token = $client->getToken();
        $response = $client->orderCreate($token, $parameters);
        $responseBody = $response->getResponse();
        $this->testId = $responseBody['orders'][0]['id'];
        static::checkResponse($response);
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     * @depends testOrderCreate
     *
     * @return void
     */
    public function testOrderStatus()
    {
        $parameters = array('status'=>'30');
        $client = static::getCourieristApiClient();
        $token = $client->getToken();
        $response = $client->orderStatus($token, $this->testId, $parameters);
        static::checkResponse($response);
    }

    /**
     * Test successfull Api client init
     *
     * @group courierist
     * @depends testOrderCreate
     *
     * @return void
     */
    public function testOrder()
    {
        $client = static::getCourieristApiClient();
        $token = $client->getToken();
        $response = $client->order($token, $this->testId);
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
        $client = static::getCourieristApiClient();
        $token = $client->getToken();
        $response = $client->ordersAll($token);
        static::checkResponse($response);
    }
}
