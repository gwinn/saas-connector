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
        static::assertEquals(2500.0, $calculateResponse->data->availableDeliveryTypes->auto);
        static::assertEquals(1500.0, $calculateResponse->data->availableDeliveryTypes->avia);

        foreach (["intercity", "air", "express", "letter", "small"] as $tariff) {
            static::assertNotEmpty($calculateResponse->data->{$tariff}->price);
        }

        $orderDates = $calculateResponse->data->orderDates;

        self::assertEquals('2019-04-24', $orderDates->pickup);
        self::assertEquals('18:00:00', $orderDates->senderAddressTime);
        self::assertEquals('15:00:00', $orderDates->senderTerminalTime);
        self::assertEquals('2019-04-24', $orderDates->arrivalToOspSender);
        self::assertEquals('2019-04-24', $orderDates->derivalFromOspSender);
        self::assertEquals('2019-04-24', $orderDates->arrivalToOspReceiver);
        self::assertEquals('2019-04-25', $orderDates->arrivalToAirport);
        self::assertEquals('2019-04-26', $orderDates->arrivalToAirportMax);
        self::assertEquals('2019-04-25 00:00:00', $orderDates->giveoutFromOspReceiver);
        self::assertEquals('2019-04-26 00:00:00', $orderDates->giveoutFromOspReceiverMax);
        self::assertEquals('2019-04-26', $orderDates->derivalFromOspReceiver);
        self::assertEquals('14:00:00', $orderDates->createTo);
        self::assertEquals('2022-08-05 10:00:00', $orderDates->derivalToAddress);
        self::assertEquals('2022-08-05 17:00:00', $orderDates->derivalToAddressMax);
    }
}
