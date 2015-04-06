<?php

namespace RetailCrm\Client;

use RetailCrm\Interfaces\ClientInterface;
use RetailCrm\Component\Utils;
use Wikimart\MerchantAPIClient\Client;

class Wikimart implements ClientInterface
{

    protected $logger;
    protected $settings;
    protected $errorLog;
    protected $historyLog;

    public function __construct($settings, $logger)
    {
        $this->settings   = $settings;
        $this->logger     = $logger->getLog();
        $this->errorLog   = $logger->getErrorLog();
        $this->historyLog = $logger->getHistoryLog();
        $this->exportLog  = $logger->getLogPath() . 'wikimart' .$settings['id'] . '.log';
    }

    public function getOrders()
    {
        $lastOrder = new \DateTime(Utils::getDate($this->exportLog));
        $_settings = $this->settings;
        $wikimartClient = new Client('http://merchant.wikimart.ru', $_settings['id'], $_settings['secret']);
        $preOrders = $wikimartClient->methodGetOrderList(20, 1, 'opened', $lastOrder, null, null)->getData()->orders;

        foreach ($preOrders as $order) {
            $wikimartClient->methodSetOrderStatus($order->id, $wikimartClient::STATUS_CONFIRMED, 1, '');
        }

        $orders = $wikimartClient->methodGetOrderList(20, 1, 'confirmed', $lastOrder, null, null)->getData()->orders;

        Utils::saveData(date('Y-m-d H:i:s'), $this->exportLog);

        return $orders;

    }

    public function updateStatuses($orders)
    {
        return true;
    }

    public function getOrderStatuses()
    {
        return array(
            array('id' => 'opened', 'title' => 'Opened'),
            array('id' => 'canceled', 'title' => 'Canceled'),
            array('id' => 'rejected', 'title' => 'Rejected'),
            array('id' => 'confirmed', 'title' => 'Confirmed'),
            array('id' => 'annuled', 'title' => 'Annuled'),
            array('id' => 'invalid', 'title' => 'Invalid'),
            array('id' => 'faked', 'title' => 'Faked')
        );

    }

    public function getDeliveryTypes()
    {
        return array(
            'Самовывоз' => 'Самовывоз',
            'Курьерская доставка' => 'Курьерская доставка',
            'Доставка по России' => 'Доставка по России'
        );
    }

    public function getPaymentTypes()
    {
        return array(
            'cash' => 'cash'
        );
    }
}


