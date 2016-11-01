<?php

/**
 * PHP version 5.3
 *
 * @category Tiu
 * @package  SaaS
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
namespace SaaS\Service\Tiu;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * Tiu request class
 *
 * @category Tiu
 * @package  SaaS
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://bizpost.ru/doc/bizpost_API_current.zip
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    protected $url;
    protected $token;

    /**
     * Request constructor.
     *
     * @param string $login    user login
     * @param string $password user password
     */
    public function __construct($token)
    {
        $this->url = 'https://my.tiu.ru/api/v1';
        $this->token = $token;
    }

    /**
     * Make HTTP request
     *
     * @param string $path       method path
     * @param string $method     (default: 'GET')
     * @param array  $parameters (default: array())
     *
     * @return Response
     */
     public function makeRequest($path, $method, array $parameters = array())
    {
        $headers = array (
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json'
        );
        
        if (!in_array($method, $allowedMethods)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Method "%s" is not valid. Allowed methods are %s',
                    $method,
                    implode(', ', $allowedMethods)
                )
            );
        }
        
        $path = $this->url . $path;
        
        if (self::METHOD_GET === $method) {
            $path .= '?' . http_build_query($parameters, '', '&');
        }
        
        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $path);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
        
        if (strtoupper($method) == 'POST') {
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
        }
        
        
        
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        
        
        $responseBody = json_decode(curl_exec($curlHandler));
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