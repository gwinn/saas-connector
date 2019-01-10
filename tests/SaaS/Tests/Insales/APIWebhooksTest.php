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
                array()
            ),
            'empty_webhook' => array(
                array()
            ),
            'address_not_found' => array(
                array(
                    'format_type' => 'json',
                    'topic' => 'orders/update'
                )
            ),
            'topic_not_found' => array(
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
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testWebhookGetApiException()
    {
        $client = static::getInsalesApiClient();
        $client->webhookGet(null);
    }

    /**
     * Test using the method webhookGet to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testWebhookGetException()
    {
        $client = static::getInsalesApiClient();
        $client->webhookGet(123);
    }

    /**
     * Test using the method webhookCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $webhook
     */
    public function testWebhookCreateException($webhook)
    {
        $client = static::getInsalesApiClient();
        $client->webhookCreate($webhook);
    }

    /**
     * Test using the method webhookUpdate to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     * @dataProvider providerException
     * @param $webhook
     */
    public function testWebhookUpdateApiException($webhook)
    {
        $client = static::getInsalesApiClient();
        $client->webhookUpdate(null, $webhook);
    }

    /**
     * Test using the method webhookDelete to give exception
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     */
    public function testWebhookDeleteApiException()
    {
        $client = static::getInsalesApiClient();
        $client->webhookDelete(null);
    }

    /**
     * Test using the method webhookDelete to give exception
     *
     * @expectedException \InvalidArgumentException
     */
    public function testWebhookDeleteException()
    {
        $client = static::getInsalesApiClient();
        $client->webhookDelete(123);
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
