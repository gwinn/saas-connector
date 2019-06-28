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
 * Class Field
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Field
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get fields list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-get-fields-json
     * @group   fields
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function fieldsList()
    {
        $url = '/admin/fields.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Field::class)
        );
    }

    /**
     * Get field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-get-field-json
     * @group   fields
     *
     * @param $fieldId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function fieldGet($fieldId)
    {
        $url = sprintf('/admin/fields/%s.json', $fieldId);

        return new Response\Response($this->client->get($url), Model\Field::class);
    }
}
