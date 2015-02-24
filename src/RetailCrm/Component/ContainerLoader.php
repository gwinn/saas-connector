<?php

namespace RetailCrm\Component;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use RetailCrm\DependencyInjection\RetailCrmExtension;

class ContainerLoader
{

    public $container;

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $extension = new RetailCrmExtension();
        $this->container->registerExtension($extension);

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('config.yml');

    }

    public function getContainer()
    {
        return $this->container;
    }

}
