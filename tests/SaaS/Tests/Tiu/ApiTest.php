<?php
/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Tiu
 * @author   Sergey
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */

namespace SaaS\Tests\Tiu;

use SaaS\Test\TestCase;

/**
 * Class Test
 *
 * @category ApiClient
 * @package  SaaS\Tests\Tiu
 * @author   Sergey
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class ApiTest extends TestCase
{
    /**
      * Test using the method paimentList
      * 
      * @group tiu
      */
    public function testPaymentList()
    {
        $client = static::getTiuApiClient();
        $response = $client->paymentList();
        var_dump($response);
    }
    
    /**
      * Test using the method productsList
      * 
      * @group productList
      */
    public function testProductsList()
    {
        
        $client = static::getTiuApiClient();
        $response = $client->productsList();
        var_dump($response);
    }
    
    /**
      * Test using the method getProductId
      * 
      * @group productId
      */
    public function testGetProductsId()
    {
        $client = static::getTiuApiClient();
        $response = $client->getProductsId(247402196);
        var_dump($response);
    }
    
     /**
     * Test using the method getProductsExternalId
     *
     * @group productExternalId
     */
    public function testGetProductsExternalId()
    {

        $client = static::getTiuApiClient();
        $response = $client->getProductsExternalId();
        var_dump($response);
    }
    
     /**
     * Test using the method productEditExternalId
     *
     * @group productExternalId
     */
    public function testProductEditExternalId()
    {
        
        
        $client = static::getTiuApiClient();
        $response = $client->productEditExternalId();
        var_dump($response);
    }
    
    /**
     * Test using the method productEdit
     *
     * @group productEdit
     */
    public function testProductEdit()
    {
        $parameters = array(
            array(
            "id"=> 247402196,
            "presence"=> "available",
            "price"=> 99999,
            "status"=> "on_display"
                )
      );
        $client = static::getTiuApiClient();
        $response = $client->productEdit($parameters);
        var_dump($response);
    }
    
    /**
      * Test using the method clientsList
      * 
      * @group client 
      */
    public function testClientsList()
    {
        $client = static::getTiuApiClient();
        $response = $client->clientsList();
        var_dump($response);
    }
    
    /**
      * Test using the method getClientsId
      * 
      * @group client
      */
    public function testGetClientsId()
    {
        $client = static::getTiuApiClient();
        $response = $client->getClientsId(8240086);
        var_dump($response);
    }
    
    /**
      * Test using the method groupsList
      * 
      * @group tiu 
      */
    public function testgroupsList()
    {
        $client = static::getTiuApiClient();
        $response = $client->groupsList();
        var_dump($response);
    }

    /**
     * Test using the method ordersSetStatus
     *
     * @group order
     */
    public function testOrdersSetStatus()
    {
        $parameters= array (
            "status" => "pending",
            'ids' => array(5993155),
            "cancellation_reason" => "not_available",
            "cancellation_text" => "string"
        );
        $client = static::getTiuApiClient();
        $response = $client->ordersSetStatus($parameters);
        var_dump($response);
    }

    /**
     * Test using the method ordersList
     *
     * @group order
     */
    public function testOrdersList()
    {

        $client = static::getTiuApiClient();
        $response = $client->ordersList();
        var_dump($response);
    }

    /**
     * Test using the method getOrderId
     *
     * @group order
     */
    public function testGetOrderId()
    {

        $client = static::getTiuApiClient();
        $response = $client->getOrderId(5993155);
        var_dump($response);
    }

    /**
     * Test using the method productsImportExel
     *
     * @group imports
     */
    public function testProductsImportExel()
    {

        $client = static::getTiuApiClient();
        $response = $client->productsImportExel();
        var_dump($response);
    }

    /**
     * Test using the method productsList
     *
     * @group imports
     */
    public function testCheckImportStatus()
    {

        $client = static::getTiuApiClient();
        $response = $client->checkImportStatus();
        
        var_dump($response);
        
    }

    /**
     * Test using the method getMessagesList
     *
     * @group message
     */
    public function testGetMessagesList()
    {

        $client = static::getTiuApiClient();
        $response = $client->getMessagesList();
        
        var_dump($response);
        
    }

    /**
     * Test using the method getMessagesId
     *
     * @group message
     */
    public function testGetMessagesId()
    {

        $client = static::getTiuApiClient();
        $response = $client->getMessagesId(4008157);
        
        var_dump($response);
        
    }

    /**
     * Test using the method messagesSetStatus
     *
     * @group message
     */
    public function testMessagesSetStatus()
    {
        $parameters = array(
            "status"=> "read",
            "ids"=> array(4008157)
        );
        $client = static::getTiuApiClient();
        $response = $client->messagesSetStatus($parameters);
        var_dump($response);
    }

    /**
     * Test using the method messagesReply
     *
     * @group message
     */
    public function testMessagesReply()
    {
        $parameters = array(
            "id"=> 4008157,
            "message"=> "Ваше сообщение очень важно для нас. С вами свяжется наш оператор"
        );
        $client = static::getTiuApiClient();
        $response = $client->messagesReply($parameters);
        var_dump($response);
    }
}