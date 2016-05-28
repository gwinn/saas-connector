<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Test
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Test;

use SaaS\Service\Insales\Api;

/**
 * Class TestCase
 *
 * @category ApiClient
 * @package  SaaS\Test
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Get InSales API clent
     *
     * @param null $domain   internal domain
     * @param null $apiKey   token
     * @param null $password password
     *
     * @return Api
     */
    public static function getInsalesApiClient(
        $domain = null, $apiKey = null, $password = null
    ) {

        $testDomain = $domain ?: $_SERVER['INSALES_DOMAIN'];
        $testApiKey = $apiKey ?: $_SERVER['INSALES_API_KEY'];
        $testPassword = $password ?: $_SERVER['INSALES_PASSWORD'];

        return new Api($testApiKey, $testPassword, $testDomain);
    }
}
