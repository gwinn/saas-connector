<?php

namespace RetailCrm\Component;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use RetailCrm\DependencyInjection\RetailCrmExtension;

class ContainerLoader
{

    public $container;

    public function __construct($path = null)
    {
        $this->container = new ContainerBuilder();
        $this->container->setParameter('logpath', dirname($path) . '/../log/');

        $extension = new RetailCrmExtension();
        $this->container->registerExtension($extension);

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('config.yml');

        if ($path != null) {
            $loader->load($path);
        }


    }

    public function getContainer()
    {
        return $this->container;
    }

}
