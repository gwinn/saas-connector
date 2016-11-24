<?php
/**
 * PHP version 5.3
 *
 * @category Courierist
 * @package  SaaS
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
namespace SaaS\Service\Courierist;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * Tiu request class
 *
 * @category Courierist
 * @package  SaaS
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class Request
{    
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    protected $url;

    public function __construct()
    {
        $this->url = 'http://my.courierist.com/api/v1/';    
    }
    /**
     * Make HTTP request
     *
     * @param string $path       request url
     * @param string $method     method request
     * @param array  $parameters (default: array())
     *
     * @return Response
     */
    public function makeRequest($token, $path, $method, array $parameters = array())
    {
        $headers = array();
        
        if(!empty($token)){
            
            $headers = array (
                'Authorization: Bearer ' . $token
            );
        }

        $allowedMethods = array(
            self::METHOD_GET,
            self::METHOD_POST
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

        $url = $this->url . $path;

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);

        if (self::METHOD_GET === $method) {
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
        }

        if (self::METHOD_POST === $method) {
            $headers = array_merge($headers, array('Content-Type: application/json'));
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
        }

        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 30);

        $responseBody = curl_exec($curlHandler);
        $statusCode   = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return new Response($statusCode, $responseBody);
    }
}
