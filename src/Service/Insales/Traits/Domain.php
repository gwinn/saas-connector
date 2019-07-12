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
 * Class Domain
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Domain
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get domains list
     *
     * @link  http://api.insales.ru/?doc_format=JSON#domain-get-domains-json
     * @group domains
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function domainsList()
    {
        $url = '/admin/domains.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Domain::class)
        );
    }

    /**
     * Get domain
     *
     * @link  http://api.insales.ru/?doc_format=JSON#domain-get-domain-json
     * @group domains
     *
     * @param string $domainId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function domainGet($domainId)
    {
        $url = sprintf('/admin/domains/%s.json', $domainId);

        return new Response\Response($this->client->get($url), Model\Domain::class);
    }
}
