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
 * Class ApiOptionTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiOptionTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function optionProviderException()
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
            'not_title' => array(
                1,
                array(
                    'position' => 1
                )
            )
        );
    }

    /**
     * Test using the method optionsList
     */
    public function testOptionsList()
    {
        $client = static::getInsalesApiClient();
        $client->optionsList();
    }

    /**
     * Test using the method optionGet to give exception
     *
     * @dataProvider optionProviderException
     * @expectedException \Exception
     * @param $optionId
     */
    public function testOptionGetException($optionId)
    {
        $client = static::getInsalesApiClient();
        $client->optionGet($optionId);
    }

    /**
     * Test using the method optionCreate to give exception
     *
     * @dataProvider optionProviderException
     * @expectedException \InvalidArgumentException
     * @param $optionId
     * @param $option
     */
    public function testOptionCreateException($optionId, $option)
    {
        $client = static::getInsalesApiClient();
        $client->optionCreate($option);
    }

    /**
     * Test using the method optionUpdate to give exception
     *
     * @dataProvider optionProviderException
     * @expectedException \Exception
     * @param $optionId
     * @param $option
     */
    public function testOptionUpdateException($optionId, $option)
    {
        $client = static::getInsalesApiClient();
        $client->optionUpdate($optionId, $option);
    }

    /**
     * Test using the method optionDelete to give exception
     *
     * @dataProvider optionProviderException
     * @expectedException \Exception
     * @param $optionId
     */
    public function testOptionDeleteException($optionId)
    {
        $client = static::getInsalesApiClient();
        $client->optionDelete($optionId);
    }

    /**
     * Test using the method optionCreate
     *
     * @return mixed
     */
    public function testOptionCreate()
    {
        $client = static::getInsalesApiClient();
        $option = array(
            'title' => 'NewOption1',
        );
        $response = $client->optionCreate($option);
        static::checkResponse($response);
        $data = $response->getResponse();

        return $data['id'];
    }

    /**
     * Test using the method optionDelete
     *
     * @depends testOptionCreate
     * @param $optionId
     */
    public function testOptionDelete($optionId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->optionDelete($optionId);
        static::checkResponse($response);
    }
}
