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
 * Class ApplicationChargeTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ApplicationChargeTest extends TestCase
{
    public function testApplicationChargeCreate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationCharge::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $charge = new Insales\Model\ApplicationCharge();
        $fakeMock->fill($charge, 'create');

        $response = $apiClient->applicationChargeCreate(new Insales\Model\Request\ApplicationChargeRequest($charge));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\ApplicationCharge::class, $response->getResponse());
    }

    public function testApplicationChargeUpdate()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationCharge::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $charge = new Insales\Model\ApplicationCharge();
        $fakeMock->fill($charge, 'update');

        $response = $apiClient->applicationChargeUpdate(new Insales\Model\Request\ApplicationChargeRequest($charge));

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\ApplicationCharge::class, $response->getResponse());
    }

    public function testApplicationChargeDecline()
    {
        $mockHandler = $this->getMockHandler([['className' => Insales\Model\ApplicationCharge::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);

        $response = $apiClient->applicationChargeDecline(1);

        static::assertResponse($response);
        static::assertInstanceOf(Insales\Model\ApplicationCharge::class, $response->getResponse());
    }
}
