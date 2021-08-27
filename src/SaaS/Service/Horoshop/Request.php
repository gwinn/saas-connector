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
use SaaS\Exception\HoroshopLimitException;
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

    /**
     * Client constructor.
     *
     * @param string $domain Domain client
     */
    public function __construct($domain)
    {
        $this->url = sprintf('%s/api/', rtrim($domain, "/"));
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
     * @throws HoroshopLimitException
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

        if (self::METHOD_GET === $method && count($parameters)) {
            $url .= '?' . http_build_query($parameters, '', '&');
        }

        $curlHandler = curl_init();
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlHandler, CURLOPT_POSTREDIR, 1);
        curl_setopt($curlHandler, CURLOPT_UNRESTRICTED_AUTH, true);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 180);
        curl_setopt($curlHandler, CURLOPT_HEADER, true);
        curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, $method);

        if (self::METHOD_POST == $method || self::METHOD_PUT == $method) {
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        }

        if (self::METHOD_POST === $method) {
            curl_setopt($curlHandler, CURLOPT_POST, true);
        }

        $result = curl_exec($curlHandler);
        //Получение заголовков ответа
        $responseBody = $this->headersToArray($result);
        $statusCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
        //Получение тела ответа
        $response = isset($responseBody['body']) ? $responseBody['body'] : '';

        if ($statusCode == 429) {
            $message = array(
                'message' => 'Requested API limit exceeded',
                'Retry-After' => isset($responseBody['Retry-After']) ? $responseBody['Retry-After'] : 0
            );

            throw new HoroshopLimitException(json_encode($message), $statusCode);
        }

        // При успешной отписке от вебхука Хорошоп возвращает код 410
        if (410 === $statusCode && false !== strpos($response, 'OK')) {
            $statusCode = 200;
        }

        $errno = curl_errno($curlHandler);
        $error = curl_error($curlHandler);

        curl_close($curlHandler);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return new Response($statusCode, $response);
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
