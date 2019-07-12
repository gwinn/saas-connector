<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Insales;

use SaaS\Service\Insales;

/**
 * Class WebhookTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class WebhookTest extends TestCase
{
    public function testWebhookCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Webhook::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $webhook = new Insales\Model\Webhook();
        $fakeMock->fill($webhook);

        $accountRequest = new Insales\Model\Request\WebhookRequest();
        $accountRequest->webhook = $webhook;

        $response = $apiClient->webhookCreate($accountRequest);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\Webhook::class, $response->getResponse());
    }

    public function testWebhookUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Webhook::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $webhook = new Insales\Model\Webhook();
        $fakeMock->fill($webhook);

        $accountRequest = new Insales\Model\Request\WebhookRequest();
        $accountRequest->webhook = $webhook;

        $response = $apiClient->webhookUpdate($accountRequest);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\Webhook::class, $response->getResponse());
    }

    public function testWebhookDelete()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Response\StatusResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->webhookDelete(1);

        static::assertResponse($response);

        static::assertEquals('ok', $response->getResponse()->status);
    }
}
