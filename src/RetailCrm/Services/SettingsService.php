<?php

namespace RetailCrm\Services;

/**
 * Class SettingsService
 * @package RetailCrm
 */
class SettingsService
{

    private $api;

    const GETTER = 'get';
    const SETTER = 'set';

    /**
     * Constructor
     * @param $api
     */
    public function __construct($api)
    {
        $this->api = $api;

    }

    /**
     * @param $name
     * @param $arguments
     * @return bool|mixed
     */
    public function __call($name, $arguments)
    {
        $action = substr($name, 0, 3);
        $propertyName = strtolower(substr($name, 3, 1)) . substr($name, 4);
        $value = empty($arguments) ? '' : $arguments[0];
        $returnValue = true;

        if (!isset($this->$propertyName)) {
            throw new \InvalidArgumentException("Method \"$name\" not found");
        }

        if ($action == self::GETTER) {
            $returnValue = $this->$propertyName;
        } elseif ($action == self::SETTER) {
            $this->$propertyName = $value;
        }

        return $returnValue;
    }
}
