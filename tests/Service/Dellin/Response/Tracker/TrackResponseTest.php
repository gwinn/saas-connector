<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Tracker;

use SaaS\Service\Dellin\Model\Request\Tracker\TrackRequest;
use SaaS\Service\Dellin\Model\Response\Tracker\TrackResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class TrackResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TrackResponseTest extends TestCase
{
    public function testTrack()
    {
        $mockHandler = $this->getMockHandler([['className' => TrackResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->track($this->fakeMock->fill(TrackRequest::class));

        static::assertResponse($response);
        static::assertInstanceOf(TrackResponse::class, $response->getResponse());
    }
}
