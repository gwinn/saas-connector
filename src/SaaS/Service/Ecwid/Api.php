<?php

/**
 * PHP version 5.3
 *
 * @category Ecwid
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://api.ecwid.com/
 */
namespace SaaS\Service\Ecwid;

use SaaS\Http\Response;

/**
 * Ecwid api class
 *
 * @category Ecwid
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://api.ecwid.com/
 */
class Api
{

    protected $storeId;
    protected $client;

    /**
     * Constructor
     *
     * @param string $storeId shop id
     * @param string $apiKey  api key
     */
    public function __construct($storeId, $apiKey)
    {
        $this->storeId = $storeId;
        $this->client = new Request(array('token' => $apiKey));
    }

    /**
     * Get product categories
     *
     * @param array $params input params
     *
     * @return Response
     */
    public function getCategories(array $params = array())
    {
        $url = $this->storeId . "/categories";

        return $this->client->makeRequest($url, Request::METHOD_GET, $params);
    }

    /**
     * Get product category
     *
     * @param string $categoryId category ID
     *
     * @return Response
     */
    public function getCategory($categoryId)
    {
        $url = $this->storeId . '/categories/' . $categoryId;
        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create product category
     *
     * @param array $params input params
     *
     * @return Response
     */
    public function createCategory(array $params = array())
    {
        $url = $this->storeId . '/categories';

        return $this->client->makeRequest($url, Request::METHOD_POST, $params);
    }

    /**
     * Get products
     *
     * @param array $filter search filter
     *
     * @return Response
     */
    public function getProducts(array $filter = array())
    {
        $url = $this->storeId . "/products";

        return $this->client->makeRequest($url, Request::METHOD_GET, $filter);
    }

    /**
     * Get orders
     *
     * @param array $filter search filter
     *
     * @return Response
     */
    public function getOrders(array $filter = array())
    {
        $url = $this->storeId . "/orders";

        return $this->client->makeRequest($url, Request::METHOD_GET, $filter);
    }

    /**
     * Get order details
     *
     * @param string $orderId order ID
     *
     * @return Response
     */
    public function getOrder($orderId)
    {
        $url = $this->storeId . "/orders/" . $orderId;

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create order
     *
     * @param array $order order data
     *
     * @return Response
     */
    public function createOrder($order)
    {
        $url = $this->storeId . "/orders";
        $data = $this->normalizeFields(json_encode($order, JSON_UNESCAPED_UNICODE));
        $params = array('data' => $data);

        return $this->client->makeRequest($url, Request::METHOD_POST, $params);
    }

    /**
     * Update order
     *
     * @param string $orderId order ID
     * @param array  $order   order data
     *
     * @return Response
     */
    public function updateOrder($orderId, $order)
    {
        $url = $this->storeId . "/orders/" . $orderId;
        $data = $this->normalizeFields(json_encode($order, JSON_UNESCAPED_UNICODE));
        $params = array('data' => $data);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $params);
    }

    /**
     * Delete order
     *
     * @param array $orderId order ID
     *
     * @return Response
     */
    public function deleteOrder($orderId)
    {
        $url = $this->storeId . "/orders/" . $orderId;

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Field normalization
     *
     * @param string $json input data
     *
     * @return mixed
     */
    protected function normalizeFields($json)
    {
         $json = preg_replace(
             "/(subtotal|total\"\:)(\")([0-9.]*)(\")(,)/",
             "$1$3$5",
             $json
         );

         $json = preg_replace(
             "/(discount\"\:)(\")([0-9.]*)(\")(,)/",
             "$1$3$5",
             $json
         );

         $json = preg_replace(
             "/(shippingRate\"\:)(\")([0-9.]*)(\")(,)/",
             "$1$3$5",
             $json
         );

         $json = preg_replace(
             "/(price\"\:)(\")([0-9.]*)(\")(,)/",
             "$1$3$5",
             $json
         );

         $json = preg_replace(
             "/(quantity\"\:)(\")([0-9.]*)(\")(,)/",
             "$1$3$5",
             $json
         );

         return $json;
    }
}
