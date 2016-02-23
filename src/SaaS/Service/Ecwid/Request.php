<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Ecwid
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */

namespace SaaS\Service\Ecwid;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * EcwidRequest
 *
 * @package SaaS\Service\Ecwid
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    private $url;

    /**
     * Request constructor.
     *
     * @param array $defaultParameters
     */
    public function __construct(array $defaultParameters = array())
    {
        $this->url = 'https://app.ecwid.com/api/v3/';
        $this->defaultParameters = $defaultParameters;
    }

    /**
     * Make HTTP request
     *
     * @param string $path
     * @param string $method (default: 'GET')
     * @param array $parameters (default: array())
     *
     * @return Response
     */
    public function makeRequest($path, $method, array $parameters = array())
    {
        $allowedMethods = array(
            self::METHOD_GET,
            self::METHOD_POST,
            self::METHOD_PUT,
            self::METHOD_DELETE
        );

        if (!in_array($method, $allowedMethods)) {
            throw new \InvalidArgumentException(sprintf(
                'Method "%s" is not valid. Allowed methods are %s',
                $method,
                implode(', ', $allowedMethods)
            ));
        }

        $url = $this->url . $path;

        if (self::METHOD_GET === $method && sizeof($parameters)) {
            $parameters = array_merge($this->defaultParameters, $parameters);
            $url .= '?' . http_build_query($parameters);
        } else {
            $url .= '?' . http_build_query($this->defaultParameters);
        }

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);

        if (self::METHOD_POST === $method) {
            $request_headers = array();
            $request_headers[] = 'Content-Type: application/json';
            $request_headers[] = 'Cache-Control: no-cache';

            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $parameters['data']);
        }

        if (self::METHOD_PUT === $method) {
            $request_headers = array();
            $request_headers[] = 'Content-Type: application/json';
            $request_headers[] = 'Cache-Control: no-cache';

            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $parameters['data']);
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
