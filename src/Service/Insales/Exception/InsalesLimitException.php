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
 * Class InsalesLimitException
 *
 * @category Exception
 * @package  SaaS
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 */
class InsalesLimitException extends \Exception
{
    protected $retryAfter;
    protected $apiUsageLimit;

    /**
     * @return mixed
     */
    public function getRetryAfter()
    {
        return $this->retryAfter;
    }

    /**
     * @param mixed $retryAfter
     */
    public function setRetryAfter($retryAfter): void
    {
        $this->retryAfter = $retryAfter;
    }

    /**
     * @return mixed
     */
    public function getApiUsageLimit()
    {
        return $this->apiUsageLimit;
    }

    /**
     * @param mixed $apiUsageLimit
     */
    public function setApiUsageLimit($apiUsageLimit): void
    {
        $this->apiUsageLimit = $apiUsageLimit;
    }
}
