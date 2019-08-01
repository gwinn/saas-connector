<?php

/**
 * PHP version 7.1
 *
 * @category Exception
 * @package  SaaS
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
namespace SaaS\Service\Insales\Exception;

/**
 * Class InsalesApiException
 *
 * @category Exception
 * @package  SaaS
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class InsalesApiException extends \Exception
{
    public static function messageParameterNotFound($name)
    {
        return sprintf('Parameter `%s` must be set', $name);
    }
}
