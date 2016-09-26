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
 * Class ApiCollectsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiCollectsTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function collectProviderException()
    {
        return array(
            'empty_data' => array(
                array(
                    'product_id' => null,
                    'collection_id' => null
                ),
                array()
            ),
            'not_found_product' => array(
                array(
                    'product_id' => 123,
                    'collection_id' => null
                ),
                array(
                    'collection_id' => 123,
                )
            ),
            'not_found_collection' => array(
                array(
                    'product_id' => null,
                    'collection_id' => 123
                ),
                array(
                    'position' => 1
                )
            ),
            'empty_collect' => array(
                array(
                    'product_id' => null,
                    'collection_id' => 123
                ),
                array()
            ),
        );
    }

    /**
     * Test using the method collectsList
     */
    public function testCollectsList()
    {
        $client = static::getInsalesApiClient();
        $client->collectsList();
    }

    /**
     * Test using the method collectsGet to give exception
     *
     * @dataProvider collectProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     */
    public function testCollectGetException($ids)
    {
        $client = static::getInsalesApiClient();
        $client->collectsGet($ids['product_id'], $ids['collection_id']);
    }

    /**
     * Test using the method collectCreate to give exception
     *
     * @dataProvider collectProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     */
    public function testCollectCreateException($ids)
    {
        $client = static::getInsalesApiClient();
        $client->collectCreate($ids);
    }

    /**
     * Test using the method collectsUpdate to give exception
     *
     * @dataProvider collectProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     * @param $collect
     */
    public function testCollectUpdateException($ids, $collect)
    {
        $client = static::getInsalesApiClient();
        $client->collectsUpdate($ids['collection_id'], $collect);
    }

    /**
     * Test using the method collectDelete to give exception
     *
     * @dataProvider collectProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     */
    public function testCollectDeleteException($ids)
    {
        $client = static::getInsalesApiClient();
        $client->collectDelete($ids['collection_id']);
    }

    /**
     * Test using the method collectCreate
     *
     * @return mixed
     */
    public function testCollectCreate()
    {
        $client = static::getInsalesApiClient();
        $productList = $client->productsList()->offsetGet(0);
        $collectionList = $client->collectionsList()->offsetGet(0);

        $collect = array(
            'product_id' => $productList['id'],
            'collection_id' => $collectionList['id']
        );

        $response = $client->collectCreate($collect);

        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method collectDelete
     *
     * @depends testCollectCreate
     * @param $collectId
     */
    public function testCollectDelete($collectId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->collectDelete($collectId);
        static::checkResponse($response);
    }
}
