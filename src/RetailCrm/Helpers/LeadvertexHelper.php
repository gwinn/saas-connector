<?php

namespace RetailCrm\Helpers;

class LeadvertexHelper {

    /**
     * @param array $orders
     * @param array $settings
     * @param $orderMethod
     *
     * @return array
     */
    public function prepare($orders, $settings, $orderMethod)
    {
        $statuses = $settings['leadvertex'][$orderMethod]['statuses'];

        $preparedOrders = array();

        foreach ($orders as $order)
        {
            $_resStatus = 'new';

            foreach ($statuses as $status) {
                if($status['name'] == $order['status']) {
                    $_resStatus = $order['code'];
                    break;
                }
            }

            $preparedOrders[] = array(
                'externalId' => $order['externalId'],
                'status' => $_resStatus,
                'name' => $order['fio'],
                'phone' => $order['phone'],
                'email' => $order['email'],
                'createdAt' => $order['createdAt'],
                'orderMethod' => $orderMethod,
                'customFields' => array(
                    'lead_domain' => $order['lead_domain'],
                    'ip' => $order['ip'],
                    'utm_source' => $order['utm_source'],
                    'utm_medium' => $order['utm_medium'],
                    'utm_campaign' => $order['utm_campaign'],
                    'utm_term' => $order['utm_term'],
                    'utm_content' => $order['utm_content']
                )
            );
        }

        return $preparedOrders;
    }

}
