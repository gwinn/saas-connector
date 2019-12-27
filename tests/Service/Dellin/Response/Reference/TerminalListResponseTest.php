<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin\Response\Reference;

use SaaS\Service\Dellin\Model\Response\Reference\TerminalListResponse;
use SaaS\Tests\Service\Dellin\TestCase;

/**
 * Class TerminalListResponseTest
 *
 * @package  SaaS\Tests\Service\Dellin\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TerminalListResponseTest extends TestCase
{
    public function testGetTerminals()
    {
        $mockHandler = $this->getMockHandler([['className' => TerminalListResponse::class, 'statusCode' => 200]]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->getTerminals();

        static::assertResponse($response);
        static::assertInstanceOf(TerminalListResponse::class, $response->getResponse());
    }
}
