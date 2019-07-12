<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Traits;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use SaaS\Service\Insales\Model;
use SaaS\Service\Insales\Model\Response;
use SaaS\Service\Insales\Exception;

/**
 * Class PaymentGateway
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait PaymentGateway
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get payment gateways list
     *
     * @link  http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateways-json
     * @group payment_gateways
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function paymentGatewaysList()
    {
        $url = '/admin/payment_gateways.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\PaymentGateway::class)
        );
    }

    /**
     * Get payment gateway
     *
     * @link  http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateway-json
     * @group payment_gateways
     *
     * @param string $paymentGatewayId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function paymentGatewayGet($paymentGatewayId)
    {
        $url = sprintf('/admin/payment_gateways/%s.json', $paymentGatewayId);

        return new Response\Response($this->client->get($url), Model\PaymentGateway::class);
    }
}
