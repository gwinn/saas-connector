<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Traits;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use SaaS\Service\Insales\Model;
use SaaS\Service\Insales\Model\Response;
use SaaS\Service\Insales\Model\Request;
use SaaS\Service\Insales\Exception;

/**
 * Class Webhook
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Webhook
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get webhooks list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-get-webhooks-json
     * @group   webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhooksList()
    {
        $url = '/admin/webhooks.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Webhook::class)
        );
    }

    /**
     * Get webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-get-webhook-json
     * @group   webhooks
     *
     * @param $webhookId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookGet($webhookId)
    {
        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return new Response\Response($this->client->get($url), Model\Webhook::class);
    }

    /**
     * Create webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-create-webhook-json
     * @param   Request\WebhookRequest $request webhook data
     * @group   webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookCreate(Request\WebhookRequest $request)
    {
        $url = '/admin/webhooks.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Webhook::class);
    }

    /**
     * Update webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-update-webhook-json
     * @param   Request\WebhookRequest $request webhook data
     * @group   webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookUpdate(Request\WebhookRequest $request)
    {
        $url = sprintf('/admin/webhooks/%s.json', $request->webhook->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Webhook::class);
    }

    /**
     * Delete webhook
     *
     * @link  http://api.insales.ru/?doc_format=JSON#webhook-destroy-webhook-json
     * @param $webhookId
     * @group webhooks
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function webhookDelete($webhookId)
    {
        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}
