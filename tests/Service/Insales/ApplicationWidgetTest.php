<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Insales;

use SaaS\Service\Insales;

/**
 * Class ApplicationWidgetTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ApplicationWidgetTest extends TestCase
{
    public function testApplicationWidgetCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationWidget::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $widget = new Insales\Model\ApplicationWidget();
        $fakeMock->fill($widget);

        $accountRequest = new Insales\Model\Request\ApplicationWidgetRequest();
        $accountRequest->applicationWidget = $widget;

        $response = $apiClient->applicationWidgetCreate($accountRequest);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\ApplicationWidget::class, $response->getResponse());
    }

    public function testApplicationWidgetUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationWidget::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $widget = new Insales\Model\ApplicationWidget();
        $fakeMock->fill($widget);

        $accountRequest = new Insales\Model\Request\ApplicationWidgetRequest();
        $accountRequest->applicationWidget = $widget;

        $response = $apiClient->applicationWidgetUpdate($accountRequest);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\ApplicationWidget::class, $response->getResponse());
    }

    public function testApplicationWidgetDelete()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Response\StatusResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->applicationWidgetDelete(1);

        static::assertResponse($response);

        static::assertEquals('ok', $response->getResponse()->status);
    }
}
