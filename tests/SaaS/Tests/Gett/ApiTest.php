<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package SaaS\Tests\Gett
 * @author Vasyagin Sergey <vasyagin@intaro.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */

namespace src\SaaS\Tests\Gett;

use SaaS\Test\TestCase;

/**
 * Class Test
 *
 * @category ApiClient
 * @package SaaS\Tests\Gett
 * @author Vasyagin Sergey <vasyagin@intaro.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class ApiTest extends TestCase
{
    /**
     * @var \SaaS\Service\Gett\Api Api client instance
     */
    protected static $client;

    /**
     * Test successfull Api client init
     *
     * @group gett
     */
    public function testConstruct()
    {
        $client = self::getClient();
        $this->assertInstanceOf('SaaS\Service\Gett\Api', $client);
    }

    /**
     * Test exception Api client init
     *
     * @group gett
     *
     * @expectedException \InvalidArgumentException
     */
    public function testConstructException()
    {
        static::getGettApiClient('test', 'test');
    }

    /**
     * Test successfull Api client init
     *
     * @group gett
     */
    public function testGetToken()
    {
        $client = self::getClient();
        $this->assertNotEmpty($client->getToken());
    }

    /**
     * Test successfull get products method
     *
     * @group gett
     */
    public function testGetProducts()
    {
        $client = self::getClient();
        $parameters = array(
            'latitude' => 55.720631,
            'longitude' => 37.633305,
        );
        $response = $client->getProducts($parameters);
        static::checkResponse($response);
    }

    /**
     * Test successfull get product method
     *
     * @group gett
     */
    public function testGetProduct()
    {
        $client = self::getClient();
        $response = $client->getProduct('b400058a-3cf7-4e8d-a89c-1db328e4654e');
        static::checkResponse($response);
    }

    /**
     * Test successfull get eta method
     *
     * @group eta
     */
    public function testGetEta()
    {
        $client = self::getClient();
        $parameters = array(
            'latitude' => 55.720631,
            'longitude' => 37.633305,
        );
        $response = $client->getEta($parameters);
        static::checkResponse($response);
    }

    /**
     * Test successfull get price estimate method
     *
     * @group estimate
     */
    public function testGetPriceEstimate()
    {
        $client = self::getClient();
        $parameters = array(
            'latitude' => 55.720631,
            'longitude' => 37.633305,
            'destination_latitude' => 55.792883,
            'destination_longitude' => 37.484560,
        );
        $response = $client->getPriceEstimate($parameters);
        static::checkResponse($response);
    }

    /**
     * Test successfull get price estimate method
     *
     * @group create-ride
     */
    public function testCreateRide()
    {
        $client = self::getClient();
        $parameters = array(
            'product_id' => 'b400058a-3cf7-4e8d-a89c-1db328e4654e',
            'rider' => array(
                'name' => 'Test Testovich',
                'phone_number' => '89022222222',
            ),
            'pickup' => array(
                'latitude' => 55.720631,
                'longitude' => 37.633305,
            ),
            'destination' => array(
                'latitude' => 55.792883,
                'longitude' => 37.484560,
            ),
        );
        $response = $client->createRide($parameters);
        static::checkResponse($response);
    }

    /**
     * Test successfull get ride details method
     *
     * @group gett
     */
    public function testGetRide()
    {
        $client = self::getClient();
        $response = $client->getRide('b9f86ebf-34eb-4479-9a3e-0665255d8691');
        static::checkResponse($response);
    }

    /**
     * Gets client instance
     *
     * @return \SaaS\Service\Gett\Api
     */
    protected static function getClient()
    {
        if (is_null(self::$client)) {
            self::$client = static::getGettApiClient();
        }

        return self::$client;
    }
}
