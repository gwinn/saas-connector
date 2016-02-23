<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Orderino
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://ru.orderino.com/api.html
 */

namespace SaaS\Service\Orderino;

use SaaS\Http\Response;

/**
 * Orderino api client
 *
 * @package SaaS\Service\Orderino
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://ru.orderino.com/api.html
 */
class Api
{

    private $defaultParameters;
    private $client;

    /**
     * Api constructor.
     *
     * @param $companyId
     * @param $accountId
     * @param $apiKey
     */
    public function __construct($companyId, $accountId, $apiKey)
    {
        $this->defaultParameters = array(
            'id' => $accountId,
            'key' => $apiKey
        );

        $this->client = new Request(array('companyId' => $companyId));
    }

    /**
     * @param array $params
     *
     * @return Response
     */
    public function customersList(array $params = array())
    {
        $url = "customers/list";

        $params = array_merge(
            $this->defaultParameters,
            $params
        );

        return $this->client->makeRequest($url, Request::METHOD_GET, $params);
    }

    /**
     * @param array $params
     *
     * @return Response
     */
    public function ordersList(array $params = array())
    {
        $url = "orders/list";

        $params = array_merge(
            $this->defaultParameters,
            $params
        );

        return $this->client->makeRequest($url, Request::METHOD_GET, $params);
    }

    /**
     * @param array $params
     *
     * @return Response
     */
    public function ordersDetails(array $params = array())
    {
        $url = "orders/detail";

        $params = array_merge(
            $this->defaultParameters,
            $params
        );

        return $this->client->makeRequest($url, Request::METHOD_GET, $params);
    }

    /**
     * @param array $params
     *
     * @return Response
     */
    public function productsList(array $params = array())
    {
        $url = "products/list";

        $params = array_merge(
            $this->defaultParameters,
            $params
        );

        return $this->client->makeRequest($url, Request::METHOD_GET, $params);
    }

}
