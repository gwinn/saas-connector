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
 * Class AccountTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AccountTest extends TestCase
{
    public function testAccountGet()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Account::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->accountGet();

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\Account::class, $response->getResponse());
    }

    public function testAccountUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\Response\StatusResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $account = new Insales\Model\Account();
        $fakeMock->fill($account);

        $request = new Insales\Model\Request\AccountRequest();
        $request->account = $account;

        $response = $apiClient->accountUpdate($request);

        static::assertResponse($response);

        static::assertInstanceOf(Insales\Model\Response\StatusResponse::class, $response->getResponse());
        static::assertEquals('ok', $response->getResponse()->status);
    }
}
