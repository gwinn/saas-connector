<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Test
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
namespace SaaS\Test;

use SaaS\Http\Response;
use SaaS\Service\Insales\Api as InSalesApi;
use SaaS\Service\Tiu\Api as TiuApi;
use Saas\Service\Inpost\Api as InPostApi;
use SaaS\Service\Courierist\Api as CourieristApi;
use SaaS\Service\Moysklad\Api as MoyskladApi;
use SaaS\Service\Iml\Api as ImlApi;
use SaaS\Service\Fruugo\Api as FruugoApi;
use SaaS\Service\Gett\Api as GettApi;

/**
 * Class TestCase
 *
 * @category ApiClient
 * @package  SaaS\Test
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
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
     * @return InSalesApi
     */
    public static function getInsalesApiClient(
        $domain = null, $apiKey = null, $password = null
    ) {

        $testDomain = $domain ?: $_SERVER['INSALES_DOMAIN'];
        $testApiKey = $apiKey ?: $_SERVER['INSALES_API_KEY'];
        $testPassword = $password ?: $_SERVER['INSALES_PASSWORD'];

        return new InSalesApi($testApiKey, $testPassword, $testDomain);
    }

    /**
     * Get Tiu API clent
     *
     * @param string $token token
     * @param string $url   internal url
     *
     *
     * @return TiuApi
     */
    public static function getTiuApiClient(
        $token = null,
        $url = null
    ) {
        $testToken = !is_null($token) ? $token : $_SERVER['TIU_TOKEN'];
        $testUrl =  !is_null($url) ? $url : $_SERVER['TIU_URL'];

        return new TiuApi($testToken, $testUrl);
    }

    /**
     * Get InPost API clent
     *
     * @return InPostApi
     */
    public static function getInpostApiClient()
    {
        return new InPostApi();
    }

    /**
     * Get Courieris API clent
     *
     * @param string $login login
     * @param string $pass  password
     *
     *
     * @return CourieristApi
     */
    public static function getCourieristApiClient(
        $login = null,
        $pass = null
    ) {
        $testLogin = !is_null($login) ? $login : $_SERVER['COURIERIST_LOGIN'];
        $testPass =  !is_null($pass) ? $pass : $_SERVER['COURIERIST_PASS'];

        return new CourieristApi($testLogin, $testPass);
    }

    /**
     * Get Moysklad API clent
     *
     * @param string $login login
     * @param string $pass  password
     *
     *
     * @return MoyskladApi
     */
    public static function getMoyskladApiClient(
        $login = null,
        $pass = null
    ) {
        $testLogin = !is_null($login) ? $login : $_SERVER['MOYSKLAD_LOGIN'];
        $testPass =  !is_null($pass) ? $pass : $_SERVER['MOYSKLAD_PASSWORD'];

        return new MoyskladApi($testLogin, $testPass);
    }
    
    /**
     * Get Moysklad API clent
     *
     * @param string $login login
     * @param string $pass  password
     *
     *
     * @return ImlApi
     */
    public static function getImlApiClient(
        $login = null,
        $pass = null
    ) {
        $testLogin = !is_null($login) ? $login : $_SERVER['IML_LOGIN'];
        $testPass  =  !is_null($pass) ? $pass : $_SERVER['IML_PASSWORD'];
        return new ImlApi($testLogin, $testPass);
    }

    /**
     * Get Fruugo API clent
     *
     * @param string $login login
     * @param string $password  password
     *
     * @return FruugoApi
     */
    public static function getFruugoApiClient(
        $login = null,
        $password = null
    ) {
        $login = !is_null($login) ? $login : $_SERVER['FRUUGO_LOGIN'];
        $password = !is_null($password) ? $password : $_SERVER['FRUUGO_PASSWORD'];

        return new FruugoApi($login, $password);
    }

    /**
     * Get Gett API clent
     *
     * @param string $client_id client id
     * @param string $client_secret client secret
     * @param string $business_id business id
     * @return GettApi
     */
    public static function getGettApiClient($client_id = null, $client_secret = null, $business_id = null)
    {
        $client_id = !is_null($client_id) ? $client_id : $_SERVER['GETT_CLIENT_ID'];
        $client_secret = !is_null($client_secret) ? $client_secret : $_SERVER['GETT_CLIENT_SECRET'];
        $business_id = !is_null($business_id) ? $business_id : $_SERVER['GETT_BUSINESS_ID'];

        return new GettApi($client_id, $client_secret, $business_id, true);
    }

    /**
     * @param Response $response
     */
    public static function checkResponse(Response $response)
    {
        self::assertInstanceOf('SaaS\Http\Response', $response);
        self::assertTrue(in_array($response->getStatusCode(), array(200, 201)));
        self::assertTrue($response->isSuccessful());
    }
}
