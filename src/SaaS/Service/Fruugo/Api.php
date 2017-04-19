<?php

/**
 * PHP version 5.3
 *
 * @category Fruugo
 * @package  SaaS
 * @author   Anna Mazepina <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://sell.fruugo.com/fruugo-docs/Selling_on_Fruugo_-_Order_API.pdf
 */
namespace SaaS\Service\Fruugo;

use DateTime;
use SaaS\Http\Response;

/**
 * Fruugo api class
 *
 * @category Fruugo
 * @package  SaaS
 * @author   Anna Mazepina <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://sell.fruugo.com/fruugo-docs/Selling_on_Fruugo_-_Order_API.pdf
 */
class Api
{
    protected $request;

    /**
     * Client constructor.
     *
     * @param string $login    user login
     * @param string $password user password
     */
    public function __construct($login, $password)
    {
        //TODO: Неизвестна механика авторизации. Не проверено
        if (empty($login) || empty($password)) {
            throw new \InvalidArgumentException(
                'login & password must be not empty'
            );
        }

        $this->request = new Request();
    }

    /**
     * Download orders
     *
     * @param DateTime $from    Start date for the order listing
     * @param DateTime $to      End date for the order listing (optional)
     *
     * @return Response
     */
    public function ordersDownload($from, $to)
    {
        $path = 'orders/download';
        $parameters = [
            'from'  => $from,
            'to'    => $to,
        ];

        return $this->request->makeRequest($path, Request::METHOD_GET, $parameters);
    }


    /**
     * Confirm order
     *
     * @param string        $orderId        The id of the order to confirm
     * @param array         $item           fruugoProductId, fruugoSkuId and quantity of the item to confirm, separated with commas.
     * @param DateTime|null $shippingDate   Estimate of the date when the order is likely to ship (optional)
     * @param array         $message        A message relayed to the customer or to Fruugo (optional)
     *
     * @return Response
     */
    public function ordersConfirm($orderId, $item = [], $shippingDate = null, $message = [])
    {
        //TODO: Перепроверить как нужно передавать $item
        $path = 'orders/confirm';

        if (empty($orderId)) {
            throw new \InvalidArgumentException('Order id must be set');
        }

        $parameters = [
            'orderId'               => $orderId,
            'item'                  => isset($item) ? $item : null,
            'estimatedShippingDate' => isset($shippingDate) ? $shippingDate : null,
            'messageToCustomer'     => isset($message['toCustomer']) ? $message['toCustomer'] : null,
            'messageToFruugo'       => isset($message['toFruugo']) ? $message['toFruugo'] : null,
        ];

        $parameters = array_filter($parameters);

        return $this->request->makeRequest($path, Request::METHOD_POST, $parameters);
    }

    /**
     * Cancel order
     *
     * @param string    $orderId    The id of the order whose items to cancel
     * @param string    $reason     Reason for the cancellation
     * @param array     $item       fruugoProductId, fruugoSkuId and quantity of the item to confirm, separated with commas.
     * @param array     $message    A message relayed to the customer or to Fruugo (optional)
     *
     * @return Response
     */
    public function ordersCancel($orderId, $reason, $item = [], $message = [])
    {
        $path = 'orders/cancel';

        if (empty($orderId)) {
            throw new \InvalidArgumentException('Order id must be set');
        }

        $cancellationReasons = [
            'out_of_stock',             //the product is out of stock and thus cannot be delivered
            'product_discontinued',     //product is no longer available and thus cannot be delivered
            'invalid_delivery_address', //customer has given a delivery address that appears invalid
            'customer_cancellation',    //customer has has asked for the order to be cancelled
            'legislation_restriction',  //law or contract restriction prevents delivery to customer's address
            'other',                    //other reason
        ];

        if (isset($reason) && !in_array($reason, $cancellationReasons)) {
            throw new \InvalidArgumentException(
                'Reason for the cancellation must be set. Valid values are:' . implode(', ', $cancellationReasons)
            );
        }

        $parameters = [
            'orderId'               => $orderId,
            'item'                  => isset($item) ? $item : null,
            'cancellationReason'    => isset($reason) ? $reason : null,
            'messageToCustomer'     => isset($message['toCustomer']) ? $message['toCustomer'] : null,
            'messageToFruugo'       => isset($message['toFruugo']) ? $message['toFruugo'] : null,
        ];

        $parameters = array_filter($parameters);

        return $this->request->makeRequest($path, Request::METHOD_POST, $parameters);
    }

    /**
     * Ship order
     *
     * @param string        $orderId        The id of the order whose items to ship
     * @param array         $item           fruugoProductId, fruugoSkuId and quantity of the item to confirm, separated with commas.
     * @param string|null   $trackingCode   Tracking code of the package, sent to the customer in the shipment notification email
     * @param array         $message        A message relayed to the customer or to Fruugo (optional)
     *
     * @return Response
     */
    public function orderShip($orderId, $item = [], $trackingCode = null, $message = [])
    {
        $path = 'orders/ship';

        if (empty($orderId)) {
            throw new \InvalidArgumentException('Order id must be set');
        }

        $parameters = [
            'orderId'               => $orderId,
            'item'                  => isset($item) ? $item : null,
            'trackingCode'          => isset($trackingCode) ? $trackingCode : null,
            'messageToCustomer'     => isset($message['toCustomer']) ? $message['toCustomer'] : null,
            'messageToFruugo'       => isset($message['toFruugo']) ? $message['toFruugo'] : null,
        ];

        $parameters = array_filter($parameters);

        return $this->request->makeRequest($path, Request::METHOD_POST, $parameters);
    }

    /**
     * Return order
     *
     * @param string        $orderId    The id of the order whose items are to be marked returned
     * @param array         $item       fruugoProductId, fruugoSkuId and quantity of the item to confirm, separated with commas
     * @param string|null   $reason     Reason for the returned (optional)
     * @param array         $message    A message relayed to the customer or to Fruugo (optional)
     *
     * @return Response
     */
    public function orderReturn($orderId, $item = [], $reason = null, $message = [])
    {
        $path = 'orders/return';

        if (empty($orderId)) {
            throw new \InvalidArgumentException('Order id must be set');
        }

        $ReturnReasons = [
            'unsatisfied_with_item',            //customer was not satisfied with the item
            'item_did_not_match_description',   //item didn't match the product description
            'damaged_item',                     //item was damaged
            'wrong_item',                       //wrong item was shipped to the customer
            'other',                            //other reason
        ];

        if (isset($reason) && !in_array($reason, $ReturnReasons)) {
            throw new \InvalidArgumentException(
                'Reason for the returned. Valid values are:' . implode(', ', $ReturnReasons)
            );
        }

        $parameters = [
            'orderId'               => $orderId,
            'item'                  => isset($item) ? $item : null,
            'cancellationReason'    => isset($reason) ? $reason : null,
            'messageToCustomer'     => isset($message['toCustomer']) ? $message['toCustomer'] : null,
            'messageToFruugo'       => isset($message['toFruugo']) ? $message['toFruugo'] : null,
        ];

        $parameters = array_filter($parameters);

        return $this->request->makeRequest($path, Request::METHOD_POST, $parameters);
    }

    /**
     * Download packing list PDF
     *
     * @param string $orderId       The id of the order whose packing list to download
     * @param string $shipmentId    The id of the shipment whose packing list to download
     *
     * @return Response
     */
    public function orderPackinglist($orderId, $shipmentId)
    {
        $path = 'orders/packinglist';

        if (empty($orderId)) {
            throw new \InvalidArgumentException('Order id must be set');
        }

        if (empty($shipmentId)) {
            throw new \InvalidArgumentException('Shipment id must be set');
        }

        $parameters = [
            'orderId'       => $orderId,
            'shipmentId'    => $shipmentId,
        ];

        $parameters = array_filter($parameters);

        return $this->request->makeRequest($path, Request::METHOD_POST, $parameters);
    }
}
