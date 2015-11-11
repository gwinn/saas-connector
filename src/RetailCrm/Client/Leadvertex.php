<?php

namespace RetailCrm\Client;

use RetailCrm\Interfaces\ClientInterface;
use RetailCrm\Exception\CurlException;

class Leadvertex
{

    private $container;
    private $settings;
    private $log;

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    public function __construct($container)
    {
        $this->container = $container;
        $this->settings = $container->getSettings();
        $this->log = $container->getLog();

        $this->errorLog = $container->getErrorLog();
        $this->exportLog = $container->getLogPath() . 'leadvertex.log';
    }

    public function getOrders()
    {
        return true;
    }

    /**
     * @param array $orders
     * @param string $key
     */
    public function updateStatuses($orders, $key = null)
    {

        foreach ($orders as $order) {
            $this->makeRequest(
                $this->settings['leadvertex'][$key]['url'] . 'updateOrder.html?token=' . $this->settings['leadvertex'][$key]['token'] . '&id=' . $order['externalId'],
                'POST',
                array('status' =>$order['status'])
            );
        }

    }

    /**
     * @param string $key
     * @return mixed
     */
    private function getStatuses($key)
    {
        return $this->makeRequest(
            $this->settings['leadvertex'][$key]['url'] . 'getStatusList.html',
            'GET',
            array('token' => $this->settings['leadvertex'][$key]['token'])
        );

    }

    /**
     * Make HTTP request
     *
     * @param string $path
     * @param string $method (default: 'GET')
     * @param array $parameters (default: array())
     * @param int $timeout
     * @return mixed
     */
    public function makeRequest($path, $method, array $parameters = array(), $timeout = 30)
    {
        $allowedMethods = array(self::METHOD_GET, self::METHOD_POST);
        if (!in_array($method, $allowedMethods)) {
            throw new \InvalidArgumentException(sprintf(
                'Method "%s" is not valid. Allowed methods are %s',
                $method,
                implode(', ', $allowedMethods)
            ));
        }

        if (self::METHOD_GET === $method && sizeof($parameters)) {
            $path .= '?' . http_build_query($parameters);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, (int) $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        if (self::METHOD_POST === $method) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        }

        $responseBody = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($errno) {
            throw new CurlException($error, $errno);
        }

        return array($responseBody, $statusCode);
    }
}
