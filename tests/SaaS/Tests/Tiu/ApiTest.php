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
        $client   = static::getTiuApiClient();
        $response = $client->paymentList();
        static::checkResponse($response);
    }

    /**
     * Test using the method productsList
     *
     * @group tiu
     */
    public function testProductsList()
    {
        $client   = static::getTiuApiClient();
        $response = $client->productsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method getProductId
     *
     * @expectedException \InvalidArgumentException
     *
     * @group tiu
     */
    public function testGetProductsId()
    {
        $client = static::getTiuApiClient();
        $client->getProductsId(null);
    }

    /**
     * Test using the method getProductsExternalId
     *
     * @expectedException \InvalidArgumentException
     *
     * @group tiu
     */
    public function testGetProductsExternalId()
    {
        $client = static::getTiuApiClient();
        $client->getProductsExternalId(null);
    }

    /**
     * Test using the method productEditExternalId
     *
     * @expectedException \InvalidArgumentException
     *
     * @group tiu
     */
    public function testProductEditExternalId()
    {
        $client = static::getTiuApiClient();
        $client->productEditExternalId();
    }

    /**
     * Test using the method productEdit
     *
     * @group tiu
     */
    public function testProductEdit()
    {
        $parameters = array(
            array(
                "id"       => 247402196,
                "presence" => "available",
                "price"    => 150,
                "status"   => "on_display"
            )
        );

        $client   = static::getTiuApiClient();
        $response = $client->productEdit($parameters);
        static::checkResponse($response);
    }

    /**
      * Test using the method clientsList
      *
      * @group tiu
      */
    public function testClientsList()
    {

        $parameters = array(
            'limit'       => 1,
            'last_id'     => 8240087,
            'search_term' => '790000000'
        );

        $client = static::getTiuApiClient();
        $response = $client->clientsList($parameters);
        static::checkResponse($response);
    }

    /**
      * Test using the method getClientsId
      *
      * @group tiu
      */
    public function testGetClientsId()
    {
        $client   = static::getTiuApiClient();
        $response = $client->getClientsId(8240086);
        static::checkResponse($response);
    }

    /**
      * Test using the method groupsList
      *
      * @group tiu
      */
    public function testgroupsList()
    {
        $client   = static::getTiuApiClient();
        $response = $client->groupsList();
        static::checkResponse($response);
    }

    /**
     * Test using the method ordersSetStatus
     *
     * @group tiu
     */
    public function testOrdersSetStatus()
    {
        $parameters= array (
            "status"              => "canceled",
            'ids'                 => array(5993155),
            "cancellation_reason" => "not_available",
            "cancellation_text"   => "string"
        );

        $client   = static::getTiuApiClient();
        $response = $client->ordersSetStatus($parameters);
        static::checkResponse($response);

    }

    /**
     * Test using the method ordersList
     *
     * @group tiu
     */
    public function testOrdersList()
    {
        $parameters = array(
            'status' => 'delivered',
            'limit'  => 2
        );

        $client   = static::getTiuApiClient();
        $response = $client->ordersList();
        static::checkResponse($response);

    }

    /**
     * Test using the method getOrderId
     *
     * @group tiu
     */
    public function testGetOrderId()
    {
        $client   = static::getTiuApiClient();
        $response = $client->getOrderId(5993155);
        static::checkResponse($response);
    }

    /**
     * Test using the method getMessagesList
     *
     * @group tiu
     */
    public function testGetMessagesList()
    {
        $client   = static::getTiuApiClient();
        $response = $client->getMessagesList();
        static::checkResponse($response);
    }

    /**
     * Test using the method getMessagesId
     *
     * @group tiu
     */
    public function testGetMessagesId()
    {
        $client   = static::getTiuApiClient();
        $response = $client->getMessagesId(4008157);
        static::checkResponse($response);
    }

    /**
     * Test using the method messagesSetStatus
     *
     * @group tiu
     */
    public function testMessagesSetStatus()
    {
        $parameters = array(
            "status" => "unread",
            "ids"    => array(4008157)
        );

        $client   = static::getTiuApiClient();
        $response = $client->messagesSetStatus($parameters);
        static::checkResponse($response);
    }

    /**
     * Test using the method messagesReply
     *
     * @group tiu
     */
    public function testMessagesReply()
    {
        $parameters = array(
            "id"      => 4008157,
            "message" => "Ваше сообщение очень важно для нас. С вами свяжется наш оператор"
        );

        $client   = static::getTiuApiClient();
        $response = $client->messagesReply($parameters);
        static::checkResponse($response);
    }
}
