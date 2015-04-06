<?php

namespace RetailCrm\Component;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContainerLoader
{

    public $container;

    public function __construct($path = null)
    {
        $this->container = new ContainerBuilder();
        $this->container->setParameter('logpath', dirname($path) . '/../log/');

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        if ($path != null) {
            $loader->load($path);
        }
    }

    public function getContainer()
    {
        return $this->container;
    }

}
