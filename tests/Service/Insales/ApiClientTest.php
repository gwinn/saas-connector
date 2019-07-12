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
        static::assertInstanceOf(Insales::class, $apiClient);
    }

    /**
     * @expectedException \SaaS\Service\Insales\Exception\InsalesLimitException
     */
    public function testLimitException()
    {
        $mockHandler = $this->getMockHandler([[
            'className' => Insales\Model\Account::class,
            'statusCode' => 503,
            'headers' => ['API-Usage-Limit' => '501/500', 'Retry-After' => 5]
        ]]);

        $apiClient = $this->getApiClient($mockHandler);
        $apiClient->accountGet();
    }

    /**
     * @dataProvider methodList
     *
     * @param $methodList
     * @param $responseForMock
     * @param $elementClassName
     */
    public function testList($methodList, $responseForMock, $elementClassName)
    {
        $countListElement = rand(1, 5);
        $responseForMock = array_merge($responseForMock, ['statusCode' => 200, 'list' => $countListElement]);
        $apiClient = $this->getApiClient($this->getMockHandler([$responseForMock]));
        $response = $apiClient->$methodList();

        static::assertResponse($response);
        static::assertResponseList($response, $elementClassName, $responseForMock['list']);
    }

    /**
     * @dataProvider methodGet
     *
     * @param $methodGet
     * @param $responseForMock
     * @param $fixedField
     */
    public function testGet($methodGet, $responseForMock, $fixedField = 'id')
    {
        $stockCurrencyId = rand(1, 50);

        $responseForMock = array_merge(
            $responseForMock,
            [
                'statusCode' => 200,
                'fixedValue' => [$fixedField => $stockCurrencyId]
            ]
        );

        $mockHandler = $this->getMockHandler([$responseForMock]);
        $apiClient = $this->getApiClient($mockHandler);
        $response = $apiClient->$methodGet($stockCurrencyId);

        static::assertResponse($response);
        static::assertResponseGet($response, $responseForMock['className'], $responseForMock['fixedValue']);
    }

    /**
     * Provider for methods get element list
     *
     * @return array
     */
    public function methodList()
    {
        return [
            'applicationActionsList' => [
                'methodList' => 'applicationActionsList',
                'responseForMock' => [
                    'className' => Insales\Model\ApplicationAction::class,
                ],
                'elementClassName' => Insales\Model\ApplicationAction::class
            ],
            'applicationChargesList' => [
                'methodList' => 'applicationChargesList',
                'responseForMock' => [
                    'className' => Insales\Model\ApplicationCharge::class,
                ],
                'elementClassName' => Insales\Model\ApplicationCharge::class
            ],
            'applicationWidgetsList' => [
                'methodList' => 'applicationWidgetsList',
                'responseForMock' => [
                    'className' => Insales\Model\ApplicationWidget::class,
                ],
                'elementClassName' => Insales\Model\ApplicationWidget::class
            ],
            'categoriesList' => [
                'methodList' => 'categoriesList',
                'responseForMock' => [
                    'className' => Insales\Model\Category::class,
                ],
                'elementClassName' => Insales\Model\Category::class
            ],
            'clientsList' => [
                'methodList' => 'clientsList',
                'responseForMock' => [
                    'className' => Insales\Model\Client::class,
                    'properties' => [
                        'fieldsValues' => ['list' => rand(1, 5), 'className' => Insales\Model\FieldValue::class],
                    ]
                ],
                'elementClassName' => Insales\Model\Client::class
            ],
            'customStatusesList' => [
                'methodList' => 'customStatusesList',
                'responseForMock' => [
                    'className' => Insales\Model\CustomStatus::class,
                ],
                'elementClassName' => Insales\Model\CustomStatus::class
            ],
            'deliveryVariantsList' => [
                'methodList' => 'deliveryVariantsList',
                'responseForMock' => [
                    'className' => Insales\Model\DeliveryVariant::class,
                    'properties' => [
                        'deliveryLocations' => ['list' => rand(1, 5), 'className' => Insales\Model\DeliveryLocation::class],
                        'paymentDeliveryVariants' => ['list' => rand(1, 5), 'className' => Insales\Model\PaymentDeliveryVariant::class],
                        'rules' => ['list' => rand(1, 5), 'className' => Insales\Model\Rule::class],
                    ]
                ],
                'elementClassName' => Insales\Model\DeliveryVariant::class
            ],
            'domainsList' => [
                'methodList' => 'domainsList',
                'responseForMock' => [
                    'className' => Insales\Model\Domain::class,
                ],
                'elementClassName' => Insales\Model\Domain::class
            ],
            'fieldsList' => [
                'methodList' => 'fieldsList',
                'responseForMock' => [
                    'className' => Insales\Model\Field::class,
                    'properties' => [
                        'fieldOptions' => ['list' => rand(1, 5), 'className' => Insales\Model\FieldOption::class],
                    ]
                ],
                'elementClassName' => Insales\Model\Field::class
            ],
            'ordersList' => [
                'methodList' => 'ordersList',
                'responseForMock' => [
                    'className' => Insales\Model\Order::class,
                ],
                'elementClassName' => Insales\Model\Order::class
            ],
            'paymentGatewaysList' => [
                'methodList' => 'paymentGatewaysList',
                'responseForMock' => [
                    'className' => Insales\Model\PaymentGateway::class,
                    'properties' => [
                        'paymentDeliveryVariants' => ['list' => rand(1, 5), 'className' => Insales\Model\PaymentDeliveryVariant::class],
                    ]
                ],
                'elementClassName' => Insales\Model\PaymentGateway::class
            ],
            'productsList' => [
                'methodList' => 'productsList',
                'responseForMock' => [
                    'className' => Insales\Model\Product::class,
                ],
                'elementClassName' => Insales\Model\Product::class
            ],
            'stockCurrenciesList' => [
                'methodList' => 'stockCurrenciesList',
                'responseForMock' => [
                    'className' => Insales\Model\StockCurrency::class,
                ],
                'elementClassName' => Insales\Model\StockCurrency::class
            ],
            'variantFieldsList' => [
                'methodList' => 'variantFieldsList',
                'responseForMock' => [
                    'className' => Insales\Model\VariantField::class,
                ],
                'elementClassName' => Insales\Model\VariantField::class
            ],
            'webhooksList' => [
                'methodList' => 'webhooksList',
                'responseForMock' => [
                    'className' => Insales\Model\Webhook::class,
                ],
                'elementClassName' => Insales\Model\Webhook::class
            ],
        ];
    }

    /**
     * Provider for methods get element
     *
     * @return array
     */
    public function methodGet()
    {
        return [
            'applicationActionGet' => [
                'methodList' => 'applicationActionGet',
                'responseForMock' => [
                    'className' => Insales\Model\ApplicationAction::class,
                ],
            ],
            'applicationChargeGet' => [
                'methodList' => 'applicationChargeGet',
                'responseForMock' => [
                    'className' => Insales\Model\ApplicationCharge::class,
                ],
            ],
            'applicationWidgetGet' => [
                'methodList' => 'applicationWidgetGet',
                'responseForMock' => [
                    'className' => Insales\Model\ApplicationWidget::class,
                ],
            ],
            'categoryGet' => [
                'methodList' => 'categoryGet',
                'responseForMock' => [
                    'className' => Insales\Model\Category::class,
                ],
            ],
            'clientGet' => [
                'methodList' => 'clientGet',
                'responseForMock' => [
                    'className' => Insales\Model\Client::class,
                    'properties' => [
                        'fieldsValues' => ['list' => rand(1, 5), 'className' => Insales\Model\FieldValue::class],
                    ]
                ],
            ],
            'customStatusGet' => [
                'methodList' => 'customStatusGet',
                'responseForMock' => [
                    'className' => Insales\Model\CustomStatus::class,
                ],
                'fixedField' => 'permalink'
            ],
            'deliveryVariantGet' => [
                'methodList' => 'deliveryVariantGet',
                'responseForMock' => [
                    'className' => Insales\Model\DeliveryVariant::class,
                    'properties' => [
                        'deliveryLocations' => ['list' => rand(1, 5), 'className' => Insales\Model\DeliveryLocation::class],
                        'paymentDeliveryVariants' => ['list' => rand(1, 5), 'className' => Insales\Model\PaymentDeliveryVariant::class],
                        'rules' => ['list' => rand(1, 5), 'className' => Insales\Model\Rule::class],
                        'deliveryZones' => [
                            'list' => rand(1, 5),
                            'className' => Insales\Model\DeliveryZone::class,
                            'properties' => ['tariffs' => ['list' => rand(1, 5), 'className' => Insales\Model\Tariff::class]],
                        ],
                    ]
                ],
            ],
            'domainGet' => [
                'methodList' => 'domainGet',
                'responseForMock' => [
                    'className' => Insales\Model\Domain::class,
                ],
            ],
            'fieldGet' => [
                'methodList' => 'fieldGet',
                'responseForMock' => [
                    'className' => Insales\Model\Field::class,
                    'properties' => [
                        'fieldOptions' => ['list' => rand(1, 5), 'className' => Insales\Model\FieldOption::class],
                    ]
                ],
            ],
            'orderGet' => [
                'methodList' => 'orderGet',
                'responseForMock' => [
                    'className' => Insales\Model\Order::class,
                ],
            ],
            'paymentGatewayGet' => [
                'methodList' => 'paymentGatewayGet',
                'responseForMock' => [
                    'className' => Insales\Model\PaymentGateway::class,
                    'properties' => [
                        'paymentDeliveryVariants' => ['list' => rand(1, 5), 'className' => Insales\Model\PaymentDeliveryVariant::class],
                    ]
                ],
            ],
            'productGet' => [
                'methodList' => 'productGet',
                'responseForMock' => [
                    'className' => Insales\Model\Product::class,
                ],
            ],
            'stockCurrencyGet' => [
                'methodList' => 'stockCurrencyGet',
                'responseForMock' => [
                    'className' => Insales\Model\StockCurrency::class,
                ],
            ],
            'variantFieldGet' => [
                'methodList' => 'variantFieldGet',
                'responseForMock' => [
                    'className' => Insales\Model\VariantField::class,
                ],
            ],
            'webhookGet' => [
                'methodList' => 'webhookGet',
                'responseForMock' => [
                    'className' => Insales\Model\Webhook::class,
                ],
            ],
        ];
    }
}
