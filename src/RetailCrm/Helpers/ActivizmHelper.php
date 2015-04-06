<?php

namespace RetailCrm\Helpers;

class ActivizmHelper {

    /**
     * @param array $orders
     * @param array $settings
     *
     * @return array
     */
    public function prepare($orders, $settings)
    {

        $orderStatuses = $settings['activizm']['statuses'];
        $deliveryCodes = $settings['activizm']['delivery'];
        $paymentTypes = $settings['activizm']['payment'];

        $preparedOrders = array();

        foreach($orders as $unit)
        {
            $order = array(
                'externalId' => $unit['orderNumber'],
                'status' => $orderStatuses[$unit['statusId']],
                'createdAt' => $unit['createdAt'],
                'paymentType' => $paymentTypes[$unit['paymentType']],
                'delivery' => array(
                    'code' => $deliveryCodes[$unit['deliveryType']],
                    'address' => array('text' => $unit['address'])
                ),
                'managerComment' => $unit['orderNotes'],
                'email' => $unit['clientEmail'],
                'phone' => $unit['clientPhone'],
                'firstName' => $unit['clientFirstName'],
                'patronymic' => $unit['clientPatronymicName'],
                'lastName' => $unit['clientLastName']
            );

            foreach ($unit['orderItems'] as $item) {
                $order['items'][] = array(
                    'productId' => $item['xmlOfferId'],
                    'productName' => $item['title'],
                    'initialPrice' => $item['price'],
                    'quantity' => $item['count']
                );
            }

            $preparedOrders[] = $order;
        }

        return $preparedOrders;
    }

}
