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
 * Class ApplicationCharge
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait ApplicationCharge
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get application charge list
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargesList()
    {
        $url = '/admin/application_charges.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\ApplicationCharge::class)
        );
    }

    /**
     * Get application charge
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group application_charges
     *
     * @param string $chargeId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeGet($chargeId)
    {
        $url = sprintf('/admin/application_charges/%s.json', $chargeId);

        return new Response\Response($this->client->get($url), Model\ApplicationCharge::class);
    }

    /**
     * Create application charge
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-create-application-action-json
     * @param Request\ApplicationChargeRequest $request application actions data
     * @group application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeCreate(Request\ApplicationChargeRequest $request)
    {
        $url = '/admin/application_charges.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\ApplicationCharge::class);
    }

    /**
     * Update application charge
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-update-application-action-json
     * @param Request\ApplicationChargeRequest $request application actions data
     * @group application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeUpdate(Request\ApplicationChargeRequest $request)
    {
        $url = sprintf('/admin/application_charges/%s.json', $request->applicationCharge->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\ApplicationCharge::class);
    }

    /**
     * Delete application charge
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-destroy-application-action-json
     * @param string $action
     * @group application_charges
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationChargeDecline($action)
    {
        $url = sprintf('/admin/application_charges/%s.json', $action);

        return new Response\Response($this->client->post($url), Model\ApplicationCharge::class);
    }
}
