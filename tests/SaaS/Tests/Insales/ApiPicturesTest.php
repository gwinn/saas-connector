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

use InvalidArgumentException;
use SaaS\Test\TestCase;
/**
 * Class ApiPicturesTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiPicturesTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function picturesProviderException()
    {
        $client = static::getInsalesApiClient();
        $products = $client->productsList()->getResponse();
        $productId = isset($products[0]['id']) ? $products[0]['id'] : 123;
        $pictureSrc = array(
            'src' => 'src',
            'title' => 'RetailCrm'
        );
        $pictureAttachment = array(
            'attachment' => 'qwerty',
            'title' => 'InSales',
        );

        return array(
            'empty_data' => array(
                array(
                    'productId' => null,
                    'pictureId' => null
                ),
                array()),
            'not_found_product' => array(
                array(
                    'productId' => 123,
                    'pictureId' => null
                ),
                array()
            ),
            'not_found_picture' => array(
                array(
                    'productId' => $productId,
                    'pictureId' => 321
                ),
                array()
            ),
            'not_valid_src' => array(
                array(
                    'productId' => $productId,
                    'pictureId' => 321
                ),
                $pictureSrc
            ),
            'not_valid_attachment' => array(
                array(
                    'productId' => $productId,
                    'pictureId' => 321
                ),
                $pictureAttachment
            ),
        );
    }

    /**
     * Test using the method picturesList to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testPicturesListNotFound()
    {
        $client = static::getInsalesApiClient();
        $client->picturesList(123);
    }

    /**
     * Test using the method picturesList to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testPicturesListEmpty()
    {
        $client = static::getInsalesApiClient();
        $client->picturesList(null);
    }

    /**
     * Test using the method pictureGet to give exception
     *
     * @dataProvider picturesProviderException
     * @expectedException \Exception
     * @param $ids
     */
    public function testPicturesGetNotFound($ids)
    {
        $client = static::getInsalesApiClient();
        $client->pictureGet($ids['productId'], $ids['pictureId']);
    }

    /**
     * Test using the method pictureCreate to give exception
     *
     * @dataProvider picturesProviderException
     * @expectedException \Exception
     * @param $ids
     * @param $picture
     */
    public function testPictureCreate($ids, $picture)
    {
        $client = static::getInsalesApiClient();
        $client->pictureCreate($ids['productId'], $picture);
    }

    /**
     * Test using the method pictureUpdate to give exception
     *
     * @dataProvider picturesProviderException
     * @expectedException \Exception
     * @param $ids
     * @param $picture
     */
    public function testPictureUpdate($ids, $picture)
    {
        $client = static::getInsalesApiClient();
        $client->pictureUpdate($ids['productId'], $ids['pictureId'], $picture);
    }

    /**
     * Test using the method pictureDelete to give exception
     *
     * @dataProvider picturesProviderException
     * @expectedException \Exception
     * @param $ids
     */
    public function testPictureDelete($ids)
    {
        $client = static::getInsalesApiClient();
        $client->pictureDelete($ids['productId'], $ids['pictureId']);
    }
}
