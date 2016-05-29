<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Service\Insales;

use SaaS\Http\Response;

/**
 * InSales API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class Api
{

    /**
     * Constructor
     *
     * @param string $apiKey   api key value
     * @param string $password password value
     * @param string $domain   InSales internal domain
     */
    public function __construct($apiKey, $password, $domain)
    {
        $this->client = new Request(
            array(
                'apiKey' => $apiKey,
                'password' => $password,
                'domain' => $domain
            )
        );
    }

    /**
     * Get catalog categories list
     *
     * @return Response
     */
    public function categoriesList()
    {
        $url = '/admin/categories.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get catalog category info
     *
     * @param string $categoryId category identificator
     *
     * @return Response
     */
    public function categoriesGet($categoryId)
    {
        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create catalog category
     *
     * @param array $category category data
     *
     * @return Response
     */
    public function categoriesCreate($category)
    {
        $url = '/admin/categories.json';
        $parameters = array('category' => $category);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update catalog category
     *
     * @param array $category category data
     *
     * @return Response
     */
    public function categoriesUpdate($category)
    {
        if (empty($category['id'])) {
            throw new \InvalidArgumentException("Category id must be set");
        }

        $url = '/admin/categories.json';
        $parameters = array('category' => $category);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete catalog category
     *
     * @param string $categoryId category id
     *
     * @return Response
     */
    public function categoriesDelete($categoryId)
    {
        if (empty($categoryId)) {
            throw new \InvalidArgumentException("Category id must be set");
        }

        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }
}
