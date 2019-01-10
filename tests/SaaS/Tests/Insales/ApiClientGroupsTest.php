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
 * Class ApiClientGroupsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiClientGroupsTest extends TestCase
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
                array()
            ),
            'not_found' => array(
                123,
                array()
            ),
        );
    }

    /**
     * Test using the method clientGroupsList
     */
    public function testClientGroupsList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->clientGroupsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method clientGroupGet to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $clientGroupId
     */
    public function testClientGroupGetException($clientGroupId)
    {
        $client = static::getInsalesApiClient();
        $client->clientGroupGet($clientGroupId);
    }

    /**
     * Test using the method clientGroupUpdate to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $clientGroupId
     * @param $clientGroup
     */
    public function testClientGroupUpdateException($clientGroupId, $clientGroup)
    {
        $client = static::getInsalesApiClient();
        $client->clientGroupUpdate($clientGroupId, $clientGroup);
    }

    /**
     * Test using the method clientGroupDelete to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $clientGroupId
     */
    public function testClientGroupDeleteException($clientGroupId)
    {
        $client = static::getInsalesApiClient();
        $client->clientGroupDelete($clientGroupId);
    }

    /**
     * Test using the method clientGroupCreate
     *
     * @return mixed
     */
    public function testClientGroupCreate()
    {
        $client = static::getInsalesApiClient();
        $clientGroup = array(
            'title' => 'New title',
            'discount' => 50,

         );

        $response = $client->clientGroupCreate($clientGroup);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method clientGroupUpdate
     *
     * @depends testClientGroupCreate
     * @param $clientGroupId
     * @return mixed
     */
    public function testClientGroupUpdate($clientGroupId)
    {
        $client = static::getInsalesApiClient();
        $clientGroup = array(
            'title' => 'New New title',
            'discount' => 60,

        );

        $response = $client->clientGroupUpdate($clientGroupId, $clientGroup);
        static::checkResponse($response);

        return $clientGroupId;
    }

    /**
     * Test using the method clientGroupDelete
     *
     * @depends testClientGroupUpdate
     * @param $clientGroupId
     */
    public function testClientGroupDelete($clientGroupId)
    {
        $client = static::getInsalesApiClient();

        $response = $client->clientGroupDelete($clientGroupId);
        static::checkResponse($response);
    }
}
