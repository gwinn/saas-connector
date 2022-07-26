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
use SaaS\Service\Dellin\Model\Request\Calculator\CalculateRequestV2;
use SaaS\Service\Dellin\Model\Response\Calculator\V2\CalculateResponse as CalculateResponseV2;
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

    public function testCalculateV2(): void
    {
        $mockHandler = $this->getMockHandler([['className' => CalculateResponseV2::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->calculateV2($this->fakeMock->fill(CalculateRequestV2::class));

        static::assertResponse($response);
        static::assertInstanceOf(CalculateResponseV2::class, $response->getResponse());

        /** @var CalculateResponseV2 $calculateResponse */
        $calculateResponse = $response->getResponse();

        static::assertEquals("Санкт-Петербург", $calculateResponse->data->arrival->terminal);
        static::assertEquals(2150.0, $calculateResponse->data->arrival->price);
        static::assertEquals(2100.0, $calculateResponse->data->arrival->servicePrice);
        static::assertEquals("auto", $calculateResponse->data->priceMinimal);
        static::assertNotEmpty($calculateResponse->data->orderDates->pickup);
        static::assertNotEmpty($calculateResponse->data->orderDates->arrivalToOspReceiver);
        static::assertNotEmpty($calculateResponse->data->orderDates->derrivalFromOspReceiver);
        static::assertEquals(2500.0, $calculateResponse->data->availableDeliveryTypes->auto);
        static::assertEquals(1500.0, $calculateResponse->data->availableDeliveryTypes->avia);

        foreach (["intercity", "air", "express", "letter", "small"] as $tariff) {
            static::assertNotEmpty($calculateResponse->data->{$tariff}->price);
        }
    }
}
