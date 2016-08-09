<?php

/**
 * PHP version 5.3
 *
 * @category Activizm
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://activizm.ru
 */
namespace SaaS\Service\Activizm;

use SaaS\Http\Response;

/**
 * Activizm request class
 *
 * @category Activizm
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://activizm.ru
 */
class Request
{
    const METHOD_POST = 'POST';

    protected $url;
    protected $token;
    protected $client;

    /**
     * Request constructor.
     *
     * @param string $clientId client ID
     * @param string $token    secret token
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
     * @param array  $params (default: array())
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
