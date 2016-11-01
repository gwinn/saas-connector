<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Tiu
 * @author   Segey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * 
 */
namespace SaaS\Service\Tiu;

use SaaS\Http\Response;

/**
 * Tiu API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Tiu
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * 
 */
class Api
{
    private $client;
    
    /**
     * Ticketscloud creating
     *
     * @param  string $token
     *
     * @return mixed
     */
    public function __construct($token)
    {
        $this->client = new Request($token);
    }
    
    /**
     * Get orders list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function ordersList(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/orders/list',
            Request::METHOD_GET,
            $parameters
        );
    }
    
    /**
     * Set orders status
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function ordersSetStatus(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/orders/set_status',
            Request::METHOD_POST,
            $parameters
        );
    }
    
    /**
     * Get orders by id
     *
     * @param $id
     *
     * @return Response
     */
    public function getOrderId($id)
    {
        $path = sprintf('/orders/%s', $id);

        return $this->client->makeRequest($path, Request::METHOD_GET);
        
    }
    /**
     * Get clients list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function clientsList(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/clients/list',
            Request::METHOD_GET,
            $parameters
        );
    }
    /**
     * Get clients by id
     *
     * @param array $id
     *
     * @return Response
     */
    public function getClientsId($id)
    {
        $path = sprintf('/clients/%s', $id);

        return $this->client->makeRequest($path, Request::METHOD_GET);
        
    }
    
    /**
     * Get prodicts list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function productsList(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/products/list',
            Request::METHOD_GET,
            $parameters
        );
    }
    
    /**
     * Get products by id
     *
     * @param $id
     *
     * @return Response
     */
    public function getProductsId($id)
    {
        $path = sprintf('/products/%s', $id);

        return $this->client->makeRequest($path, Request::METHOD_GET);
    }
    /**
     * Get products by externalId
     *
     * @param $id
     *
     * @return Response
     */
    public function getProductsExternalId($id)
    {
        $path = sprintf('/products/by_external_id/%s', $id);

        return $this->client->makeRequest($path, Request::METHOD_GET);
    }
    
    /**
     * Edit product list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function productEdit(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/products/edit',
            Request::METHOD_POST,
            $parameters
        );
    }
    
    
    /**
     * Edit product by externalId
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function productEditExternalId(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/products/edit_by_external_id',
            Request::METHOD_POST,
            $parameters
        );
    }
    
    /**
     * Import products by reference to the Excel file
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function productsImportExel(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/products/import_url',
            Request::METHOD_POST,
            $parameters
        );
    }
    
   /**
     * check status imports product 
     *
     * @param $importId
     *
     * @return Response
     */
    public function checkImportStatus($importId)
    {
        $path = sprintf('/products/import/status/%s', $importId);

        return $this->client->makeRequest($path, Request::METHOD_GET);
    }

    /**
     * Get groups list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function groupsList(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/groups/list',
            Request::METHOD_GET,
            $parameters
        );
    }
    /**
     * Get payment list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function paymentList(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/payment_options/list',
            Request::METHOD_GET,
            $parameters
        );
    }
    
    
    /**
     * Get message list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function getMessagesList(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/messages/list',
            Request::METHOD_GET,
            $parameters
        );
    }
    
    /**
     * Get message by id
     *
     * @param $id
     *
     * @return Response
     */
    public function getMessagesId($id)
    {
        $path = sprintf('/messages/%s', $id);

        return $this->client->makeRequest($path, Request::METHOD_GET);
    }
    /**
     * Set messages status
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function messagesSetStatus(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/messages/set_status',
            Request::METHOD_POST,
            $parameters
        );
    }
     /**
     * Send reply for message id
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function messagesReply(array $parameters = array())
    {
        return $this->client->makeRequest(
            '/messages/reply',
            Request::METHOD_POST,
            $parameters
        );
    }
}
 