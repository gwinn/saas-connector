<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin;

use SaaS\Service\Dellin;

/**
 * Class ApiClientTest
 *
 * @package  SaaS\Tests\Service\Dellin
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ApiClientTest extends TestCase
{
    public function testInitialize()
    {
        $apiClient = $this->getApiClient();

        static::assertNotEmpty($apiClient);
        static::assertIsObject($apiClient);
        static::assertInstanceOf(Dellin\Client::class, $apiClient);
    }

    /**
     * @expectedException \SaaS\Service\Dellin\Exception\DellinApiException
     */
    public function testStringError()
    {
        $mockHandler = $this->getMockHandler([
            [
                'body' => json_encode([
                    'errors' => 'Unauthorized',
                ]),
                'statusCode' => 200,
            ],
        ]);

        $apiClient = $this->getApiClient($mockHandler);
        $apiClient->getSessionInfo();
    }

    /**
     * @expectedException \SaaS\Service\Dellin\Exception\DellinApiException
     */
    public function testMessagesError()
    {
        $mockHandler = $this->getMockHandler([
            [
                'body' => json_encode([
                    'errors' => [
                        'messages' => [
                            'Доставка от адреса отправителя невозможна. Проверьте адрес отправителя.',
                            'Доставка до адреса получателя невозможна. Проверьте адрес получателя.',
                            'Параметры груза превышают допустимые для забора груза в подразделении-отправителе. Проверьте параметры груза.',
                        ],
                    ],
                ]),
                'statusCode' => 200,
            ],
        ]);

        $apiClient = $this->getApiClient($mockHandler);
        $apiClient->getSessionInfo();
    }

    /**
     * @expectedException \SaaS\Service\Dellin\Exception\DellinApiException
     */
    public function testPropertiesError()
    {
        $mockHandler = $this->getMockHandler([
            [
                'body' => json_encode([
                    'errors' => [
                        'sizedVolume' => '"три" не является числом',
                        'packages' => [
                            'error' => 'Неверный uid упаковки 111222333',
                        ],
                    ],
                ]),
                'statusCode' => 200,
            ],
        ]);

        $apiClient = $this->getApiClient($mockHandler);
        $apiClient->getSessionInfo();
    }
}
