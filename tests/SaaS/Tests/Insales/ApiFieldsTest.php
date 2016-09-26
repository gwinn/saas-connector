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
 * Class ApiFieldsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiFieldsTest extends TestCase
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
            'empty_field' => array(
                123,
                array()
            ),
            'type_not_found' => array(
                123,
                array(
                    'destiny' => 1
                )
            ),
            'office_title_not_found' => array(
                123,
                array(
                    'type' => 'Field::TextField'
                )
            ),
            'destiny_not_found' => array(
                123,
                array(
                    'type' => 'Field::TextField',
                    'office_title' => 'Title New Field'
                )
            ),
            'data' => array(
                123,
                array(
                    'destiny' => 1,
                    'type' => 'Field::TextField',
                    'office_title' => 'Title New Field'
                )
            ),
        );
    }

    /**
     * Test using the method fieldsList
     */
    public function testFieldsList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->fieldsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method fieldGet to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $fieldId
     */
    public function testFieldGetException($fieldId)
    {
        $client = static::getInsalesApiClient();
        $client->fieldGet($fieldId);
    }

    /**
     * Test using the method fieldCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $fieldId
     */
    public function testFieldCreateException($fieldId, $field)
    {
        $client = static::getInsalesApiClient();
        $client->fieldCreate($field);
    }

    /**
     * Test using the method fieldUpdate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $fieldId
     */
    public function testFieldUpdateException($fieldId, $field)
    {
        $client = static::getInsalesApiClient();
        $client->fieldUpdate($fieldId, $field);
    }

    /**
     * Test using the method fieldDelete to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $fieldId
     */
    public function testFieldDeleteException($fieldId)
    {
        $client = static::getInsalesApiClient();
        $client->fieldDelete($fieldId);
    }

    /**
     * Test using the method fieldCreate
     * Insufficient permissions for operation
     *
     * @return mixed
     */
    public function fieldCreate()
    {
        $client = static::getInsalesApiClient();
        $field = array(
            'type' => 'Field::TextField',
            'office_title' => 'New Field',
            'destiny' => 1
        );
        $response = $client->fieldCreate($field);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method fieldUpdate
     * Insufficient permissions for operation
     *
     * @depends testFieldCreate
     * @param $fieldId
     * @return mixed
     */
    public function fieldUpdate($fieldId)
    {
        $client = static::getInsalesApiClient();
        $field = array(
            'title' => 'New New Field',
        );
        $response = $client->fieldUpdate($fieldId, $field);
        static::checkResponse($response);

        return $fieldId;
    }

    /**
     * Test using the method fieldDelete
     * Insufficient permissions for operation
     *
     * @depends testFieldUpdate
     * @param $fieldId
     */
    public function fieldDelete($fieldId)
    {
        $client = static::getInsalesApiClient();

        $response = $client->fieldDelete($fieldId);
        static::checkResponse($response);
    }
}
