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
class ApiBonusSystemTest extends TestCase
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
            'not_found' => array(
                123,
                array()
            ),
        );
    }

    /**
     * Test using the method bonusSystemTransactionGet to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $id
     */
    public function testBonusSystemTransactionsGetException($id)
    {
        $client = static::getInsalesApiClient();
        $client->bonusSystemTransactionGet($id);
    }

    /**
     * Test using the method bonusSystemTransactionsClientGet to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $id
     */
    public function testBonusSystemTransactionsClientGetException($id)
    {
        $client = static::getInsalesApiClient();
        $client->bonusSystemTransactionsClientGet($id);
    }

    /**
     * Test using the method bonusSystemTransactionsClientCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $id
     * @param $transaction
     */
    public function testBonusSystemTransactionsClientCreateException($id, $transaction)
    {
        $client = static::getInsalesApiClient();
        $client->bonusSystemTransactionsClientCreate($id, $transaction);
    }

    /**
     * Test using the method bonusSystemTransactionsClientCreate
     *
     * @return mixed
     */
    public function testBonusSystemTransactionsClientCreate()
    {
        $client = static::getInsalesApiClient();
        $customers = $client->clientsList()->getResponse();

        $transaction = array(
            'bonus_points' => 10,
            'description' => 'retailCRM bonus',
        );

        $response = $client->bonusSystemTransactionsClientCreate($customers[0]['id'], $transaction);
        static::checkResponse($response);

        return $customers[0]['id'];
    }

    /**
     * Test using the method bonusSystemTransactionsClientCreate
     *
     * @depends testBonusSystemTransactionsClientCreate
     * @param $customerId
     */
    public function testBonusSystemTransactionsClientDelete($customerId)
    {
        $client = static::getInsalesApiClient();
        $transaction = array(
            'bonus_points' => -10,
            'description' => 'retailCRM bonus',
        );

        $response = $client->bonusSystemTransactionsClientCreate($customerId, $transaction);
        static::checkResponse($response);
    }
}
