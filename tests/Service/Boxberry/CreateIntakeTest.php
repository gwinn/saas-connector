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
namespace SaaS\Tests\Service\Boxberry;

use SaaS\Service\Boxberry;

/**
 * Class CreateIntakeTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class CreateIntakeTest extends TestCase
{
    public function testParcelCreate()
    {
        $mockHandler = $this->getMockHandler(
            [['className' => Boxberry\Model\CreateIntake::class, 'statusCode' => 200]]
        );

        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();

        $request = new Boxberry\Model\Request\CreateIntake();
        $fakeMock->fill($request);

        $response = $apiClient->createIntake($request);

        static::assertResponse($response);
        static::assertInstanceOf(Boxberry\Model\CreateIntake::class, $response->getResponse());
    }
}
