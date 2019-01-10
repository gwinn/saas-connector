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
 * Class ApiCustomStatusesTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiCustomStatusesTest extends TestCase
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
                array()
            ),
            'not_found_title' => array(
                array(
                    'system_status' => 'new'
                )
            )
        );
    }

    /**
     * Test using the method customStatusesList
     */
    public function testCustomStatusesList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->customStatusesList();
        static::checkResponse($response);
    }

    /**
     * Test using the method customStatusGet to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testCustomStatusGetException()
    {
        $client = static::getInsalesApiClient();
        $client->customStatusGet(null);
    }

    /**
     * Test using the method customStatusGet to give exception
     */
    public function testCustomStatusGet()
    {
        $client = static::getInsalesApiClient();
        $response = $client->customStatusGet('net-v-nalichii');
        static::checkResponse($response);
    }

    /**
     * Test using the method customStatusCreate to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $status
     */
    public function testCustomStatusCreateException($status)
    {
        $client = static::getInsalesApiClient();
        $client->customStatusCreate($status);
    }

    /**
     * Test using the method customStatusUpdate to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     * @dataProvider providerException
     * @param $status
     */
    public function testCustomStatusUpdateException($status)
    {
        $client = static::getInsalesApiClient();
        $client->customStatusUpdate(null, $status);
    }

    /**
     * Test using the method customStatusDelete to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testCustomStatusDeleteException()
    {
        $client = static::getInsalesApiClient();
        $client->customStatusDelete(null);
    }

    /**
     * Test using the method customStatusCreate
     *
     * @return mixed
     */
    public function testCustomStatusCreate()
    {
        $client = static::getInsalesApiClient();
        $status = array(
            'system_status' => 'new',
            'title' => 'My New Custom Status'
        );
        $response = $client->customStatusCreate($status);
        static::checkResponse($response);

        return $response->offsetGet('permalink');
    }

    /**
     * Test using the method customStatusUpdate
     *
     * @depends testCustomStatusCreate
     * @param $statusPermalink
     * @return mixed
     */
    public function testCustomStatusUpdate($statusPermalink)
    {
        $client = static::getInsalesApiClient();
        $status = array(
            'title' => 'My New New Custom Status'
        );
        $response = $client->customStatusUpdate($statusPermalink, $status);
        static::checkResponse($response);

       return $statusPermalink;
    }

    /**
     * Test using the method customStatusDelete
     *
     * @depends testCustomStatusCreate
     * @param $statusPermalink
     * @return mixed
     */
    public function testCustomStatusDelete($statusPermalink)
    {
        $client = static::getInsalesApiClient();
        $response = $client->customStatusDelete($statusPermalink);
        static::checkResponse($response);
    }
}
