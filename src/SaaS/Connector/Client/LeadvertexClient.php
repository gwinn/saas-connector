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

use SaaS\Connector\Exception\CurlException;

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
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    private $secret;
    private $url;

    public function __construct($clientId, $secret)
    {
        $this->url    = "https://$clientId.leadvertex.ru/api/admin/";
        $this->secret = $secret;
    }

    /**
     * Get orders by ids
     *
     * @param array $orders orders ids
     *
     * @return array
     */
    public function getOrdersByIds($orders)
    {

        return $this->makeRequest(
            $this->url . 'getOrdersByIds.html',
            'GET',
            array('token' => $this->secret, 'ids' => implode(',', $orders))
        );
    }

    /**
     * Add order
     *
     * @param array $order
     *
     */
    public function addOrder($order)
    {

        $this->makeRequest(
            $this->url . 'addOrder.html.html?token=' . $this->secret . '&id=' . $order['id'],
            'POST',
            $order
        );
    }

    /**
     * Update order
     *
     * @param array $order
     *
     */
    public function updateOrder($order)
    {

        $this->makeRequest(
            $this->url . 'updateOrder.html?token=' . $this->secret . '&id=' . $order['id'],
            'POST',
            $order
        );
    }

    /**
     * Get statuses list
     *
     * @return mixed
     */
    public function getStatuses()
    {
        return $this->makeRequest(
            $this->url . 'getStatusList.html',
            'GET',
            array('token' => $this->secret)
        );

    }

    /**
     * Get orders in status
     *
     * @param integer $status
     *
     * @return mixed
     */
    public function getOrdersInStatus($status)
    {
        return $this->makeRequest(
            $this->url . 'getOrdersIdsInStatus.html',
            'GET',
            array('token' => $this->secret, 'status' => $status)
        );

    }

    /**
     * Make HTTP request
     *
     * @param string $path
     * @param string $method (default: 'GET')
     * @param array $parameters (default: array())
     * @param int $timeout
     * @return mixed
     */
    public function makeRequest($path, $method, array $parameters = array(), $timeout = 30)
    {
        $allowedMethods = array(self::METHOD_GET, self::METHOD_POST);
        if (!in_array($method, $allowedMethods)) {
            throw new \InvalidArgumentException(sprintf(
                'Method "%s" is not valid. Allowed methods are %s',
                $method,
                implode(', ', $allowedMethods)
            ));
        }

        if (self::METHOD_GET === $method && sizeof($parameters)) {
            $path .= '?' . http_build_query($parameters);
        }

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $path);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, (int) $timeout);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);

        if (self::METHOD_POST === $method) {
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $parameters);
        }

        $responseBody = curl_exec($curlHandler);
        $statusCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);
        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return array($responseBody, $statusCode);
    }
}
