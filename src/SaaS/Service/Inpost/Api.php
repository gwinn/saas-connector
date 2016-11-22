<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Inpost
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://wt.inpost.ru/
 */
namespace SaaS\Service\Inpost;

/**
 * Inpost API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Inpost
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://wt.inpost.ru/
 */
class Api
{

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->client = new Request();
    }

    /**
     * Get catalog categories list
     *
     * @param string $type
     * @param string $encoding
     *
     * @return \SaaS\Http\Response
     */
    public function cityList($type = 'json', $encoding = 'utf-8')
    {
        $url = 'citylist';
        $parameters = array('type' => $type, 'encoding' => $encoding);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }
}
