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
 * Class CustomStatus
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait CustomStatus
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get custom statuses list
     *
     * @link  http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-statuses-json
     * @group custom_statuses
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function customStatusesList()
    {
        $url = '/admin/custom_statuses.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\CustomStatus::class)
        );
    }

    /**
     * Get custom status
     *
     * @link  http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-status-json
     * @group custom_statuses
     *
     * @param string $permalink
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function customStatusGet($permalink)
    {
        $url = sprintf('/admin/custom_statuses/%s.json', $permalink);

        return new Response\Response($this->client->get($url), Model\CustomStatus::class);
    }
}
