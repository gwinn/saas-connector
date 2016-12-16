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
 * Class ApiCollectionsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiCollectionsTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function collectionProviderException()
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
            'empty_parent_id' => array(
                'qwerty',
                array(
                    'sort-type' => 0,
                    'title' => 'New title'
                )
            ),
            'empty_position' => array(
                'qwerty',
                array(
                    'title' => 'New title',
                    'parent_id' => 123
                )
            ),
            'no_valid' => array(
                'qwerty',
                array(
                    'title' => 'New title',
                    'parent_id' => 123,
                    'position' => 1
                )
            ),
        );
    }

    /**
     * Test using the method collectionsList
     */
    public function testCollectionsList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->collectionsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method collectionGet to give exception
     *
     * @dataProvider collectionProviderException
     * @expectedException \InvalidArgumentException
     * @param $collectionId
     */
    public function testCollectionGetException($collectionId)
    {
        $client = static::getInsalesApiClient();
        $client->collectionGet($collectionId);
    }

    /**
     * Test using the method collectionCreate to give exception
     *
     * @dataProvider collectionProviderException
     * @expectedException \InvalidArgumentException
     * @param $collectionId
     * @param $collection
     */
    public function testCollectionCreateException($collectionId, $collection)
    {
        $client = static::getInsalesApiClient();
        $client->collectionCreate($collection);
    }

    /**
     * Test using the method collectionUpdate to give exception
     *
     * @dataProvider collectionProviderException
     * @expectedException \InvalidArgumentException
     * @param $collectionId
     * @param $collection
     */
    public function testCollectionUpdateException($collectionId, $collection)
    {
        $client = static::getInsalesApiClient();
        $client->collectionUpdate($collectionId, $collection);
    }

    /**
     * Test using the method collectionDelete to give exception
     *
     * @dataProvider collectionProviderException
     * @expectedException \InvalidArgumentException
     * @param $collectionId
     */
    public function testCollectionDeleteException($collectionId)
    {
        $client = static::getInsalesApiClient();
        $client->collectionDelete($collectionId);
    }

    /**
     * Test using the method collectionCreate
     * @return mixed
     */
    public function testCollectionCreate()
    {
        $client = static::getInsalesApiClient();
        $data = $client->collectionsList()->offsetGet(0);

        $collection = array(
            'title' => 'New Title Collection',
            'parent_id' => $data['id'],
            'position' => 1
        );

        $response = $client->collectionCreate($collection);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method collectionDelete
     *
     * @depends testCollectionCreate
     * @param $collectionId
     */
    public function testCollectionDelete($collectionId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->collectionDelete($collectionId);
        static::checkResponse($response);
    }
}
