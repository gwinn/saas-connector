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
 * Class ApiProductFieldValueTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiProductFieldValueTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function productFieldValueProviderException()
    {
        return array(
            'empty_data' => array(
                null,
                null,
                array()
            ),
            'not_found' => array(
                123,
                null,
                array()
            ),
            'empty_type' => array(
                'qwerty',
                'qwerty',
                array(
                    'title' => 'New title',
                    'handle' => 123
                )
            ),
            'empty_handle' => array(
                'qwerty',
                321,
                array(
                    'title' => 'New title',
                    'type' => 'type'
                )
            ),
        );
    }

    /**
     * Test using the method productFieldValuesList
     *
     * @return mixed
     */
    public function testProductFieldValuesList()
    {
        $client = static::getInsalesApiClient();
        $data = $client->productsList()->getResponse();
        $response = $client->productFieldValuesList($data[0]['id']);

        static::checkResponse($response);
        return $data[0]['id'];
    }

    /**
     * Test using the method productFieldValuesList to give exception
     *
     * @dataProvider productFieldValueProviderException
     * @expectedException \Exception
     * @param $productId
     */
    public function testProductFieldValuesListException($productId)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldValuesList($productId);
    }

    /**
     * Test using the method productFieldValuesGet to give exception
     *
     * @dataProvider productFieldValueProviderException
     * @expectedException \Exception
     * @param $productId
     * @param $fieldId
     */
    public function testProductFieldValuesGetException($productId, $fieldId)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldValuesGet($productId, $fieldId);
    }

    /**
     * Test using the method productFieldValuesCreate to give exception
     *
     * @dataProvider productFieldValueProviderException
     * @expectedException \Exception
     * @param $productId
     * @param $fieldId
     */
    public function testProductFieldValuesCreateException($productId, $fieldId, $value)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldValuesCreate($productId, $value);
    }

    /**
     * Test using the method productFieldValuesUpdate to give exception
     *
     * @dataProvider productFieldValueProviderException
     * @expectedException \Exception
     * @param $productId
     * @param $fieldId
     * @param $value
     */
    public function testProductFieldValuesUpdateException($productId, $fieldId, $value)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldValuesUpdate($productId, $fieldId, $value);
    }

    /**
     * Test using the method productFieldValuesDelete to give exception
     *
     * @dataProvider productFieldValueProviderException
     * @expectedException \Exception
     * @param $productId
     * @param $fieldId
     */
    public function testProductFieldValuesDeleteException($productId, $fieldId)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldValuesDelete($productId, $fieldId);
    }

    /**
     * Test using the method productFieldValuesCreate
     *
     * @depends testProductFieldValuesList
     * @param $productId
     * @return array
     */
    public function testProductFieldValuesCreate($productId)
    {
        $client = static::getInsalesApiClient();
        $list = $client->productFieldsList()->getResponse();
        $value = array(
            'product_field_id' => $list[0]['id'],
            'value' => 'new value'
        );

        $response = $client->productFieldValuesCreate($productId, $value);

        static::checkResponse($response);

        return array(
            'productId' => $productId,
            'fieldValueId' => $response->offsetGet('id')
        );
    }

    /**
     * Test using the method productFieldValuesDelete
     *
     * @depends testProductFieldValuesCreate
     * @param $ids
     */
    public function testProductFieldValuesDelete($ids)
    {
        $client = static::getInsalesApiClient();
        $response = $client->productFieldValuesDelete($ids['productId'], $ids['fieldValueId']);
        static::checkResponse($response);
    }
}
