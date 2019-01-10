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
 * Class ApiPaymentGatewayTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiPaymentGatewayTest extends TestCase
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
            'type_external' => array(
                123,
                array(
                    'title' => 'Title',
                    'type' => 'PaymentGateway::External'
                )
            ),
        );
    }

    /**
     * Test using the method paymentGatewaysList
     */
    public function testPaymentGatewaysList()
    {
        $client = static::getInsalesApiClient();
        $response = $client->paymentGatewaysList();
        static::checkResponse($response);
    }

    /**
     * Test using the method paymentGatewayGet to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     */
    public function testPaymentGatewayGetException($paymentId)
    {
        $client = static::getInsalesApiClient();
        $client->paymentGatewayGet($paymentId);
    }

    /**
     * Test using the method paymentGatewayCreate to give exception
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerException
     * @param $paymentId
     * @param $payment
     */
    public function testPaymentGatewayCreateException($paymentId, $payment)
    {
        $client = static::getInsalesApiClient();
        $client->paymentGatewayCreate($payment);
    }

    /**
     * Test using the method paymentGatewayUpdate to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $paymentId
     * @param $payment
     */
    public function testPaymentGatewayUpdateException($paymentId, $payment)
    {
        $client = static::getInsalesApiClient();
        $client->paymentGatewayUpdate($paymentId, $payment);
    }

    /**
     * Test using the method paymentGatewayDelete to give exception
     *
     * @expectedException \Exception
     * @dataProvider providerException
     * @param $paymentId
     */
    public function testPaymentGatewayDeleteException($paymentId)
    {
        $client = static::getInsalesApiClient();
        $client->paymentGatewayDelete($paymentId);
    }

    /**
     * Test using the method paymentGatewayCreate
     * Insufficient permissions for operation
     */
    public function testPaymentGatewayCreate()
    {
        $client = static::getInsalesApiClient();
        $delivery = $client->deliveryVariantsList()->getResponse();

        $payment = array(
            'title' => 'Title Payment',
            'type' => 'PaymentGateway::Custom',
            'payment_delivery_variants_attributes' => array(
                array(
                    'delivery_variant_id' => $delivery[0]['id']
                )
            )
        );

        try {
            $response = $client->paymentGatewayCreate($payment);
            static::checkResponse($response);
            $this->paymentGatewayUpdate($response->offsetGet('id'));
            $this->paymentGatewayDelete($response->offsetGet('id'));
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Test using the method paymentGatewayUpdate
     *
     * @param $paymentId
     */
    public function paymentGatewayUpdate($paymentId)
    {
        $client = static::getInsalesApiClient();

        $payment = array(
            'title' => 'New Payment Title'
        );

        $response = $client->paymentGatewayUpdate($paymentId, $payment);
        static::checkResponse($response);

    }

    /**
     * Test using the method paymentGatewayDelete
     *
     * @param $paymentId
     */
    public function paymentGatewayDelete($paymentId)
    {
        $client = static::getInsalesApiClient();
        $response = $client->paymentGatewayDelete($paymentId);
        static::checkResponse($response);
    }
}
