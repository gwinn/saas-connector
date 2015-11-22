<?php

namespace SaaS\Connector\Test;

use SaaS\Connector\Client\EcwidClient;
use SaaS\Connector\Client\TicketscloudClient;
use SaaS\Connector\Client\ActivizmClient;
use SaaS\Connector\Client\LeadvertexClient;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Return EcwidClient object
     *
     * @param  string $client (default: null)
     * @param  string $token (default: null)
     *
     * @return mixed
     */
    public static function getEcwidClient($client = null, $token = null)
    {
            return new EcwidClient(
                $client ?: getenv('ECWID_CLIENT'),
                $token ?: getenv('ECWID_SECRET')
            );
    }

    /**
     * Return TicketscloudClient object
     *
     * @param  string $token (default: null)
     *
     * @return mixed
     */
    public static function getTicketscloudClient($token = null)
    {
            return new TicketscloudClient($token ?: getenv('TICKETSCLOUD_SECRET'));
    }

    /**
     * Return ActivizmClient object
     *
     * @param  string $client (default: null)
     * @param  string $token (default: null)
     *
     * @return mixed
     */
    public static function getActivizmClient($client = null, $token = null)
    {
            return new ActivizmClient(
                $client ?: getenv('ACTIVIZM_CLIENT'),
                $token ?: getenv('ACTIVIZM_SECRET')
            );
    }

    /**
     * Return LeadvertexClient object
     *
     * @param  string $client (default: null)
     * @param  string $token (default: null)
     *
     * @return mixed
     */
    public static function getLeadvertexClient($client = null, $token = null)
    {
            return new LeadvertexClient(
                $client ?: getenv('LEADVERTEX_CLIENT'),
                $token ?: getenv('LEADVERTEX_SECRET')
            );
    }
}
