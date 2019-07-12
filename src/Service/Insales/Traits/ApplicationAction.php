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
 * Class ApplicationAction
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait ApplicationAction
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get application actions list
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionsList()
    {
        $url = '/admin/application_actions.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\ApplicationAction::class)
        );
    }

    /**
     * Get application action
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-get-application-actions-json
     * @group application_actions
     *
     * @param string $actionId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionGet($actionId)
    {
        $url = sprintf('/admin/application_actions/%s.json', $actionId);

        return new Response\Response($this->client->get($url), Model\ApplicationAction::class);
    }

    /**
     * Create application action
     *
     * @link   http://api.insales.ru/?doc_format=JSON#applicationaction-create-application-action-json
     * @param  Request\ApplicationActionRequest $request application actions data
     * @group  application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionCreate(Request\ApplicationActionRequest $request)
    {
        $url = '/admin/application_actions.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\ApplicationAction::class);
    }

    /**
     * Update application action
     *
     * @link   http://api.insales.ru/?doc_format=JSON#applicationaction-update-application-action-json
     * @param  Request\ApplicationActionRequest $request application actions data
     * @group  application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionUpdate(Request\ApplicationActionRequest $request)
    {
        $url = sprintf('/admin/application_actions/%s.json', $request->applicationAction->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\ApplicationAction::class);
    }

    /**
     * Delete application action
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationaction-destroy-application-action-json
     * @param string $action
     * @group application_actions
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationActionDelete($action)
    {
        $url = sprintf('/admin/application_actions/%s.json', $action);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}
