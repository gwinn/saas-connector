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
 * Class DeliveryVariant
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait DeliveryVariant
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get delivery variants list
     *
     * @link   http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variants-json
     * @group  delivery_variants
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function deliveryVariantsList()
    {
        $url = '/admin/delivery_variants.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\DeliveryVariant::class)
        );
    }

    /**
     * Get delivery variant
     *
     * @link  http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variant-json
     * @group delivery_variants
     *
     * @param string $deliveryVariantId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function deliveryVariantGet($deliveryVariantId)
    {
        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryVariantId);

        return new Response\Response($this->client->get($url), Model\DeliveryVariant::class);
    }
}
