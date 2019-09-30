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
 * Class ParcelCreateTest
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ParcelCreateTest extends TestCase
{
    public function testParcelCreate()
    {
        $mockHandler = $this->getMockHandler(
            [['className' => Boxberry\Model\ParcelCreate::class, 'statusCode' => 200]]
        );

        $apiClient = $this->getApiClient($mockHandler);

        $fakeMock = new \Er1z\FakeMock\FakeMock();

        $request = new Boxberry\Model\Request\ParcelCreate();
        $kurdost = new Boxberry\Model\Request\ParcelCreate\Kurdost();
        $shop = new Boxberry\Model\Request\ParcelCreate\Shop();
        $customer = new Boxberry\Model\Request\ParcelCreate\Customer();
        $items = new Boxberry\Model\Request\ParcelCreate\Items();

        $fakeMock->fill($request);
        $fakeMock->fill($kurdost);
        $fakeMock->fill($shop);
        $fakeMock->fill($customer);
        $fakeMock->fill($items);

        $request->kurdost = $kurdost;
        $request->shop = $shop;
        $request->customer = $customer;
        $request->items = [$items];

        $response = $apiClient->parcelCreate($request);

        static::assertResponse($response);
        static::assertInstanceOf(Boxberry\Model\ParcelCreate::class, $response->getResponse());
    }
}
