<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://doc.ticketscloud.org/
 */

namespace SaaS\Connector\Client;

use SaaS\Connector\Http\Request\TicketscloudRequest;

/**
 * TicketscloudClient
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://doc.ticketscloud.org/
 */
class TicketscloudClient
{
    private $client;

    /**
     * Client creating
     *
     * @param  string $token
     * @return mixed
     */
    public function __construct($token)
    {
        $this->client = new TicketscloudRequest($token);
    }

    /**
     * Get event
     *
     * @return Response
     */
    public function eventsGet($uid)
    {
        return $this->client->makeRequest(
            'resources/events/' . $uid,
            TicketscloudRequestMETHOD_GET
        );
    }

    /**
     * Edit event
     *
     * @return Response
     */
    public function eventsEdit($uid)
    {
        return $this->client->makeRequest(
            'resources/events/' . $uid,
            TicketscloudRequestMETHOD_PATCH
        );
    }

    /**
     * Get event
     *
     * @return Response
     */
    public function eventsDelete($uid)
    {
        return $this->client->makeRequest(
            'resources/events/' . $uid,
            TicketscloudRequestMETHOD_DELETE
        );
    }

    /**
     * Get events list
     * @return Response
     */
    public function eventsList(array $parameters = array())
    {
        return $this->client->makeRequest(
            'resources/events',
            TicketscloudRequestMETHOD_GET,
            $parameters
        );
    }

    /**
     * Get events list by service
     * @return Response
     */
    public function eventsServiceList(array $parameters = array())
    {
        return $this->client->makeRequest(
            'services/simple/events',
            TicketscloudRequestMETHOD_GET,
            $parameters
        );
    }

    /**
     * Get orderss list
     * @return Response
     */
    public function ordersList(array $parameters = array())
    {
        return $this->client->makeRequest(
            'resources/orders',
            TicketscloudRequestMETHOD_GET,
            $parameters
        );
    }
}
