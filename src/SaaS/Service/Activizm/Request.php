<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Activizm
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */

namespace SaaS\Service\Activizm;

use SaaS\Exception\CurlException;
use SaaS\Http\Response;

/**
 * Activizm request class
 *
 * @package SaaS\Service\Activizm
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class Request
{
    const METHOD_POST = 'POST';

    private $url;
    private $token;
    private $client;

    /**
     * Request constructor.
     *
     * @param $clientId
     * @param $token
     */
    public function __construct($clientId, $token)
    {
        $this->url    = 'https://activizm.ru/api/v1';
        $this->token  = $token;
        $this->client = $clientId;
    }

    /**
     * Make HTTP request
     *
     * @param string $method API method
     * @param array $params (default: array())
     *
     * @todo rewrite with curl
     *
     * @return Response
     */
    public function makeRequest($method, $params = array())
    {

        $request['method'] = $method;
        $request['params'] = $params;

        $headers            = array();
        $headers[]          = 'Content-Type: application/json';
        $headers[]          = sprintf(
            "Authorization: Basic %s",
            base64_encode(sprintf("%s:%s", $this->client, $this->token))
        );

        $request['jsonrpc'] = '2.0';
        $request['id']      = 1;

        $json               = json_encode($request);

        $opts               = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => implode("\r\n", $headers),
                'content' => $json,
            ),
        );

        $context            = stream_context_create($opts);
        $response           = file_get_contents($this->url, false, $context);

        return $response;
    }
}
