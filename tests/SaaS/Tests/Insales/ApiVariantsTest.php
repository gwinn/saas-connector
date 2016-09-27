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
 * Class ApiVariantsTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiVariantsTest extends TestCase
{

    const VARIAN_ID_NOT_FOUND = 321;
    const PRODUCT_ID_NOT_FOUND = 123;

    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function variantProviderException()
    {
        $client = static::getInsalesApiClient();
        $products = $client->productsList()->getResponse();
        $productId = isset($products[0]['id'])
            ? $products[0]['id']
            : self::PRODUCT_ID_NOT_FOUND;

        $variantId = isset($products[0]['variants'][0])
            ? $products[0]['variants'][0]['id']
            : self::VARIAN_ID_NOT_FOUND;

        $notQuantity = array(
            'price' => 100
        );
        $notPrice = array(
            'quantity' => 100
        );
        $notIntPrice = array(
            'id' => $variantId,
            'price' => '100',
            'quantity' => 100
        );
        $notIntQuantity = array(
            'id' => $variantId,
            'price' => 100,
            'quantity' => '100'
        );

        return array(
            'empty_data' => array(
                array(
                    'productId' => null,
                    'variantId' => null
                ),
                array()),
            'not_found_product' => array(
                array(
                    'productId' => self::PRODUCT_ID_NOT_FOUND,
                    'variantId' => null
                ),
                array()
            ),
            'not_found_variant' => array(
                array(
                    'productId' => $productId,
                    'variantId' => self::VARIAN_ID_NOT_FOUND
                ),
                array()
            ),
            'not_found_price' => array(
                array(
                    'productId' => $productId,
                    'variantId' => self::VARIAN_ID_NOT_FOUND
                ),
                $notPrice
            ),
            'not_found_quantity' => array(
                array(
                    'productId' => $productId,
                    'variantId' => self::VARIAN_ID_NOT_FOUND
                ),
                $notQuantity
            ),
            'not_int_quantity' => array(
                array(
                    'productId' => $productId,
                    'variantId' => $variantId
                ),
                $notIntQuantity
            ),
            'not_int_price' => array(
                array(
                    'productId' => $productId,
                    'variantId' => $variantId
                ),
                $notIntPrice
            ),
            'not' => array(
                array(
                    'productId' => $productId,
                    'variantId' => $variantId
                ),
                array()
            ),
        );
    }

    /**
     * Test using the method variantsList to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testVariantsListNotFoundException()
    {
        $client = static::getInsalesApiClient();
        $client->variantsList(self::PRODUCT_ID_NOT_FOUND);
    }

    /**
     * Test using the method variantsList to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testVariantsListEmptyException()
    {
        $client = static::getInsalesApiClient();
        $client->variantsList(null);
    }

    /**
     * Test using the method variantGet to give exception
     *
     * @dataProvider variantProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     */
    public function testVariantGetException($ids)
    {
        $variantId = in_array($ids['variantId'], array(null, self::VARIAN_ID_NOT_FOUND))
            ? $ids['variantId']
            : self::VARIAN_ID_NOT_FOUND;

        $client = static::getInsalesApiClient();
        $client->variantGet($ids['productId'], $variantId);
    }

    /**
     * Test using the method variantCreate to give exception
     *
     * @dataProvider variantProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     * @param $variant
     */
    public function testVariantCreateException($ids, $variant)
    {
        $client = static::getInsalesApiClient();
        $client->variantCreate($ids['productId'], $variant);
    }

    /**
     * Test using the method variantUpdate to give exception
     *
     * @dataProvider variantProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     * @param $variant
     */
    public function testVariantUpdateException($ids, $variant)
    {
        $client = static::getInsalesApiClient();
        $client->variantUpdate($ids['productId'], $variant);
    }

    /**
     * Test using the method variantDelete to give exception
     *
     * @dataProvider variantProviderException
     * @expectedException \InvalidArgumentException
     * @param $ids
     */
    public function testVariantDeleteException($ids)
    {
        $variantId = in_array($ids['variantId'], array(null, self::VARIAN_ID_NOT_FOUND))
            ? $ids['variantId']
            : self::VARIAN_ID_NOT_FOUND;

        $client = static::getInsalesApiClient();
        $client->variantDelete($ids['productId'], $variantId);
    }

    /**
     * Test using the method variantGroupUpdate to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testVariantGroupUpdateException()
    {
        $variants = array();
        while (count($variants) <= 100) {
            $variants[] = array(
                'id' => 123,
                'price' => 100
            );
        }
        $client = static::getInsalesApiClient();
        $client->variantGroupUpdate($variants);
    }

    /**
     * Test using the method variantGet
     *
     * @return int
     */
    public function testVariantGetValid()
    {
        $client = static::getInsalesApiClient();
        $products = $client->productsList()->getResponse();
        $productId = isset($products[0]['id'])
            ? $products[0]['id']
            : self::PRODUCT_ID_NOT_FOUND;

        $variantId = isset($products[0]['variants'][0])
            ? $products[0]['variants'][0]['id']
            : self::VARIAN_ID_NOT_FOUND;

        $response = $client->variantGet($productId, $variantId);
        static::checkResponse($response);

        return $productId;
    }

    /**
     * Test using the method variantCreate
     *
     * @depends testVariantGetValid
     * @param $productId
     * @return array
     */
    public function testVariantCreateValid($productId)
    {
        $variant = array(
            'price' => 100,
            'quantity' => 100,
            'options' => array(
                array(
                    'option_name_id' => 480659,
                    'value' => '32'
                )
            )
        );

        $client = static::getInsalesApiClient();
        $response = $client->variantCreate($productId, $variant);
        static::checkResponse($response);
        $data = $response->getResponse();

        return array(
            'productId' => $productId,
            'variantId' => $data['id']
        );
    }

    /**
     * Test using the method variantUpdate
     *
     * @depends testVariantCreateValid
     * @param $ids
     * @return array
     */
    public function testVariantUpdateValid($ids)
    {
        $variant = array(
            'id' => $ids['variantId'],
            'price' => 150,
            'quantity' => 88
        );

        $client = static::getInsalesApiClient();
        $response = $client->variantUpdate($ids['productId'], $variant);
        static::checkResponse($response);

        return array(
            'productId' => $ids['productId'],
            'variantId' => $ids['variantId']
        );
    }

    /**
     * Test using the method variantDelete
     *
     * @depends testVariantUpdateValid
     * @param $ids
     */
    public function testVariantDeleteValid($ids)
    {
        $client = static::getInsalesApiClient();
        $response = $client->variantDelete($ids['productId'], $ids['variantId']);
        static::checkResponse($response);
    }

    /**
     * Test using the method variantGroupUpdate
     */
    public function testVariantGroupUpdateValid()
    {
        $client = static::getInsalesApiClient();
        $products = $client->productsList()->getResponse();

        $variantId = isset($products[0]['variants'][0])
            ? $products[0]['variants'][0]['id']
            : self::VARIAN_ID_NOT_FOUND;

        $variants = array(
            array(
                'id' => $variantId,
                'price' => 4999
            )
        );

        $response = $client->variantGroupUpdate($variants);
        static::checkResponse($response);
    }
}
