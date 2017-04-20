<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Service\Insales;

use SaaS\Exception\CurlException;
use SaaS\Exception\InsalesLimitException;
use SaaS\Http\Response;

/**
 * InsalesRequest
 *
 * @category ApiClient
 * @package  SaaS\Service\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    protected $url;

    /**
     * Request constructor.
     *
     * @param array $defaultParameters set of default parameters
     */
    public function __construct($defaultParameters = array())
    {
        foreach ($defaultParameters as $key => $value) {
            if (empty($value)) {
                throw new \InvalidArgumentException(
                    sprintf("parameter %s can not be empty", $key)
                );
            }
        }

        $this->url = sprintf(
            "http://%s:%s@%s",
            $defaultParameters['apiKey'],
            $defaultParameters['password'],
            $defaultParameters['domain']
        );
    }

    /**
     * Make HTTP request
     *
     * @param string $path       exact method url
     * @param string $method     (default: 'GET')
     * @param array  $parameters (default: array())
     * @throws InsalesLimitException
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
            throw new \InvalidArgumentException(
                sprintf(
                    'Method "%s" is not valid. Allowed methods are %s',
                    $method,
                    implode(', ', $allowedMethods)
                )
            );
        }

        $url = $this->url . $path;

        if (self::METHOD_GET === $method) {
            $url .= '?' . http_build_query($parameters);
        }

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_HEADER, true);

        if (self::METHOD_POST === $method
            || self::METHOD_PUT === $method
            || self::METHOD_DELETE === $method
        ) {
            $request_headers = array();
            $request_headers[] = 'Content-Type: application/json';
            $request_headers[] = 'Cache-Control: no-cache';
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $request_headers);
        }

        if (self::METHOD_POST === $method) {
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
        }

        if (self::METHOD_PUT === $method) {
            curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
        }

        if (self::METHOD_DELETE === $method) {
            curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        $responseBody = curl_exec($curlHandler);
        $statusCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        //Получение тела ответа
        $response = trim(substr($responseBody, strripos($responseBody, "\n")));

        //Получение заголовков ответа
        preg_match_all("/(.*): (.*)\n/", $responseBody, $items);
        $responseBody = array_combine($items[1], $items[2]);

        foreach ($responseBody as $key => $item) {
            $responseBody[$key] = trim($item);
        }

        if ($statusCode == 503 && isset($responseBody['Retry-After'])) {
            $message = [
                'message' => 'Requested API limit exceeded',
                'Retry-After' => $responseBody['Retry-After'],
                'API-Usage-Limit' => $responseBody['API-Usage-Limit']
            ];

            throw new InsalesLimitException(json_encode($message), $statusCode);
        }

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return new Response($statusCode, $response);
    }
}
