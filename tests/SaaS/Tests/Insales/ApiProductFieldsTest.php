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
 * Class ApiProductFieldsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiProductFieldsTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function productFieldProviderException()
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
            'empty_type' => array(
                'qwerty',
                array(
                    'title' => 'New title',
                    'handle' => 123
                )
            ),
            'empty_handle' => array(
                'qwerty',
                array(
                    'title' => 'New title',
                    'type' => 'type'
                )
            ),
        );
    }

    /**
     * Test using the method productFieldsList
     */
    public function testProductFieldsList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->productFieldsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method productFieldGet to give exception
     *
     * @dataProvider productFieldProviderException
     * @expectedException \Exception
     * @param $fieldId
     */
    public function testProductFieldGetException($fieldId)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldGet($fieldId);
    }

    /**
     * Test using the method productFieldCreate to give exception
     *
     * @dataProvider productFieldProviderException
     * @expectedException \Exception
     * @param $fieldId
     * @param $productField
     */
    public function testProductFieldCreateException($fieldId, $productField)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldCreate($productField);
    }

    /**
     * Test using the method productFieldUpdate to give exception
     *
     * @dataProvider productFieldProviderException
     * @expectedException \Exception
     * @param $fieldId
     * @param $productField
     */
    public function testProductFieldUpdateException($fieldId, $productField)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldUpdate($fieldId, $productField);
    }

    /**
     * Test using the method productFieldDelete to give exception
     *
     * @dataProvider productFieldProviderException
     * @expectedException \Exception
     * @param $fieldId
     */
    public function testProductFieldDeleteException($fieldId)
    {
        $client = static::getInsalesApiClient();
        $client->productFieldDelete($fieldId);
    }

    /**
     * Test using the method productFieldCreate
     *
     * @return mixed
     */
    public function testProductFieldCreate()
    {
        $field = array(
            'title' => 'New Product Field',
            'handle' => 'productField',
            'type' => "ProductField::TextArea"
        );

        $client = static::getInsalesApiClient();
        $response = $client->productFieldCreate($field);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method productFieldDelete
     *
     * @depends testProductFieldCreate
     * @param $productFieldId
     */
    public function testProductFieldDelete($productFieldId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->productFieldDelete($productFieldId);
        static::checkResponse($response);
    }
}
