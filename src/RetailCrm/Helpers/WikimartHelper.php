<?php

namespace RetailCrm\Helpers;

use RetailCrm\Component\Utils;

class WikimartHelper {

    /**
     * @param array $orders
     * @param array $settings
     *
     * @return array
     */
    public function prepare($orders, $settings)
    {

        $orderStatuses = $settings['statuses'];
        $orderPayment = $settings['payment'];
        $orderDelivery = $settings['delivery'];

        $preparedOrders = array();

        foreach($orders as $unit)
        {
            $order = array(
                'orderMethod' => 'wikimart',
                'externalId' => $unit->id,
                'number' => $unit->code,
                'createdAt' => date('Y-m-d H:i:s', strtotime($unit->createTime)),
                'status' => $orderStatuses[$unit->status],
                'name' => $unit->buyer->name,
                'phone' => $unit->buyer->phones[0],
                'email' => $unit->buyer->email,
                'customerId' => $unit->buyer->clientId,
                'customerComment' => $unit->delivery->comment,
                'paymentType' => $orderPayment[$unit->payment->serviceCode],
                'delivery' => array(
                    'address' => array(
                        'index' => $unit->delivery->postcode,
                        'region' => $unit->delivery->region,
                        'city' => $unit->delivery->city,
                        'house' => $unit->delivery->house,
                        'building' => $unit->delivery->building,
                        'floor' => $unit->delivery->floor,
                        'intercomCode' => $unit->delivery->intercom,
                        'text' => $unit->delivery->address
                    ),
                    'cost' => $unit->delivery->cost,
                    'code' => $orderDelivery[$unit->delivery->type],
                    'date' => $unit->delivery->date
                ),

            );

            foreach ($unit->positions as $item) {
                $order['items'][] = array(
                    'productId' => $item->offerId,
                    'initialPrice' => $item->price,
                    'productName' => $item->name,
                    'quantity' => $item->quantity,
                    'discount' => $item->discount
                );
            }

            $order = Utils::clearArray($order);

            $preparedOrders[] = $order;
        }

        return $preparedOrders;
    }

}
