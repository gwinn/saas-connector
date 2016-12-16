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
 * Class ApiOptionValueTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiOptionValueTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function optionValueProviderException()
    {
        return array(
            'empty_data' => array(
                null,
                null,
                array()
            ),
            'empty_option_value_id' => array(
                123,
                null,
                array()
            ),
            'not_found' => array(
                123,
                321,
                array()
            ),
        );
    }

    /**
     * Test using the method optionValuesList
     */
    public function testOptionValuesList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->optionValuesList();
        static::checkResponse($response);
    }

    /**
     * Test using the method optionValuesGet to give exception
     *
     * @dataProvider optionValueProviderException
     * @expectedException \InvalidArgumentException
     * @param $optionId
     * @param $optionValueId
     */
    public function testOptionValueGetException($optionId, $optionValueId)
    {
        $client = static::getInsalesApiClient();
        $client->optionValuesGet($optionId, $optionValueId);
    }

    /**
     * Test using the method optionValueCreate to give exception
     *
     * @dataProvider optionValueProviderException
     * @expectedException \InvalidArgumentException
     * @param $optionId
     * @param $optionValueId
     * @param $option
     */
    public function testOptionValueCreateException($optionId, $optionValueId, $option)
    {
        $client = static::getInsalesApiClient();
        $client->optionValueCreate($optionId, $option);
    }

    /**
     * Test using the method optionValueUpdate to give exception
     *
     * @dataProvider optionValueProviderException
     * @expectedException \InvalidArgumentException
     * @param $optionId
     * @param $optionValueId
     * @param $option
     */
    public function testOptionValueUpdateException($optionId, $optionValueId, $option)
    {
        $client = static::getInsalesApiClient();
        $client->optionValueUpdate($optionId, $optionValueId, $option);
    }

    /**
     * Test using the method optionValueDelete to give exception
     *
     * @dataProvider optionValueProviderException
     * @expectedException \InvalidArgumentException
     * @param $optionId
     * @param $optionValueId
     * @param $option
     */
    public function testOptionValueDeleteException($optionId, $optionValueId, $option)
    {
        $client = static::getInsalesApiClient();
        $client->optionValueDelete($optionId, $optionValueId);
    }

    /**
     * Test using the method optionValueCreate
     *
     * @return array
     */
    public function testOptionValueCreate()
    {
        $client = static::getInsalesApiClient();
        $values = array(
            'title' => 'New Option Value'
        );
        $list = $client->optionsList()->getResponse();

        $response = $client->optionValueCreate($list[0]['id'], $values);
        static::checkResponse($response);

        return array(
            'optionId' => $list[0]['id'],
            'optionValueId' => $response->offsetGet('id')
        );
    }

    /**
     * Test using the method optionValueDelete
     *
     * @depends testOptionValueCreate
     * @param $ids
     */
    public function testOptionValueDelete($ids)
    {
        $client = static::getInsalesApiClient();
        $response = $client->optionValueDelete($ids['optionId'], $ids['optionValueId']);
        static::checkResponse($response);
    }
}
