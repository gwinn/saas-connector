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
 * Class ApiClientTest
 *
 * @package  SaaS\Tests
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
        static::assertInstanceOf(Boxberry\Client::class, $apiClient);
    }

    /**
     * @dataProvider methodGet
     *
     * @param array  $methodList
     * @param array  $responseForMock
     * @param string $elementClassName
     * @param string $responseType
     */
    public function testList(
        array $methodList,
        array $responseForMock,
        string $elementClassName,
        string $responseType = 'array'
    ) {
        $countListElement = rand(1, 5);
        $responseForMock = array_merge($responseForMock, ['statusCode' => 200, 'list' => $countListElement]);
        $apiClient = $this->getApiClient($this->getMockHandler([$responseForMock]));

        $response = call_user_func_array(
            [$apiClient, $methodList['name']],
            $methodList['params'] ?? []
        );

        static::assertResponse($response);
        static::assertResponseList($response, $elementClassName, $responseType, $responseForMock['list']);
    }

    /**
     * Provider for methods get request
     *
     * @return array
     */
    public function methodGet()
    {
        return array_merge(
            [],
            self::getListMethods(),
            self::getParcelMethods(),
            self::getServiceMethods()
        );
    }

    /**
     * @return array
     */
    protected static function getListMethods(): array
    {
        return [
            'listCities' => [
                'methodList' => [
                    'name' => 'listCities'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListCities::class,
                ],
                'elementClassName' => Boxberry\Model\ListCities::class
            ],
            'listCitiesFull' => [
                'methodList' => [
                    'name' => 'listCitiesFull'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListCitiesFull::class,
                ],
                'elementClassName' => Boxberry\Model\ListCitiesFull::class
            ],
            'listPoints' => [
                'methodList' => [
                    'name' => 'listPoints'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListPoints::class,
                ],
                'elementClassName' => Boxberry\Model\ListPoints::class
            ],
            'listPointsShort' => [
                'methodList' => [
                    'name' => 'listPointsShort'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListPointsShort::class,
                ],
                'elementClassName' => Boxberry\Model\ListPointsShort::class
            ],
            'listServices' => [
                'methodList' => [
                    'name' => 'listServices'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListServices::class,
                ],
                'elementClassName' => Boxberry\Model\ListServices::class
            ],
            'listStatuses' => [
                'methodList' => [
                    'name' => 'listStatuses'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListStatuses::class,
                ],
                'elementClassName' => Boxberry\Model\ListStatuses::class
            ],
            'listStatusesFull' => [
                'methodList' => [
                    'name' => 'listStatusesFull'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListStatusesFull::class,
                    'properties' => [
                        'statuses' => ['list' => rand(1, 5), 'className' => Boxberry\Model\ListStatuses::class],
                        'products' => [
                            'list' => rand(1, 5),
                            'className' => Boxberry\Model\ListStatusesFull\Products::class
                        ]
                    ]
                ],
                'elementClassName' => Boxberry\Model\ListStatusesFull::class,
                'responseType' => Boxberry\Model\ListStatusesFull::class
            ],
            'listZips' => [
                'methodList' => [
                    'name' => 'listZips'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ListZips::class,
                ],
                'elementClassName' => Boxberry\Model\ListZips::class
            ],
            'courierListCities' => [
                'methodList' => [
                    'name' => 'courierListCities'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\CourierListCities::class,
                ],
                'elementClassName' => Boxberry\Model\CourierListCities::class
            ],
            'pointsForParcels' => [
                'methodList' => [
                    'name' => 'pointsForParcels'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\PointsForParcels::class,
                ],
                'elementClassName' => Boxberry\Model\PointsForParcels::class
            ]
        ];
    }

    /**
     * @return array
     */
    protected static function getParcelMethods(): array
    {
        return [
            'parselSendStory' => [
                'methodList' => [
                    'name' => 'parselSendStory'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ParselSendStory::class,
                ],
                'elementClassName' => Boxberry\Model\ParselSendStory::class
            ],
            'parselSend' => [
                'methodList' => [
                    'name' => 'parselSend',
                    'params' => ['test']
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ParselSend::class,
                ],
                'elementClassName' => Boxberry\Model\ParselSend::class
            ],
            'parselStory' => [
                'methodList' => [
                    'name' => 'parselStory'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ParselStory::class,
                ],
                'elementClassName' => Boxberry\Model\ParselStory::class
            ],
            'parselDel' => [
                'methodList' => [
                    'name' => 'parselDel',
                    'params' => ['test']
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ParselDel::class,
                ],
                'elementClassName' => Boxberry\Model\ParselDel::class
            ],
            'parselList' => [
                'methodList' => [
                    'name' => 'parselList'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ParselList::class,
                ],
                'elementClassName' => Boxberry\Model\ParselList::class
            ],
            'parselCheck' => [
                'methodList' => [
                    'name' => 'parselCheck',
                    'params' => ['test']
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ParselCheck::class,
                ],
                'elementClassName' => Boxberry\Model\ParselCheck::class
            ]
        ];
    }

    /**
     * @return array
     */
    protected static function getServiceMethods(): array
    {
        return [
            'pointsDescription' => [
                'methodList' => [
                    'name' => 'pointsDescription',
                    'params' => ['test']
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\PointsDescription::class,
                ],
                'elementClassName' => Boxberry\Model\PointsDescription::class,
                'responseType' => Boxberry\Model\PointsDescription::class
            ],
            'zipCheck' => [
                'methodList' => [
                    'name' => 'zipCheck',
                    'params' => ['test']
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\ZipCheck::class,
                ],
                'elementClassName' => Boxberry\Model\ZipCheck::class
            ],
            'ordersBalance' => [
                'methodList' => [
                    'name' => 'ordersBalance'
                ],
                'responseForMock' => [
                    'className' => Boxberry\Model\OrdersBalance::class,
                ],
                'elementClassName' => Boxberry\Model\OrdersBalance::class
            ]
        ];
    }
}
