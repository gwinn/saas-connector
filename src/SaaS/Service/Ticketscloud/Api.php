<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Ticketscloud
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-Service
 * @see http://doc.ticketscloud.org/
 */

namespace SaaS\Service\Ticketscloud;

use SaaS\Http\Response;

/**
 * Ticketscloud api client
 *
 * @package SaaS\Service\Ticketscloud
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-Service
 * @see http://doc.ticketscloud.org/
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
     * Get event
     *
     * @param $uid
     *
     * @return Response
     */
    public function eventsGet($uid)
    {
        return $this->client->makeRequest(
            'resources/events/' . $uid,
            Request::METHOD_GET
        );
    }

    /**
     * Edit event
     *
     * @param $uid
     *
     * @return Response
     */
    public function eventsEdit($uid)
    {
        return $this->client->makeRequest(
            'resources/events/' . $uid,
            Request::METHOD_PATCH
        );
    }

    /**
     * Get event
     *
     * @param $uid
     *
     * @return Response
     */
    public function eventsDelete($uid)
    {
        return $this->client->makeRequest(
            'resources/events/' . $uid,
            Request::METHOD_DELETE
        );
    }

    /**
     * Get events list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function eventsList(array $parameters = array())
    {
        return $this->client->makeRequest(
            'resources/events',
            Request::METHOD_GET,
            $parameters
        );
    }

    /**
     * Get events list by service
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function eventsServiceList(array $parameters = array())
    {
        return $this->client->makeRequest(
            'services/simple/events',
            Request::METHOD_GET,
            $parameters
        );
    }

    /**
     * Get orderss list
     *
     * @param array $parameters
     *
     * @return Response
     */
    public function ordersList(array $parameters = array())
    {
        return $this->client->makeRequest(
            'resources/orders',
            Request::METHOD_GET,
            $parameters
        );
    }
}
