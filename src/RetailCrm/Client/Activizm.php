<?php

namespace RetailCrm\Client;

use RetailCrm\Interfaces\ClientInterface;
use RetailCrm\Component\Utils;

class Activizm implements ClientInterface
{

    private $container;
    private $settings;
    private $log;

    public function __construct($container)
    {
        $this->container = $container;
        $this->settings = $container->getSettings();
        $this->log = $container->getLog();

        $this->errorLog = $container->getErrorLog();
        $this->exportLog = $container->getLogPath() . 'activizm.log';
    }

    public function getOrders()
    {
        $ordersData = array();
        $lastOrder = Utils::getData($this->exportLog);
        $response = $this->getRequest('getOrders', array());

        if ($lastOrder == false || $lastOrder = ''){
            $orders = array_slice($response['result'], 0, 5);
        } else {
            $lastOrder = str_replace("\n", "", $lastOrder);
            $orders = array_slice(
                $response['result'],
                0,
                array_search($lastOrder, $response['result'])
            );
        }

        if (!empty($orders)) {
            foreach ($orders as $order) {
                $oData = $this->getRequest('getOrderDetails', array('orderNumber' => $order));
                $ordersData[] = $oData['result'];
            }
        }

        Utils::saveData(array_shift(array_values($orders)),  $this->exportLog);

        return $ordersData;

    }

    public function updateStatuses($orders)
    {
        var_dump($orders);
    }

    public function getOrderStatuses()
    {
        return $this->getRequest('getOrderStatuses');
    }

    public function getDeliveryTypes()
    {
        return $this->getRequest('getDeliveryTypes');
    }

    public function getPaymentTypes()
    {
        return $this->getRequest('getPaymentTypes');
    }

    private function getRequest($method, $params = array())
    {
        $connection = $this->settings['activizm'];

        $url   = $connection['url'];
        $login = $connection['id'];
        $pass  = $connection['secret'];

        $request['method'] = $method;
        $request['params'] = $params;

        $headers            = array();
        $headers[]          = 'Content-Type: application/json';
        $headers[]          = sprintf("Authorization: Basic %s", base64_encode(sprintf("%s:%s", $login, $pass)));
        $request['jsonrpc'] = '2.0';
        $request['id']      = 1;
        $json               = json_encode($request);
        $opts               = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => implode("\r\n", $headers),
                'content' => $json,
            ),
        );
        $context            = stream_context_create($opts);
        $response           = file_get_contents($url, false, $context);

        if ($response === false) {
            return $this->log->addError('GetOrders::Activizm: unable connect');
        } else {
            return $decodedResponse = json_decode($response, true);
        }
    }
}


