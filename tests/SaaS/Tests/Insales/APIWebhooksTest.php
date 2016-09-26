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
 * Class APIWebhooksTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class APIWebhooksTest extends TestCase
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
            'empty_webhook' => array(
                123,
                array()
            ),
            'address_not_found' => array(
                123,
                array(
                    'format_type' => 'json',
                    'topic' => 'orders/update'
                )
            ),
            'topic_not_found' => array(
                123,
                array(
                    'address' => 'http://test.dev/orders/create',
                    'format_type' => 'json',
                )
            ),
        );
    }

    /**
     * Test using the method webhooksList
     */
    public function testWebhooksList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->webhooksList();
        static::checkResponse($response);
    }

    /**
     * Test using the method webhookGet to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $webhookId
     */
    public function testWebhookGetException($webhookId)
    {
        $client = static::getInsalesApiClient();
        $client->webhookGet($webhookId);
    }

    /**
     * Test using the method webhookCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $webhook
     */
    public function testWebhookCreateException($webhookId, $webhook)
    {
        $client = static::getInsalesApiClient();
        $client->webhookCreate($webhook);
    }

    /**
     * Test using the method webhookUpdate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $webhookId
     * @param $webhook
     */
    public function testWebhookUpdateException($webhookId, $webhook)
    {
        $client = static::getInsalesApiClient();
        $client->webhookUpdate($webhookId, $webhook);
    }

    /**
     * Test using the method webhookDelete to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $webhookId
     */
    public function testWebhookDeleteException($webhookId)
    {
        $client = static::getInsalesApiClient();
        $client->webhookDelete($webhookId);
    }

    /**
     * Test using the method webhookCreate
     *
     * @return mixed
     */
    public function testWebhookCreate()
    {
        $client = static::getInsalesApiClient();
        $webhook = array(
            'address' => 'http://test.dev/orders/create',
            'topic' => 'orders/update',
            'format_type' => 'xml'
        );

        $response = $client->webhookCreate($webhook);
        static::checkResponse($response);

        return $response->offsetGet('id');
    }

    /**
     * Test using the method webhookUpdate
     *
     * @depends testWebhookCreate
     * @param $webhookId
     * @return mixed
     */
    public function testWebhookUpdate($webhookId)
    {
        $client = static::getInsalesApiClient();
        $webhook = array(
            'format_type' => 'json'
        );

        $response = $client->webhookUpdate($webhookId, $webhook);
        static::checkResponse($response);

        return $webhookId;
    }

    /**
     * Test using the method webhookDelete
     *
     * @depends testWebhookUpdate
     * @param $webhookId
     */
    public function testWebhookDelete($webhookId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->webhookDelete($webhookId);
        static::checkResponse($response);
    }

}
