<?php

namespace RetailCrm\Console;

use Symfony\Component\Console\Application as ConsoleApplication;

/**
 * Class Application
 * @package RetailCrm\Console
 */
class Application extends ConsoleApplication
{
    /**
     * @var array $parameters
     */
    protected $parameters = null;

    /**
     * Set command parameters
     *
     * @param $params
     * @throws \InvalidArgumentException
     */
    public function setParameters($params)
    {
        if (!is_array($params)) {
            throw new \InvalidArgumentException('Parameters must be array type');
        }

        $this->parameters = $params;
    }

    /**
     * Return command parameters
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
