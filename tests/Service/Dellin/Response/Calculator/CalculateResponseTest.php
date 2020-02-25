<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Calclulator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Calculator;

use SaaS\Service\Dellin\Model\Request\Calculator\CalculateRequest;
use SaaS\Service\Dellin\Model\Response\Calculator\CalculateResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class CalculateResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Calclulator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class CalculateResponseTest extends TestCase
{
    public function testCalculate()
    {
        $mockHandler = $this->getMockHandler([['className' => CalculateResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->calculate($this->fakeMock->fill(CalculateRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(CalculateResponse::class, $response->getResponse());
    }
}
