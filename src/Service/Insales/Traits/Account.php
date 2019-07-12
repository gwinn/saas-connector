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
use SaaS\Service\Insales\Model\Request;

/**
 * Class Account
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Account
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get account
     *
     * @link    http://api.insales.ru/?doc_format=JSON#account-get-account-json
     * @group   account
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function accountGet()
    {
        $url = '/admin/account.json';

        return new Response\Response($this->client->get($url), Model\Account::class);
    }

    /**
     * Update account
     *
     * @link    http://api.insales.ru/?doc_format=JSON#account-update-account-json
     * @param   Request\AccountRequest $request account data
     * @group   account
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function accountUpdate(Request\AccountRequest $request)
    {
        $url = '/admin/account.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Response\StatusResponse::class);
    }
}
