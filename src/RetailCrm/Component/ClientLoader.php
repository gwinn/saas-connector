<?php

namespace RetailCrm\Component;

class ClientLoader
{
    private $instance;

    public function __construct($key, $settings, $logger)
    {
        $class = "RetailCrm\\Client\\" . ucfirst($key);
        $this->instance = new $class($settings, $logger);
    }

    public function getInstance()
    {
        return $this->instance;
    }
}
