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
 * Class ApplicationActionTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ApplicationActionTest extends TestCase
{
    public function testApplicationActionCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationAction::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $action = new Insales\Model\ApplicationAction();
        $fakeMock->fill($action, 'create');

        $accountRequest = new Insales\Model\Request\ApplicationActionRequest();
        $accountRequest->applicationAction = $action;

        $response = $apiClient->applicationActionCreate($accountRequest);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\ApplicationAction::class, $response->getResponse());
    }

    public function testApplicationActionUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationAction::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $action = new Insales\Model\ApplicationAction();
        $fakeMock->fill($action, 'update');

        $accountRequest = new Insales\Model\Request\ApplicationActionRequest();
        $accountRequest->applicationAction = $action;

        $response = $apiClient->applicationActionUpdate($accountRequest);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\ApplicationAction::class, $response->getResponse());
    }

    public function testApplicationActionDelete()
    {
        $mockHandler = $this->getMockHandler([['statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->applicationActionDelete(1);

        static::assertResponse($response);

        static::assertNull($response->getResponse());
    }
}
