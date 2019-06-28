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
 * Class ApplicationWidget
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait ApplicationWidget
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get application widgets list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-get-application-widgets-json
     * @group   application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetsList()
    {
        $url = '/admin/application_widgets.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\ApplicationWidget::class)
        );
    }

    /**
     * Get application widget
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-get-application-widget-json
     * @group   application_widgets
     *
     * @param $widgetId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetGet($widgetId)
    {
        $url = sprintf('/admin/application_widgets/%s.json', $widgetId);

        return new Response\Response($this->client->get($url), Model\ApplicationWidget::class);
    }

    /**
     * Create application widget
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-create-application-widget-json
     * @param   Request\ApplicationWidgetRequest $request application widget data
     * @group   application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetCreate(Request\ApplicationWidgetRequest $request)
    {
        $url = '/admin/application_widgets.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\ApplicationWidget::class);
    }

    /**
     * Update application widget
     *
     * @link    http://api.insales.ru/?doc_format=JSON#applicationwidget-update-application-widget-json
     * @param   Request\ApplicationWidgetRequest $request application widget data
     * @group   application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetUpdate(Request\ApplicationWidgetRequest $request)
    {
        $url = sprintf('/admin/application_widgets/%s.json', $request->applicationWidget->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\ApplicationWidget::class);
    }

    /**
     * Delete application widget
     *
     * @link  http://api.insales.ru/?doc_format=JSON#applicationwidget-destroy-application-widget-json
     * @param $widget
     * @group application_widgets
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function applicationWidgetDelete($widget)
    {
        $url = sprintf('/admin/application_widgets/%s.json', $widget);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}
