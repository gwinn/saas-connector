<?php

namespace RetailCrm\Interfaces;

interface ClientInterface {

    public function getOrders();

    public function updateStatuses($orders);
}