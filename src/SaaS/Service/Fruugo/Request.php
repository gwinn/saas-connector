<?php

/**
 * PHP version 5.3
 *
 * HTTP request class
 *
 * @category Fruugo
 * @package  Saas
 * @author   Anna Mazepina <putintseva@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://sell.fruugo.com/fruugo-docs/Selling_on_Fruugo_-_Order_API.pdf
 */

namespace SaaS\Service\Fruugo;

use SaaS\Exception\CurlException;
use SaaS\Http\ResponseXML;

/**
 * PHP version 5.3
 *
 * Fruugo request class
 *
 * @category Fruugo
 * @package  Fruugo
 * @author   Anna Mazepina <putintseva@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://sell.fruugo.com/fruugo-docs/Selling_on_Fruugo_-_Order_API.pdf
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    protected $url;
    protected $auth;

    /**
     * Client constructor.
     *
     * @param string $login    user login
     * @param string $password user password
     */
    public function __construct($login, $password)
    {
        $this->url = 'https://www.fruugo.com/';
        $this->auth = base64_encode($login . ':' . $password);
    }

    /**
     * Make HTTP request
     *
     * @param string $path       request url
     * @param string $method     (default: 'GET')
     * @param array  $parameters (default: array())
     * @throws CurlException
     *
     * @return ResponseXML
     */
    public function makeRequest($path, $method, array $parameters = array())
    {
        $allowedMethods = array(
            self::METHOD_GET,
            self::METHOD_POST,
        );

        if (!in_array($method, $allowedMethods, false)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Method "%s" is not valid. Allowed methods are %s',
                    $method,
                    implode(', ', $allowedMethods)
                )
            );
        }

        $url = $this->url . $path;

        if (self::METHOD_GET === $method && count($parameters)) {
            $url .= '?' . http_build_query($parameters, '', '&');
        }

        $curlHandler = curl_init();
        $headers = [
            'Accept:	text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8,application/json',
            'Authorization: Basic ' . $this->auth,
        ];

        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 30);

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

        return new ResponseXML($statusCode, $responseBody);
    }
}
