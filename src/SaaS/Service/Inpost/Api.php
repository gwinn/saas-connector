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
     * Get city list
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

    /**
     * Get parsel status
     *
     * @param string $type
     * @param string $code
     *
     * @throws \InvalidArgumentException
     *
     * @return \SaaS\Http\Response
     */
    public function parselStatus($code, $type = 'json')
    {
        if (empty($code)) {
            throw new \InvalidArgumentException(
                'Parameter `code` must contains a data'
            );
        }

        $url = 'parcelstatus';
        $parameters = array('code' => $code, 'type' => $type);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get parsel statuses list
     *
     * @param string $encoding
     * @param string $type
     *
     * @return \SaaS\Http\Response
     */
    public function parselStatusesList($encoding = 'utf-8', $type = 'json')
    {
        $url = 'parcelstatuses';
        $parameters = array('encoding' => $encoding, 'type' => $type);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Search terminal
     *
     * @param array  $params
     * @param string $type
     *
     * @return \SaaS\Http\Response
     */
    public function searchTerminal($params, $type = 'json')
    {
        $url = 'terminal_search';

        $parameters = array(
            'type' => $type
        );

        if (isset($params['login'])) {
            $parameters['telephonenumber'] = $params['login'];
        }

        if (!empty($params['password'])) {
            $parameters['password'] = $params['password'];
        }

        if (!empty($params['postcode'])) {
            $parameters['postcode'] = $params['postcode'];
        }

        if (!empty($params['city'])) {
            $parameters['city'] = $params['city'];
        }

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }
}
