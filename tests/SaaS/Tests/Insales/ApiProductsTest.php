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
 * Class ApiProductsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiProductsTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function productProviderException()
    {
        return array(
            'empty_data' => array(
                null,
                array()),
            'not_found' => array(
                123,
                array()),
            'not_title' => array(
                'qwerty',
                array(
                    'category_id' => 123
                )),
            'not_attributes' => array(
                123,
                array(
                    'category_id' => 123,
                    'title' => 'New title'
                )
            ),
        );
    }

    /**
     * Test using the method productsCount
     */
    public function testProductsCount()
    {
        $client = static::getInsalesApiClient();
        $response = $client->productsCount();
        static::checkResponse($response);
    }

    /**
     * Test using the method productsList
     */
    public function testProductsListValid()
    {
        $client = static::getInsalesApiClient();
        $response = $client->productsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method productGet to give exception
     *
     * @dataProvider productProviderException
     * @expectedException \Exception
     * @param $productId
     */
    public function testProductGetException($productId)
    {
        $client = static::getInsalesApiClient();
        $client->productGet($productId);
    }

    /**
     * Test using the method productCreate to give exception
     *
     * @dataProvider productProviderException
     * @expectedException \InvalidArgumentException
     * @param $productId
     * @param $product
     */
    public function testProductCreateException($productId, $product)
    {
        $client = static::getInsalesApiClient();
        $client->productCreate($product);
    }

    /**
     * Test using the method productUpdate to give exception
     *
     * @dataProvider productProviderException
     * @expectedException \Exception
     * @param $productId
     * @param $product
     */
    public function testProductUpdateException($productId, $product)
    {
        $client = static::getInsalesApiClient();
        $client->productUpdate($productId, $product);
    }

    /**
     * Test using the method productDelete to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testProductDeleteException()
    {
        $client = static::getInsalesApiClient();
        $client->productDelete(null);
    }

    /**
     * Test using the method productGet
     */
    public function testProductGetValid()
    {
        $client = static::getInsalesApiClient();
        $data = $client->productsList()->getResponse();
        $response = $client->productGet($data[0]['id']);
        static::checkResponse($response);
    }

    /**
     * Test using the method productCreate
     *
     * @return mixed
     */
    public function testProductCreateValid()
    {
        $client = static::getInsalesApiClient();

        $category = $client->categoriesList()->getResponse();

        $product = array(
            'category_id' => $category[0]['id'],
            'title' => 'New title',
            'variants_attributes' => array(
                array(
                    'sku' => 'sku-1',
                    'quantity' => 12,
                    'price' => 555
                )
            )
        );

        $response = $client->productCreate($product);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method productUpdate
     *
     * @depends testProductCreateValid
     * @param $productId
     * @return mixed
     */
    public function testProductUpdateValid($productId)
    {
        $product = array(
            'id' => $productId,
            'title' => 'Update title'
        );
        $client = static::getInsalesApiClient();
        $response = $client->productUpdate($productId, $product);
        static::checkResponse($response);

        return $productId;
    }

    /**
     * Test using the method productDelete
     *
     * @depends testProductUpdateValid
     * @param $productId
     */
    public function testProductDeleteValid($productId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->productDelete($productId);
        static::checkResponse($response);
    }
}
