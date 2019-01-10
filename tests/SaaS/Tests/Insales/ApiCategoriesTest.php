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
 * Class ApiBonusSystemTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiCategoriesTest extends TestCase
{
    const TITLE = 'Новая категория';

    /**
     * Test using the method categoriesList
     *
     * @return int|null
     */
    public function testCategoriesList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->categoriesList();
        static::checkResponse($response);

        $return = $response->getResponse();
        $parentId = isset($return[0]) ? $return[0]['parent_id'] : null;
        return $parentId;
    }

    /**
     * Test using the method categoryGet to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testCategoriesGetException()
    {
        $client = static::getInsalesApiClient();
        $client->categoryGet(null);
    }

    /**
     * Test using the method categoryGet to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testCategoriesGetNotFound()
    {
        $client = static::getInsalesApiClient();
        $client->categoryGet(123);
    }

    /**
     * Test using the method categoryDelete to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     *
     */
    public function testCategoriesDeleteException()
    {
        $client = static::getInsalesApiClient();
        $client->categoryDelete(null);
    }

    /**
     * Test using the method categoryCreate
     *
     * @depends testCategoriesList
     * @param $parentId
     *
     * @return mixed
     */
    public function testCategoriesCreate($parentId)
    {
        $client = static::getInsalesApiClient();
        $category = array(
            'parent_id' => $parentId,
            'title' => self::TITLE,
            'position' => 4
        );

        $response = $client->categoryCreate($category);
        static::checkResponse($response);
        $return = $response->getResponse();
        return $return['id'];
    }

    /**
     * Test using the method categoryUpdate
     *
     * @depends testCategoriesCreate
     * @param $createCategoriesId
     *
     * @return mixed
     */
    public function testCategoriesUpdate($createCategoriesId)
    {
        $client = static::getInsalesApiClient();
        $category = array(
            'id' => $createCategoriesId,
            'title' => self::TITLE . date('Y-m-d H:i:s')
        );
        $response = $client->categoryUpdate($createCategoriesId, $category);
        static::checkResponse($response);

        return $createCategoriesId;
    }

    /**
     * Test using the method categoryDelete
     *
     * @param $createCategoriesId
     * @depends testCategoriesUpdate
     */
    public function testCategotyDelete($createCategoriesId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->categoryDelete($createCategoriesId);
        static::checkResponse($response);
    }

    /**
     * Test using the method categoryCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testCategoryCreateFailed()
    {
        $client = static::getInsalesApiClient();
        $category = array(
            'parent_id' => 123,
            'title' => self::TITLE,
            'position' => 'string'
        );

        $client->categoryCreate($category);
    }

    /**
     * Test using the method categoryUpdate to give exception
     *
     * @group categoties
     * @expectedException \InvalidArgumentException
     */
    public function testCategoryUpdateFailed()
    {
        $client = static::getInsalesApiClient();
        $category = array(
            'id' => 123,
            'parent_id' => 123,
            'title' => self::TITLE,
            'position' => 'string'
        );

        $client->categoryUpdate(123, $category);
    }

    /**
     * Test using the method categoryCreate to give exception
     *
     * @group categoties
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testCategoryCreateEmpty()
    {
        $client = static::getInsalesApiClient();
        $client->categoryCreate(array());
    }

    /**
     * Test using the method categoryUpdate to give exception
     *
     * @group categoties
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testCategoryUpdateEmpty()
    {
        $client = static::getInsalesApiClient();
        $client->categoryUpdate(null, array());
    }
}
