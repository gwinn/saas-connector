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
 * Class ApiDiscountTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiDiscountTest extends TestCase
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
            'not_valid_type' => array(
                null,
                array(
                    'code' => 'RetailCRM',
                    'type_id' => 5
                )
            ),
            'not_discount' => array(
                123,
                array(
                    'code' => 'RetailCRM',
                    'type_id' => 1
                )
            ),
        );
    }

    /**
     * Test using the method discountCodesList
     */
    public function testDiscountCodesList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->discountCodesList();
        static::checkResponse($response);
    }

    /**
     * Test using the method discountCodeGet to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $discountId
     */
    public function testDiscountCodeGetException($discountId)
    {
        $client = static::getInsalesApiClient();
        $client->discountCodeGet($discountId);
    }

    /**
     * Test using the method discountCodeCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $discountId
     * @param $discount
     */
    public function testDiscountCodeCreateException($discountId, $discount)
    {
        $client = static::getInsalesApiClient();
        $client->discountCodeCreate($discount);
    }

    /**
     * Test using the method discountCodeUpdate to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $discountId
     * @param $discount
     */
    public function testDiscountCodeUpdateException($discountId, $discount)
    {
        $client = static::getInsalesApiClient();
        $client->discountCodeUpdate($discountId, $discount);
    }

    /**
     * Test using the method discountCodeDelete to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $discountId
     */
    public function testDiscountCodeDeleteException($discountId)
    {
        $client = static::getInsalesApiClient();
        $client->discountCodeDelete($discountId);
    }

    /**
     * Test using the method discountCodeCreate
     *
     * @return mixed
     */
    public function testDiscountCodeCreate()
    {
        $client = static::getInsalesApiClient();

        $discount = array(
            'code' => 'RetailCRM',
            'type_id' => 1,
            'discount' => 50
        );
        $response = $client->discountCodeCreate($discount);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method discountCodeUpdate
     *
     * @depends testDiscountCodeCreate
     * @param $discountId
     */
    public function testDiscountCodeUpdate($discountId)
    {
        $client = static::getInsalesApiClient();

        $discount = array(
            'discount' => 51
        );

        $response = $client->discountCodeUpdate($discountId, $discount);
        static::checkResponse($response);

        return $discountId;
    }

    /**
     * Test using the method discountCodeDelete
     *
     * @depends testDiscountCodeUpdate
     * @param $discountId
     */
    public function testDiscountCodeDelete($discountId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->discountCodeDelete($discountId);
        static::checkResponse($response);
    }
    
}
