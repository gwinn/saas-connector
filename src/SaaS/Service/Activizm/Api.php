<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Activizm
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */

namespace SaaS\Service\Activizm;

use SaaS\Http\Response;

/**
 * Activizm api client
 *
 * @package SaaS\Service\Activizm
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class Api
{

    private $client;

    /**
     * Api constructor.
     *
     * @param $clientId
     * @param $secret
     */
    public function __construct($clientId, $secret)
    {
        $this->client = new Request($clientId, $secret);
    }

    /**
     * Get orders list
     *
     * @return Response
     */
    public function getOrders()
    {
        return $this->client->makeRequest('getOrders', array());
    }

    /**
     * Get order by id
     *
     * @param string $id
     *
     * @return Response
     */
    public function getOrder($uid)
    {
        return $this->client->makeRequest('getOrderDetails', array('orderNumber' => $uid));
    }

    /**
     * Get orders statuses
     *
     * @return Response
     */
    public function getOrderStatuses()
    {
        return $this->client->makeRequest('getOrderStatuses');
    }

    /**
     * Get orders delivery types
     *
     * @return Response
     */
    public function getDeliveryTypes()
    {
        return $this->client->makeRequest('getDeliveryTypes');
    }

    /**
     * Get orders payment types
     *
     * @return Response
     */
    public function getPaymentTypes()
    {
        return $this->client->makeRequest('getPaymentTypes');
    }
}
