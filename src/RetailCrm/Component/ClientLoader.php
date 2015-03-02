<?php

namespace RetailCrm\Component;

class ClientLoader
{
    private $instance;

    public function __construct($key)
    {
        $class = "RetailCrm\\Client\\" . ucfirst($key);
        $container = new ContainerLoader();
        $this->instance = new $class($container->getContainer()->get('platform'));
    }

    public function getInstance()
    {
        return $this->instance;
    }
}
