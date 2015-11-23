<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://demo-1.leadvertex.ru/admin/page/api.html
 */

namespace SaaS\Connector\Client;

use SaaS\Connector\Http\Request\LeadvertexRequest;

/**
 * LeadvertexClient
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://demo-1.leadvertex.ru/admin/page/api.html
 */

class LeadvertexClient
{
    private $secret;
    private $client;

    public function __construct($clientId, $secret)
    {
        $this->secret = $secret;
        $this->client = new LeadvertexRequest($clientId, array('token' => $secret));
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
            LeadvertexRequest::METHOD_GET,
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
            LeadvertexRequest::METHOD_POST,
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
            LeadvertexRequest::METHOD_POST,
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
            LeadvertexRequest::METHOD_GET
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
            LeadvertexRequest::METHOD_GET,
            array('status' => $status)
        );

    }
}
