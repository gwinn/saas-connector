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
 * Class Order
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Order
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get orders list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-get-orders-json
     * @group   orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function ordersList()
    {
        $url = '/admin/orders.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Order::class)
        );
    }

    /**
     * Get orders count
     *
     * @link  http://api.insales.ru/?doc_format=JSON#order-get-orders-count-json
     * @group orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function ordersCount()
    {
        $url = '/admin/orders/count.json';

        return new Response\Response($this->client->get($url), Model\Response\CountResponse::class);
    }

    /**
     * Get order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-get-order-json
     * @group   orders
     *
     * @param $orderId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderGet($orderId)
    {
        $url = sprintf('/admin/orders/%s.json', $orderId);

        return new Response\Response($this->client->get($url), Model\Order::class);
    }

    /**
     * Create order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-product-id-json
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-variant-id-json
     * @param   Request\OrderRequest $request order data
     * @group   orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderCreate(Request\OrderRequest $request)
    {
        $url = '/admin/orders.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Order::class);
    }

    /**
     * Update order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-update-order-json
     * @param   Request\OrderRequest $request order data
     * @group   orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderUpdate(Request\OrderRequest $request)
    {
        $url = sprintf('/admin/orders/%s.json', $request->order->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Order::class);
    }

    /**
     * Delete order
     *
     * @link  http://api.insales.ru/?doc_format=JSON#order-destroy-order-json
     * @param $orderId
     * @group orders
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function orderDelete($orderId)
    {
        $url = sprintf('/admin/orders/%s.json', $orderId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}
