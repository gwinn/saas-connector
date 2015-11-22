<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://doc.ticketscloud.org/
 */

namespace SaaS\Connector\Client;

use SaaS\Connector\Exception\CurlException;
use SaaS\Connector\Http\Response;

/**
 * TicketscloudClient
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://doc.ticketscloud.org/
 */
class TicketscloudClient
{
    const VERSION       = 'v1';
    const METHOD_GET    = 'GET';
    const METHOD_POST   = 'POST';
    const METHOD_PUT    = 'PUT';
    const METHOD_PATCH  = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    protected $url;
    protected $token;

    private $allowedMethods;


    /**
     * Client creating
     *
     * @param  string $token
     * @return mixed
     */
    public function __construct($token)
    {

        $this->url   = 'https://ticketscloud.org/' . self::VERSION;
        $this->token = $token;
        $this->allowedMethods = array(
            self::METHOD_GET,
            self::METHOD_POST,
            self::METHOD_PATCH,
            self::METHOD_PUT,
            self::METHOD_DELETE
        );
    }

    /**
     * Get event
     *
     * @return ApiResponse
     */
    public function eventsGet($uid)
    {
        return $this->makeRequest('/resources/events/' . $uid, self::METHOD_GET);
    }

    /**
     * Edit event
     *
     * @return ApiResponse
     */
    public function eventsEdit($uid)
    {
        return $this->makeRequest('/resources/events/' . $uid, self::METHOD_PATCH);
    }

    /**
     * Get event
     *
     * @return ApiResponse
     */
    public function eventsDelete($uid)
    {
        return $this->makeRequest('/resources/events/' . $uid, self::METHOD_DELETE);
    }

    /**
     * Get events list
     * @return ApiResponse
     */
    public function eventsList(array $parameters = array())
    {
        return $this->makeRequest('/resources/events', self::METHOD_GET, $parameters);
    }

    /**
     * Get events list by service
     * @return ApiResponse
     */
    public function eventsServiceList(array $parameters = array())
    {
        return $this->makeRequest('/services/simple/events', self::METHOD_GET, $parameters);
    }

    /**
     * Get orderss list
     * @return ApiResponse
     */
    public function ordersList(array $parameters = array())
    {
        return $this->makeRequest('/resources/orders', self::METHOD_GET, $parameters);
    }

    /**
     * Make HTTP request
     *
     * @param string $path
     * @param string $method (default: 'GET')
     * @param array $parameters (default: array())
     * @return array
     */
    public function makeRequest($path, $method, array $parameters = array())
    {

        if (!in_array($method, $this->allowedMethods)) {
            throw new \InvalidArgumentException(sprintf(
                'Method "%s" is not valid. Allowed methods are %s',
                $method,
                implode(', ', $this->allowedMethods)
            ));
        }

        $path = $this->url . $path;

        if (self::METHOD_GET === $method && sizeof($parameters)) {
            $path .= '?' . http_build_query($parameters, '', '&');
        }

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $path);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: key ' . $this->token,
            'User-Agent: TC-Client v.0.6.5'
        ));
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 180);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 180);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);

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

        return new Response($statusCode, $responseBody);
    }
}
