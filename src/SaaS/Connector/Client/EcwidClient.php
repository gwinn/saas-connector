<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://api.ecwid.com/
 */

namespace SaaS\Connector\Client;

use SaaS\Connector\Http\Request\EcwidRequest;

/**
 * EcwidClient
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://api.ecwid.com/
 */
class EcwidClient
{

    private $storeId;
    private $client;

    /**
     * @param string $storeId
     * @param string $apiKey
     */
    public function __construct($storeId, $apiKey)
    {
        $this->storeId = $storeId;
        $this->client = new EcwidRequest(array('token' => $apiKey));
    }

    /**
     * Get product categories
     *
     * @param string $offset
     * @param string $limit
     * @param string $parent
     * @param mixed  $hidden
     * @param mixed  $productIds
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function getCategories(
        $offset = null,
        $limit = null,
        $parent = null,
        $hidden = true,
        $productIds = false
    ) {
        $url = $this->storeId . "/categories";
        $params = array(
            'offset' => $offset,
            'limit' => $limit,
            'parent' => $parent,
            'hidden' => $hidden,
            'productIds' => $productIds
        );

        return $this->client->makeRequest($url, EcwidRequest::METHOD_GET, $params);
    }

    /**
     * Get product category
     *
     * @param string $categoryId
     *
     * @return Response
     */
    public function getCategory($categoryId)
    {
        $url = $this->storeId . '/categories/' . $categoryId;
        return $this->client->makeRequest($url, EcwidRequest::METHOD_GET);
    }

    /**
     * Create product category
     *
     * @param string $offset
     * @param string $limit
     * @param string $parent
     * @param mixed  $hidden
     * @param mixed  $productIds
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function createCategory(
        $name,
        $parentId = null,
        $orderBy = null,
        $description = null,
        $enabled = true,
        array $productIds = array()
    ) {
        $url = $this->storeId . '/categories';
        $params = array(
            'name' => $name,
            'parentId' => $parentId,
            'orderBy' => $orderBy,
            'description' => $description,
            'productIds' => $productIds
        );

        return $this->client->makeRequest($url, EcwidRequest::METHOD_POST, $params);
    }
}
