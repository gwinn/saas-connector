<?php
/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Iml
 * @author   Sergey
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */

namespace SaaS\Tests\Iml;

use SaaS\Test\TestCase;

/**
 * Class Test
 *
 * @category ApiClient
 * @package  SaaS\Tests\Iml
 * @author   Sergey
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class ApiTest extends TestCase
{
    /**
     * get order status 
     * 
     * @group imlcreate
     */
    public function testCreateOrder() {
        $parameters = array(
            'Test' => 'True', // для тестового режима, иначе не указывайте
            'CustomerOrder' => '2346C',
            'DeliveryDate' => '01.06.2017', // не обязательно, при отсутствии создаст ближайшую 
            'Job' => '24КО', // из справочника услуг
            'BarCode' => '', // не обязательно, будет сгенерирован
            'Contact' => 'Вася',
            'RegionCodeTo' => 'МОСКВА', // из справочника регионов
            'RegionCodeFrom' => 'МОСКВА', // из справочника регионов
            'Address' => 'Мира 1',
            'DeliveryPoint'=> '1', // из справочника пунктов самовывоза
            'Phone'=> '0202020202',
            'TimeFrom' => '9:00', // не обязательно, при отсутствии создаст значение по умолчанию
            'TimeTo' => '21', // не обязательно, при отсутствии создаст значение по умолчанию
            'Amount' => '13.05', // разделитель '.' (точка)
            'ValuatedAmount' => '14.2', // разделитель '.' (точка)
            'Volume' => '1', // не обязательно, по умолчанию 1
            'Weight' => '11.4', // разделитель '.' (точка)
            'Comment' => 'TEST TEST TEsT',
            'GoodItems' => array(
                'productNo'=> 'pr1',
                'productName' => 'name1',
                'productVariant' => 'red',
                'productBarCode' => '10000001',
                'couponCode' => '10000002',
                'discount' => '0',
                'weightLine' => '12.5',
                'amountLine' => '120.0',
                'statisticalValueLine' => '120.0',
                'deliveryService' => FALSE
            )     
        );
        $client = static::getImlApiClient();
        $response =$client->createOrder($parameters);
        var_dump($response);
        static::checkResponse($response);
    }
    
    /**
     * get order status 
     * 
     * @group imlcalc
     */
    public function testCalcOrderPrice() {
        $parameters = array(
            'Job' => 'C24', 
            'RegionFrom' => 'МОСКВА', 
            'RegionTo' => 'САРАТОВ', 
            'Volume' => 2, 
            'Weigth' => 0.2,
            'SpecialCode' => '3'
        );
        $client = static::getImlApiClient();
        $response =$client->calcOrderPrice($parameters);
        var_dump($response);
        static::checkResponse($response);
    }
    
    /**
     * get order status 
     * 
     * @group imlget
     */
    public function testGetOrderStatuses() {
        $parameters = array(
            'test'=>true,
            'CustomerOrder'=>'2346C'
        );
        $client = static::getImlApiClient();
        $response =$client->getOrderStatuses($parameters);
        var_dump($response);
        static::checkResponse($response);
    }
    
    /**
     * get order status 
     * 
     * @group imlget
     */
    public function testGetOrders() {
        $parameters = array(
            'test'=>true,
           'CustomerOrder'=>'2346C'
        );
        $client = static::getImlApiClient();
        $response =$client->getOrders($parameters);
        var_dump($response);
        static::checkResponse($response);
    }
    
    /**
     * get service list
     * 
     * @group iml
     */
    public function testListDeliveryStatus() {
        $client = static::getImlApiClient();
        $response = $client->listDeliveryStatus();
        static::checkResponse($response);
    }
    /**
     * get service list
     * 
     * @group iml
     */
    public function testListOrderStatus() {
        $client = static::getImlApiClient();
        $response = $client->listOrderStatus();
        static::checkResponse($response);
    }
    /**
     * get service list
     * 
     * @group iml
     */
    public function testListRegion() {
        $client = static::getImlApiClient();
        $response = $client->listRegion();
        static::checkResponse($response);
    }
    /**
     * get service list
     * 
     * @group imlSD
     */
    public function testListSD() {
        $client = static::getImlApiClient();
        $regionCode = 'МОСКВА';
        $response = $client->listSD($regionCode);
        var_dump($response);
        static::checkResponse($response);
    }
    
    /**
     * get service list
     * 
     * @group iml
     */
    public function testListService() {
        $client = static::getImlApiClient();
        $response = $client->listService();
        static::checkResponse($response);
    }
}
