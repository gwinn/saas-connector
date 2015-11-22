<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */

namespace SaaS\Connector\Client;

use RetailCrm\Component\Utils;

/**
 * ActivizmClient
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class ActivizmClient
{

    private $client;
    private $secret;
    private $url;

    public function __construct($clientId, $secret)
    {
        $this->url    = 'https://activizm.ru/api/v1';
        $this->client = $clientId;
        $this->secret = $secret;
    }

    /**
     * Get orders list
     *
     * @return array
     */
    public function getOrders()
    {
        return $this->makeRequest('getOrders', array());
    }

    /**
     * Get order by id
     *
     * @param string $id
     *
     * @return array
     */
    public function getOrder($uid)
    {
        return $this->makeRequest('getOrderDetails', array('orderNumber' => $uid));
    }

    /**
     * Get orders statuses
     *
     * @return array
     */
    public function getOrderStatuses()
    {
        return $this->makeRequest('getOrderStatuses');
    }

    /**
     * Get orders delivery types
     *
     * @return array
     */
    public function getDeliveryTypes()
    {
        return $this->makeRequest('getDeliveryTypes');
    }

    /**
     * Get orders payment types
     *
     * @return array
     */
    public function getPaymentTypes()
    {
        return $this->makeRequest('getPaymentTypes');
    }

    /**
     * Make HTTP request
     *
     * @param string $method API method
     * @param array $params (default: array())
     *
     * @return mixed
     */
    private function makeRequest($method, $params = array())
    {

        $request['method'] = $method;
        $request['params'] = $params;

        $headers            = array();
        $headers[]          = 'Content-Type: application/json';
        $headers[]          = sprintf(
            "Authorization: Basic %s",
            base64_encode(sprintf("%s:%s", $this->client, $this->secret))
        );

        $request['jsonrpc'] = '2.0';
        $request['id']      = 1;

        $json               = json_encode($request);

        $opts               = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => implode("\r\n", $headers),
                'content' => $json,
            ),
        );

        $context            = stream_context_create($opts);
        $response           = file_get_contents($this->url, false, $context);

        return $response;
    }
}
