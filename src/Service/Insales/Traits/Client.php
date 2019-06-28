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
 * Class Client
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Client
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get clients list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-get-clients-json
     * @group   clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientsList()
    {
        $url = '/admin/clients.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Client::class)
        );
    }

    /**
     * Get clients count
     *
     * @group clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientsCount()
    {
        $url = '/admin/clients/count.json';

        return new Response\Response($this->client->get($url), Model\Response\CountResponse::class);
    }

    /**
     * Get client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-get-client-json
     * @group   clients
     *
     * @param $clientId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientGet($clientId)
    {
        $url = sprintf('/admin/clients/%s.json', $clientId);

        return new Response\Response($this->client->get($url), Model\Client::class);
    }

    /**
     * Create individual or juridical client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-create-individual-client-json
     * @link    http://api.insales.ru/?doc_format=JSON#client-create-juridical-client-json
     * @param   Request\ClientRequest $request client data
     * @group   clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientCreate(Request\ClientRequest $request)
    {
        $url = '/admin/clients.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Client::class);
    }

    /**
     * Update client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-update-client-json
     * @param   Request\ClientRequest $request client data
     * @group   clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientUpdate(Request\ClientRequest $request)
    {
        $url = sprintf('/admin/clients/%s.json', $request->client->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Client::class);
    }

    /**
     * Delete client
     *
     * @link  http://api.insales.ru/?doc_format=JSON#client-destroy-client-json
     * @param $clientId
     * @group clients
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function clientDelete($clientId)
    {
        $url = sprintf('/admin/clients/%s.json', $clientId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}
