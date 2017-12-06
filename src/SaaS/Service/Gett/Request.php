<?php
/**
 * PHP version 5.3
 *
 * @category Gett
 * @package SaaS\Service\Gett
 * @author Vasyagin Sergey <vasyagin@intaro.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
namespace SaaS\Service\Gett;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * Gett request class
 *
 * @category Gett
 * @package SaaS\Service\Gett
 * @author Vasyagin Sergey <vasyagin@intaro.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class Request
{
    // Work API URL
    const WORK_URL = 'https://rides.gett.com/api/v1';

    // Test API URL
    const TEST_URL = 'https://rides.gett.com/sandbox/api/v1';

    /**
     * @var bool Test mode or not
     */
    protected $isTestMode;

    /**
     * Class constructor
     *
     * @param bool $isTestMode Enable/disable test mode
     */
    public function __construct(bool $isTestMode = false)
    {
        $this->isTestMode = $isTestMode;
    }

    /**
     * Make HTTP request
     *
     * @param string $token security token
     * @param string $path request url
     * @param string $method method request
     * @param mixed $parameters (default: array())
     * @param array $addHeaders (default: array())
     *
     * @return \SaaS\Http\Response
     */
    public function makeRequest(
        $token,
        $path,
        $method,
        $parameters = array(),
        $addHeaders = array('Content-Type: application/json')
    ) {
        $headers = array();

        if (!empty($token)) {
            $headers = array(
                'Authorization: Bearer ' . $token
            );
        }

        $allowedMethods = array(
            'GET',
            'POST',
            'PATCH',
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

        $url = $this->getUrl() . $path;
        $curlHandler = curl_init();

        $headers = array_merge($headers, $addHeaders);

        if ('GET' === $method && is_array($parameters) && !empty($parameters)) {
            $url .= '?' . http_build_query($parameters);
        }

        if ('POST' === $method || 'PATCH' === $method) {
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
            if ('POST' === $method) {
                curl_setopt($curlHandler, CURLOPT_POST, true);
            } else {
                curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, 'PATCH');
            }
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $parameters);
        }

        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, 30);

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

    /**
     * Gets a basic url for the request
     *
     * @return string
     */
    protected function getUrl()
    {
        return $this->isTestMode ? self::TEST_URL : self::WORK_URL;
    }
}
