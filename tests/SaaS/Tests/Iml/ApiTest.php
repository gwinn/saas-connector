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
     * Create order
     * 
     * @group iml
     */
    public function testCreateOrder() {
        $parameters = array(
            'Test' => 'True', // для тестового режима, иначе не указывайте
            'CustomerOrder' => '2346asd',
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
        static::checkResponse($response);
    }
    
    /**
     * calc order price 
     * 
     * @group iml
     */
    public function testCalcOrderPrice() {
        $parameters = array(
            'Job' => 'C24', // справочник
            'RegionFrom' => 'МОСКВА', // справочник 
            'RegionTo' => 'МОСКВА', // справочник
            'Volume' => 5, 
            'Weigth' => 5,
            'SpecialCode' => '3' //код пункта самовывоза, только для самовывозных услуг, параметр RequestCode в соответствующем справочнике
        );
        $client = static::getImlApiClient();
        $response =$client->calcOrderPrice($parameters);
        static::checkResponse($response);
    }
    
    /**
     * get orders statuses 
     * 
     * @group iml
     */
    public function testGetOrderStatuses() {
        $parameters = array(
            'test'=>true,
            'CustomerOrder'=>'2346C'
        );
        $client = static::getImlApiClient();
        $response =$client->getOrderStatuses($parameters);
        static::checkResponse($response);
    }
    
    /**
     * get orders
     * 
     * @group iml
     */
    public function testGetOrders() {
        $parameters = array(
            'test'=>true,
            'CustomerOrder'=>'2346C'
        );
        $client = static::getImlApiClient();
        $response =$client->getOrders($parameters);
        static::checkResponse($response);
    }
    
    /**
     * get list delivery statuses
     * 
     * @group iml
     */
    public function testGetListDeliveryStatus() {
        $client = static::getImlApiClient();
        $response = $client->getListDeliveryStatus();
        static::checkResponse($response);
    }
    
    /**
     * get list order stasuses
     * 
     * @group iml
     */
    public function testGetListOrderStatus() {
        $client = static::getImlApiClient();
        $response = $client->getListOrderStatus();
        static::checkResponse($response);
    }
    /**
     * get list regions
     * 
     * @group iml
     */
    public function testGetListRegion() {
        $client = static::getImlApiClient();
        $response = $client->getListRegion();
        static::checkResponse($response);
    }
    
    /**
     * get list points of self-export
     * 
     * @group iml
     */
    public function testGetListSD() {
        $client = static::getImlApiClient();
        $response = $client->getListSD();
        static::checkResponse($response);
    }
    
    /**
     * get list points of self-export
     * 
     * @group iml
     */
    public function testGetListSDRegion() {
        $client = static::getImlApiClient();
        $regionCode = 'МОСКВА';
        $response = $client->getListSD($regionCode);
        static::checkResponse($response);
    }
    
    /**
     * get list service
     * 
     * @group iml
     */
    public function testGetListService() {
        $client = static::getImlApiClient();
        $response = $client->getListService();
        static::checkResponse($response);
    }
    
    /**
     * get list resource limit
     * 
     * @group iml
     */
    public function testGetResourceLimit() {
        $client = static::getImlApiClient();
        $response = $client->getResourceLimit();
        static::checkResponse($response);
    }
    
    /**
     * get location warehouse
     * 
     * @group iml
     */
    public function testGetLocation() {
        $client = static::getImlApiClient();
        $response = $client->getLocation();
        static::checkResponse($response);
    }
    
    /**
     * get zone delivery
     * 
     * @group iml
     */
    public function testGetZone() {
        $client = static::getImlApiClient();
        $response = $client->getZone();
        static::checkResponse($response);
    }
    
    /**
     * get exeption of service region
     * 
     * @group iml
     */
    public function testGetExceptionServiceRegion() {
        $client = static::getImlApiClient();
        $response = $client->getExceptionServiceRegion();
        static::checkResponse($response);
    }
    
    /**
     * get post limit
     * 
     * @group iml
     */
    public function testGetPostDeliveryLimit() {
        $client = static::getImlApiClient();
        $response = $client->getPostDeliveryLimit();
        static::checkResponse($response);
    }
    
    /**
     * get location warehouse(Expanded)
     * 
     * @group iml
     */
    public function testGetLocationExt() {
        $client = static::getImlApiClient();
        $response = $client->getLocationExt();
        static::checkResponse($response);
    }
    
    /**
     * Get list status
     * 
     * @group iml
     */
    public function testGetStatus() {
        $client = static::getImlApiClient();
        $response = $client->getStatus();
        static::checkResponse($response);
    }
    
    /**
     * get list post zone
     * 
     * @group iml
     */
    public function testGetPostRateZone() {
        $client = static::getImlApiClient();
        $response = $client->getPostRateZone();
        static::checkResponse($response);
    }
    
    /**
     * get list post for code
     * 
     * @group iml
     */
    public function testGetPostCode() {
        $index ='344092';
        $client = static::getImlApiClient();
        $response = $client->getPostCode($index);
        static::checkResponse($response);
    }
    
    /**
     * get calendar iml
     * 
     * @group iml
     */
    public function testGetCalendar() {
        $client = static::getImlApiClient();
        $response = $client->getCalendar();
        static::checkResponse($response);
    }
    
    /**
     * get all list
     * 
     * @group iml
     */
    public function testGetAll() {
        $client = static::getImlApiClient();
        $response = $client->getAll();
        static::checkResponse($response);
    }
}
