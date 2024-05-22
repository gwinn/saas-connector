<?php

namespace SaaS\Service\Courierist;

use Psr\Http\Client\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleClient;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SaaS\Service\Courierist\Model\Request\Auth\AuthRequest;
use SaaS\Service\Courierist\Model\Request\OrderCalculate\OrderCalculateRequest;
use SaaS\Service\Courierist\Model\Request\OrderCreate\OrderCreateRequest;
use SaaS\Service\Courierist\Model\Request\OrderStatusUpdate\OrderStatusRequest;
use SaaS\Service\Courierist\Model\Request\RequestModel;
use SaaS\Service\Courierist\Model\Response\Auth\AuthResponse;
use SaaS\Service\Courierist\Model\Response\OrderGet\OrderGetResponse;
use SaaS\Service\Courierist\Model\Response\OrderCalculate\OrderCalculateResponse;
use SaaS\Service\Courierist\Model\Response\OrderCreate\OrderCreateResponse;
use SaaS\Service\Courierist\Model\Response\OrderDelete\OrderDeleteResponse;
use SaaS\Service\Courierist\Model\Response\OrderStatusUpdate\OrderStatusUpdateResponse;
use SaaS\Service\Courierist\Model\Response\ResponseModel;

class Client
{
    /**
     * @var string
     */
    protected $baseUrl = 'https://my.courierist.com/api/v1/';
    /**
     * @var GuzzleClient
     */
    protected $client;
    /**
     * @var string
     */
    private $token;
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * Client constructor.
     *
     * @param string $login courierist account login
     * @param string $password courierist account password
     * @param GuzzleClient $client Http Client
     */
    public function __construct($login, $password, GuzzleClient $client)
    {
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build()
        ;
        $this->client = $client;
        $this->auth($login, $password);
    }

    /**
     * @param string $login
     * @param string $password
     */
    private function auth($login, $password)
    {
        $request = new AuthRequest();
        $request->login = $login;
        $request->password = $password;
        $request = $this->buildPostRequest('access/login', $request);
        $response = $this->sendRequest($request);
        $response = $this->deserializeResponse(
            $response,
            get_class(new AuthResponse())
        );
        $this->token = $response->accessToken;
    }

    /**
     * @param OrderCalculateRequest $requestData
     * @return OrderCalculateResponse
     */
    public function orderCalculate(OrderCalculateRequest $requestData)
    {
        $request = $this->buildPostRequest('order/evaluate', $requestData);
        $response = $this->sendRequest($request);
        $response = $this->deserializeResponse($response, get_class(new OrderCalculateResponse()));
        /** @var OrderCalculateResponse $response */
        return $response;
    }

    /**
     * @param OrderCreateRequest $requestData
     * @return OrderCreateResponse
     */
    public function orderCreate(OrderCreateRequest $requestData)
    {
        /** @var RequestModel $requestData */
        $requestData = $requestData->orders[0];
        $request = $this->buildPostRequest('order/create', $requestData);
        $response = $this->sendRequest($request);
        var_dump($response->getBody()->getContents());
        $response = $this->deserializeResponse($response, get_class(new OrderCreateResponse()));
        /** @var OrderCreateResponse $response */
        return $response;
    }

    /**
     * @param int $orderId
     * @return OrderDeleteResponse
     */
    public function orderDelete($orderId)
    {
        $request = $this->buildPostRequest(sprintf('order/delete/%s', $orderId));
        $response = $this->sendRequest($request);
        $response = $this->deserializeResponse($response, get_class(new OrderDeleteResponse()));
        /** @var OrderDeleteResponse $response */
        return $response;
    }

    /**
     * @param int $orderId
     * @param OrderStatusRequest $requestData
     * @return OrderStatusUpdateResponse
     */
    public function orderStatusUpdate($orderId, OrderStatusRequest $requestData)
    {
        $request = $this->buildPostRequest(sprintf('order/update/%s', $orderId), $requestData);
        $response = $this->sendRequest($request);
        $response = $this->deserializeResponse($response, get_class(new OrderStatusUpdateResponse()));
        /** @var OrderStatusUpdateResponse $response */
        return $response;
    }

    /**
     * @param int $orderId
     * @return OrderGetResponse
     */
    public function orderGet($orderId)
    {
        $request = $this->buildGetRequest(sprintf('order/%s', $orderId));
        $response = $this->sendRequest($request);
        $response = $this->deserializeResponse($response, get_class(new OrderGetResponse()));
        /** @var OrderGetResponse $response */
        return $response;
    }

    /**
     * @param string $methodUrl
     * @param RequestModel $requestData
     * @return RequestInterface
     */
    private function buildPostRequest($methodUrl, $requestData = [])
    {
        $postHeaders = [
            'Content-type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
            'Cache-Control' => 'no-cache',
        ];

        if (isset($this->token)) {
            $postHeaders['Authorization'] = 'Bearer ' . $this->token;
        }

        $requestBody = null;

        if (!empty($requestData)) {
            $requestDataArray = $this->serializer->toArray($requestData);
            $requestBody = http_build_query($requestDataArray, '', '&');
        }

        return new Request(
            'POST',
            $this->baseUrl . $methodUrl,
            $postHeaders,
            $requestBody
        );
    }

    /**
     * @param string $methodUrl
     * @return RequestInterface
     */
    private function buildGetRequest($methodUrl)
    {
        $getHeaders = [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Cache-Control' => 'no-cache',
            'Authorization' => 'Bearer ' . $this->token,
        ];

        return new Request(
            'GET',
            $this->baseUrl . $methodUrl,
            $getHeaders,
            null
        );
    }

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

        return $this->client->sendAsync($request, $options)->wait();
    }

    /**
     * @param ResponseInterface $response
     * @param string $className
     * @return ResponseModel
     */
    private function deserializeResponse(ResponseInterface $response, $className)
    {
//        var_dump($response->getBody()->getContents());
        return $this->serializer->deserialize(
            $response->getBody()->getContents(),
            $className,
            'json'
        );
    }
}