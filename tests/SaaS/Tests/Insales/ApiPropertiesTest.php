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
 * Class ApiPropertiesTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiPropertiesTest extends TestCase
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
            'title_not_found' => array(
                123,
                array(
                    'position'=> 1
                )
            ),
        );
    }

    /**
     * Test using the method propertiesList
     */
    public function testPropertiesList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->propertiesList();
        static::checkResponse($response);
    }

    /**
     * Test using the method propertyGet to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $propertyId
     */
    public function testPropertyGetException($propertyId)
    {
        $client = static::getInsalesApiClient();
        $client->propertyGet($propertyId);
    }

    /**
     * Test using the method propertyCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $propertyId
     * @param $property
     */
    public function testPropertyCreateException($propertyId, $property)
    {
        $client = static::getInsalesApiClient();
        $client->propertyCreate($property);
    }

    /**
     * Test using the method propertyUpdate to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $propertyId
     * @param $property
     */
    public function testPropertyUpdateException($propertyId, $property)
    {
        $client = static::getInsalesApiClient();
        $client->propertyUpdate($propertyId, $property);
    }

    /**
     * Test using the method propertyDelete to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $propertyId
     */
    public function testPropertyDeleteException($propertyId)
    {
        $client = static::getInsalesApiClient();
        $client->propertyDelete($propertyId);
    }

    /**
     * Test using the method propertyCreate
     *
     * @return mixed
     */
    public function testPropertyCreate()
    {
        $client = static::getInsalesApiClient();
        $property = array(
            'title' => 'New Property'
        );

        $response = $client->propertyCreate($property);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method propertyUpdate
     *
     * @depends testPropertyCreate
     * @param $propertyId
     * @return mixed
     */
    public function testPropertyUpdate($propertyId)
    {
        $client = static::getInsalesApiClient();
        $property = array(
            'title' => 'New New Property'
        );

        $response = $client->propertyUpdate($propertyId, $property);
        static::checkResponse($response);

        return $propertyId;
    }

    /**
     * Test using the method propertyDelete
     *
     * @depends testPropertyUpdate
     * @param $propertyId
     */
    public function testPropertyDelete($propertyId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->propertyDelete($propertyId);
        static::checkResponse($response);
    }
}
