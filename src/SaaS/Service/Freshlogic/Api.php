<?php

/**
 * PHP version 5.3
 *
 * @category FreshLogic
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://fresh-logic.ru/
 */
namespace SaaS\Service\Freshlogic;

use SaaS\Http\Response;

/**
 * FreshLogic api class
 *
 * @category FreshLogic
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://fresh-logic.ru/
 */
class Api
{

    /**
     * Constructor
     *
     * @param string $login    user login
     * @param string $password user password
     */
    public function __construct($login, $password)
    {
        $this->client = new Request(
            array(
                'login' => $login,
                'password' => $password
            )
        );
    }

    /**
     * Create delivery order
     *
     * @param array $params set of input parameters
     *
     * @return Response
     */
    public function docOutIn($params)
    {
        $url = "/Docout_in";

        return $this->client->makeRequest($url, Request::METHOD_POST, $params);
    }
}
