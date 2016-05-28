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
    public function getCategories()
    {
        $url = "/admin/categories.json";

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get catalog category info
     *
     * @param string $categoryId category identificator
     *
     * @return Response
     */
    public function getCategory($categoryId)
    {
        $url = "/admin/categories/$categoryId.json";

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }
}
