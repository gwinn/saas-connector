<?php

/**
 * PHP version 5.3
 *
 * HTTP request class
 *
 * @category Horoshop
 * @package  Saas
 * @author   RetailCrm <integration@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://goo.gl/gBlC0T
 */

namespace SaaS\Service\Horoshop;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * PHP version 5.3
 *
 * Horoshop request class
 *
 * @category Horoshop
 * @package  Horoshop
 * @author   RetailCrm <integration@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://goo.gl/gBlC0T
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    protected $url;
    protected $onHttps = null;

    /**
     * Client constructor.
     *
     * @param string $domain Domain client
     */
    public function __construct($domain)
    {
        $this->url = sprintf('%s/api/', $domain);
    }

    /**
     * Make HTTP request
     *
     * @param string $path       request url
     * @param string $method     (default: 'GET')
     * @param array  $parameters (default: array())
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     *
     * @throws \InvalidArgumentException
     * @throws CurlException
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

        if (!empty($this->onHttps) && $this->onHttps === true) {
            $url = str_replace('http://', 'https://', $url);
        }

        if (self::METHOD_GET === $method && count($parameters)) {
            $url .= '?' . http_build_query($parameters, '', '&');
        }

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 180);
        curl_setopt($curlHandler, CURLOPT_HEADER, true);

        if (self::METHOD_POST === $method) {
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $parameters);
        }

        if (self::METHOD_PUT === $method) {
            curl_setopt(
                $curlHandler,
                CURLOPT_POSTFIELDS,
                json_encode($parameters)
            );

            curl_setopt(
                $curlHandler,
                CURLOPT_HTTPHEADER,
                array('Content-Type:application/json')
            );
        }

        $headers = curl_exec($curlHandler);

        if ($this->onHttps == true && curl_getinfo($curlHandler, CURLINFO_SSL_VERIFYRESULT) !== 0) {
            $this->onHttps = false;

            return $this->makeRequest($path, $method, $parameters);
        }

        $headers = $this->headersToArray($headers);
        $responseBody = isset($headers['body']) ? $headers['body'] : '';

        if (empty($this->onHttps)) {
            $this->onHttps = array_key_exists('Content-Security-Policy-Report-Only', $headers)
                && strstr($headers['Content-Security-Policy-Report-Only'], 'https');
        }

        $statusCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return new Response($statusCode, $responseBody);
    }

    /**
     * Parse headers
     *
     * @param string $allHeaders
     *
     * @return array
     */
    private function headersToArray($allHeaders)
    {
        $allHeaders = explode(PHP_EOL, $allHeaders);
        $resultHeaders[] = array_shift($allHeaders);
        $resultHeaders['body'] = array_pop($allHeaders);

        foreach ($allHeaders as $item) {
            $item = explode(': ', $item);

            if (count($item) > 2) {
                $key = array_shift($item);
                $resultHeaders[$key] = implode(': ', $item);
            } elseif (count($item) == 2) {
                $resultHeaders[$item[0]] = $item[1];
            }
        }

        return $resultHeaders;
    }
}
