<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Leadvertex
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://demo-1.leadvertex.ru/admin/page/api.html
 */

namespace SaaS\Service\Leadvertex;

use SaaS\Http\Response;

/**
 * LeadvertexClient
 *
 * @package SaaS\Connector\Ticketscloud
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://demo-1.leadvertex.ru/admin/page/api.html
 */

class Api
{
    private $secret;
    private $client;

    /**
     * Api constructor.
     *
     * @param $clientId
     * @param $secret
     */
    public function __construct($clientId, $secret)
    {
        $this->secret = $secret;
        $this->client = new Request($clientId, array('token' => $secret));
    }

    /**
     * Get orders by ids
     *
     * @param array $orders orders ids
     *
     * @return Response
     */
    public function getOrdersByIds($orders)
    {
        if (count($orders) > 100) {
            throw new \LengthException("Too many orders ids, maximum 100");
        }

        return $this->client->makeRequest(
            'getOrdersByIds.html',
            Request::METHOD_GET,
            array('ids' => implode(',', $orders))
        );
    }

    /**
     * Add order
     *
     * @param array $order
     *
     * @return Response
     *
     */
    public function addOrder($order)
    {

        $this->client->makeRequest(
            $this->url . 'addOrder.html.html?token=' . $this->secret,
            Request::METHOD_POST,
            $order
        );
    }

    /**
     * Update order
     *
     * @param array $order
     *
     * @return Response
     */
    public function updateOrder($order)
    {

        $this->client->makeRequest(
            $this->url . 'updateOrder.html?token=' . $this->secret . '&id=' . $order['id'],
            Request::METHOD_POST,
            $order
        );
    }

    /**
     * Get statuses list
     *
     * @return Response
     */
    public function getStatuses()
    {
        return $this->client->makeRequest(
            'getStatusList.html',
            Request::METHOD_GET
        );

    }

    /**
     * Get orders in status
     *
     * @param integer $status
     *
     * @return Response
     */
    public function getOrdersInStatus($status)
    {
        return $this->client->makeRequest(
            'getOrdersIdsInStatus.html',
            Request::METHOD_GET,
            array('status' => $status)
        );

    }
}
