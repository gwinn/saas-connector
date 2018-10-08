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
    public function __construct($login, $password)
    {
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
     *
     * @throws \Exception|CurlException
     */
    public function makeRequest($path, $method, array $parameters = array(), $version = false){

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

        $apiLongTimeMethods = array(
            'PostCode'
        );

        $apiJsonMethods = array(
            'PrintBar'
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

        $timeouts = 60;

        if (in_array($path, $apiLongTimeMethods) && empty($parameters)) {
            $timeouts = 600;
        }

        $url = 'https://api.iml.ru/json/';
        $needByte = false;

        if (self::METHOD_GET === $method) {
            if (!in_array($path, $apiJsonMethods)) {
                if ($version) {
                    $url = "https://api.iml.ru/{$version}/";
                } elseif (in_array($path, $apiListMethods)) {
                    $url = 'https://api.iml.ru/list/';
                } elseif (!in_array($path, $apiListMethods)) {
                    $url = 'https://list.iml.ru/';
                }
            } else {
                $needByte = true;
            }

            $path .= '?' . http_build_query($parameters, '', '&');
        }

        $url = $url . $path;

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        if (self::METHOD_POST === $method) {
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
        }

        curl_setopt($curlHandler, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curlHandler, CURLOPT_USERPWD, $this->auth);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, $timeouts);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, $timeouts);

        $responseBody = curl_exec($curlHandler);
        $statusCode   = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        if ($statusCode >= 500) {
            throw new \Exception(
                sprintf(
                    'Error on the IML server: [%s]',
                    (is_string($responseBody) ?
                        $responseBody :
                        (json_encode($responseBody) ?:
                            sprintf(
                                '|Error encode json: code = "%s" / message = "%s"|',
                                json_last_error(),
                                json_last_error_msg()
                            )
                        )
                    )
                ),
                $statusCode
            );
        }

        if ($statusCode >= 400) {
            $result = json_decode($responseBody, true);

            if (is_array($result['Errors'])) {
                array_walk($result['Errors'], function(&$item, $key){
                    if (is_array($item)) {
                        $item = implode(', ', $item);
                    }
                });
            }

            throw new \Exception(
                (is_array($result['Errors']) ? implode('; ', $result['Errors']) : $result['Errors']),
                $statusCode
            );
        }

        if ($needByte) {
            return $responseBody;
        }

        $response = new Response($statusCode, $responseBody);

        if (!empty($response['Mess'])) {
            throw new \Exception($response['Mess']);
        }

        return $response;
    }
}
