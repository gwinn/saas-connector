<?php

use RetailCrm\Interfaces\ClientInterface;

class Ticketcloud implements ClientInterface
{
    /*
     * API Url
     */
    const URL = 'http://ticketcloud.org/v1/resources/';

    /*
     * HTTP Methods
     */
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    /*
     * API Key
     * @var string
     * @access protected
     */
    protected $apiKey;

    /**
     * Acceptable methods
     * @var array
     * @access private
     */
    private $allowable = array(
        'get' => array(
            'attachment', 'attachments', 'cities', 'countries', 'deals',
            'events', 'orders', 'partners', 'users', 'venues'
        ),
        'post' => array(
            'attachments', 'deals', 'events', 'partners', 'users', 'venues'
        ),
        'delete' => array(
            'events', 'orders', 'partners', 'users', 'venues'
        ),
        'patch' => array(
           'deals', 'events', 'orders', 'partners', 'users', 'venues'
        )
    );
}