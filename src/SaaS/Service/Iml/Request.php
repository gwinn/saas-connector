<?php
/**
 * PHP version 5.3
 *
 * @category Iml
 * @package  SaaS
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */

namespace SaaS\Service\Iml;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * Tiu request class
 *
 * @category Iml
 * @package  SaaS
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    public $auth;

    /*
     * get auth
     *
     * @return string
     *
     */
    public function __construct($login, $password) {

        $this->auth= $login . ':' . $password;

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
    public function makeRequest($path, $method, array $parameters = array()){

        $headers = array('Content-Type: application/json');

        $allowedMethods = array(
            self::METHOD_GET,
            self::METHOD_POST
        );

        $apiListMethods = array(
            'deliverystatus',
            'orderstatus',
            'region',
            'GetPrice'
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

        if (self::METHOD_GET === $method && in_array($path, $apiListMethods)){
            $url = 'https://api.iml.ru/list/';
        } elseif(self::METHOD_GET === $method && !in_array($path, $apiListMethods)){
            $url = 'https://list.iml.ru/';
        }else {
            $url = 'https://api.iml.ru/json/';
        }

        if (self::METHOD_GET === $method){
           $path .= '?' . http_build_query($parameters, '', '&');
        }

        $url = $url . $path;

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        if(self::METHOD_POST === $method){
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
        }

        curl_setopt( $curlHandler, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt( $curlHandler,CURLOPT_USERPWD, $this->auth);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 60);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 60);

        $responseBody = curl_exec($curlHandler);
        $statusCode   = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        $response = new Response($statusCode, $responseBody);

        if (!empty($response['Mess'])) {
            throw new \Exception($response['Mess']);
        }

        return $response;
    }
}
