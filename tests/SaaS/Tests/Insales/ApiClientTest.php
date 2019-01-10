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
 * Class ApiClientTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiClientTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function clientProviderException()
    {
        return array(
            'empty_data' => array(
                null,
                array()
            ),
            'customer_not_found' => array(
                123,
                array()
            ),
            'customer_type_juridical' => array(
                123,
                array(
                    'name' => 'RetailCrm',
                    'type' => 'Client::Juridical',
                    'email' => 'email@email.ru'
                )
            ),
            'customer_type_individual' => array(
                123,
                array(
                    'name' => 'RetailCrm',
                    'email' => 'email@email.ru',
                    'surname' => 'surname'
                )
            ),
            'customer_type_individual1' => array(
                123,
                array(
                    'name' => 'RetailCrm',
                    'email' => 'email@email.ru',
                    'surname' => 'surname'
                )
            ),
        );
    }

    /**
     * Test using the method clientsList
     */
    public function testClientList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->clientsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method clientGet to give exception
     *
     * @dataProvider clientProviderException
     * @expectedException \Exception
     * @param $customerId
     */
    public function testClientGetException($customerId)
    {
        $client = static::getInsalesApiClient();
        $client->clientGet($customerId);
    }

    /**
     * Test using the method clientCreate to give exception
     *
     * @dataProvider clientProviderException
     * @expectedException \InvalidArgumentException
     * @param $customerId
     * @param $customer
     */
    public function testClientCreateException($customerId, $customer)
    {
        $client = static::getInsalesApiClient();
        $client->clientCreate($customer);
    }

    /**
     * Test using the method clientDelete to give exception
     *
     * @dataProvider clientProviderException
     * @expectedException \Exception
     * @param $customerId
     */
    public function testClientDeleteException($customerId)
    {
        $client = static::getInsalesApiClient();
        $client->clientDelete($customerId);
    }

    /**
     * Test using the method clientCreate
     *
     * @return mixed
     */
    public function testClientCreate()
    {
        $client = static::getInsalesApiClient();
        $customer = array(
            'name' => 'RetailCrm',
            'email' => 'email@email.ru',
            'surname' => 'surname',
            'middlename' => 'middlename',
            'phone' => '+7(111)111-11-11'
        );

        $response = $client->clientCreate($customer);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method clientDelete
     *
     * @depends testClientCreate
     * @param $customerId
     */
    public function testClientDelete($customerId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->clientDelete($customerId);
        static::checkResponse($response);
    }
}
