<?php

/**
 * PHP version 5.3
 *
 * @category Horoshop
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://goo.gl/gBlC0T
 */
namespace SaaS\Service\Horoshop;

use SaaS\Http\Response;

/**
 * Hororshop api class
 *
 * @category Horoshop
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://goo.gl/gBlC0T
 */
class Api
{
    protected $token;
    protected $request;

    /**
     * Client constructor.
     *
     * @param string $login    user login
     * @param string $password user password
     */
    public function __construct($login, $password)
    {
        if (empty($login) || empty($password)) {
            throw new \InvalidArgumentException(
                "login & password must be not empty"
            );
        }

        $auth = $this->auth($login, $password);
        $data = json_decode($auth[1], true);
        $token = $data['response']['token'];

        $this->token = $token;
        $this->request = new Request();
    }

    /**
     * Get request token
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Auth method
     *
     * @param string $login    user login
     * @param string $password user password
     *
     * @return Response
     */
    public function auth($login, $password)
    {
        $path = "auth";
        $parameters = array('login' => $login, 'password' => $password);

        return $this->request->makeRequest($path, 'GET', $parameters);
    }

    /**
     * Get orders
     *
     * @param string $token  security token
     * @param array  $params set of parameters
     *
     * @return Response
     */
    public function ordersGet($token, $params = array())
    {
        $path = "orders/get";
        $parameters = array_merge(
            array('additionalData' => true, 'token' => $token),
            $params
        );

        return $this->request->makeRequest($path, 'GET', $parameters);
    }

    /**
     * Update orders
     *
     * @param string $token  security token
     * @param array  $orders orders
     *
     * @return Response
     */
    public function ordersUpdate($token, $orders = array())
    {
        $path = "orders/update";
        $parameters = array('orders' => $orders, 'token' => $token);

        return $this->request->makeRequest($path, 'PUT', $parameters);
    }

    /**
     * Get products
     *
     * @param string $token  security token
     * @param array  $params set of parameters
     *
     * @return Response
     */
    public function productsGet($token, $params = array())
    {
        $path = "catalog/export";
        $parameters = array_merge(array('token' => $token), $params);

        return $this->request->makeRequest($path, 'GET', $parameters);
    }

    /**
     * Get categories
     *
     * @param string $token  security token
     * @param array  $params set of parameters
     *
     * @return Response
     */
    public function categoriesGet($token, $params = array())
    {
        $path = "pages/export";
        $parameters = array_merge(array('token' => $token), $params);

        return $this->request->makeRequest($path, 'GET', $parameters);
    }

    /**
     * Get currency
     *
     * @param string $token  security token
     * @param array  $params set of parameters
     *
     * @return Response
     */
    public function currencyGet($token, $params = array())
    {
        $path = "currency/export";
        $parameters = array_merge(array('token' => $token), $params);

        return $this->request->makeRequest($path, 'GET', $parameters);
    }
}
