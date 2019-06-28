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
 * Class VariantField
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait VariantField
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get variant_fields list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-fields-json
     * @group   variant_fields
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function variantFieldsList()
    {
        $url = '/admin/variant_fields.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\VariantField::class)
        );
    }

    /**
     * Get field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-field-json
     * @group   variant_fields
     *
     * @param $variantFieldId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function variantFieldGet($variantFieldId)
    {
        $url = sprintf('/admin/variant_fields/%s.json', $variantFieldId);

        return new Response\Response($this->client->get($url), Model\VariantField::class);
    }
}
