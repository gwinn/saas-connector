<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */

namespace SaaS\Tests\Insales;

use SaaS\Test\TestCase;
/**
 * Class ApiDeliveryTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiDeliveryTest extends TestCase
{
    /**
     * Provider for exception tests CRUD
     *
     * @return array
     */
    public function providerException()
    {
        return array(
            'empty_data' => array(
                null,
                array()
            ),
            'not_found_type' => array(
                123,
                array(
                    'title' => 'Title',
                )
            ),
            'type_fixed' => array(
                123,
                array(
                    'title' => 'Title',
                    'type' => 'DeliveryVariant::Fixed'
                )
            ),
            'type_LocationDepend' => array(
                123,
                array(
                    'title' => 'Title',
                    'type' => 'DeliveryVariant::LocationDepend'
                )
            )
        );
    }

    /**
     * Test using the method deliveryVariantsList
     */
    public function testDeliveryVariantsList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->deliveryVariantsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method deliveryVariantGet to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $deliveryId
     */
    public function testDeliveryVariantGetException($deliveryId)
    {
        $client = static::getInsalesApiClient();
        $client->deliveryVariantGet($deliveryId);
    }

    /**
     * Test using the method deliveryVariantCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $deliveryId
     * @param $delivery
     */
    public function testDeliveryVariantCreateException($deliveryId, $delivery)
    {
        $client = static::getInsalesApiClient();
        $client->deliveryVariantCreate($delivery);
    }

    /**
     * Test using the method deliveryVariantUpdate to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $deliveryId
     * @param $delivery
     */
    public function testDeliveryVariantUpdateException($deliveryId, $delivery)
    {
        $client = static::getInsalesApiClient();
        $client->deliveryVariantUpdate($deliveryId, $delivery);
    }

    /**
     * Test using the method deliveryVariantDelete to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $deliveryId
     */
    public function testDeliveryVariantDeleteException($deliveryId)
    {
        $client = static::getInsalesApiClient();
        $client->deliveryVariantDelete($deliveryId);
    }

    /**
     * Test using the method deliveryVariantCreate
     *
     * @return mixed
     */
    public function testDeliveryVariantCreate()
    {
        $client = static::getInsalesApiClient();

        $delivery = array(
            'title' => 'Test ' . uniqid(),
            'description' => 'Тест',
            'add-payment-gateways' => true,
            'position' => 0,
            'type' => 'DeliveryVariant::PriceDepend',
        );

        try {
            $response = $client->deliveryVariantCreate($delivery);
            static::checkResponse($response);
            $this->deliveryVariantUpdate($response->offsetGet('id'));
            $this->deliveryVariantDelete($response->offsetGet('id'));
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Test using the method deliveryVariantUpdate
     *
     * @param $deliveryId
     */
    public function deliveryVariantUpdate($deliveryId)
    {
        $client = static::getInsalesApiClient();

        $delivery = array(
            'description' => 'New Delivery Title'
        );

        $response = $client->deliveryVariantUpdate($deliveryId, $delivery);
        static::checkResponse($response);
    }


    /**
     * Test using the method deliveryVariantDelete
     *
     * @param $deliveryId
     */
    public function deliveryVariantDelete($deliveryId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->deliveryVariantDelete($deliveryId);
        static::checkResponse($response);
    }
}
