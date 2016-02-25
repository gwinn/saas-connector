<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Freshlogic
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://fresh-logic.ru/
 */
namespace SaaS\Service\Freshlogic;

use SaaS\Http\Response;

/**
 * FreshlogicClient
 *
 * @package SaaS\Service\Freshlogic
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see http://fresh-logic.ru/
 */
class Api
{

    /**
     * @param string $login
     * @param string $password
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

    public function DocOutIn($params)
    {
        $url = "/Docout_in";

        return $this->client->makeRequest($url, Request::METHOD_POST, $params);
    }
}
