<?php

namespace SaaS\Http;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClient extends Client implements ClientInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function sendRequest(RequestInterface $request)
    {
        $options[RequestOptions::SYNCHRONOUS] = true;
        $options[RequestOptions::ALLOW_REDIRECTS] = false;
        $options[RequestOptions::HTTP_ERRORS] = false;
        $options[RequestOptions::CONNECT_TIMEOUT] = 10;
        $options[RequestOptions::TIMEOUT] = 30;

        return $this->sendAsync($request, $options)->wait();
    }
}