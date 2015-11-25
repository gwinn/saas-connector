<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Http\Request
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */

namespace SaaS\Connector\Http\Request;

use SaaS\Connector\Exception\CurlException;
use SaaS\Connector\Http\Response;

/**
 * BizpostRequest
 *
 * @package SaaS\Connector\Http\Request
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class BizpostRequest
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    private $url;
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->url = 'https://bizpost.ru/';
        $this->login = $login;
        $this->password = $password;
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
        $allowedMethods = array(
            self::METHOD_GET,
            self::METHOD_POST
        );

        if (!in_array($method, $allowedMethods)) {
            throw new \InvalidArgumentException(sprintf(
                'Method "%s" is not valid. Allowed methods are %s',
                $method,
                implode(', ', $allowedMethods)
            ));
        }

        $path = $this->url . $path;

        if (self::METHOD_GET === $method && sizeof($parameters)) {
            $path .= '?' . http_build_query($parameters, '', '&');
        }

        // $basicAuth = base64_encode(sprintf("%s:%s", $this->login, $this->password));
        //
        // $headers = array(
        //     'Content-Type: text/xml',
        //     'Authorization: Basic ' . $basicAuth
        // );

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $path);
        curl_setopt($curlHandler, CURLOPT_USERPWD, sprintf("%s:%s", $this->login, $this->password));
        curl_setopt($curlHandler, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
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

        return array('statusCode' => $statusCode, 'response' => $responseBody);
    }
}
