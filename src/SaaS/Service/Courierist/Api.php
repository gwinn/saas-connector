<?php
/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Courierist
 * @author   Segey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * 
 */
namespace SaaS\Service\Courierist;

use SaaS\Http\Response;

/**
 * Tiu API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Courierist
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * 
 */
class Api {

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
        $data = json_decode($auth, true);
        $token = $data['access_token'];

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
        $path = 'access/login';
        $parameters = array('login' => $login, 'password' => $password);

        return $this->request->makeRequest($path, 'POST', $parameters);
    }

    /**
     * Get cost of order
     *
     * @param string $token      security token
     * @param array  $parameters set of parameters
     *
     * @return Response
     */
    public function orderCost($token, array $parameters = array())
    {
        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters responce must be not empty");
        }

        $path = 'order/evaluate';

        return $this->request->makeRequest($token, $path, 'POST', $parameters);
    }

    /**
     * Set orders create
     *
     * @param string $token      security token
     * @param array  $parameters set of parameters
     *
     * @return Response
     */
    public function orderCreate($token, array $parameters = array())
    {
        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters responce must be not empty");
        }

        $path = 'order/create';

        return $this->request->makeRequest($token, $path, 'POST', $parameters);
    }

    /**
     * Set order status
     *
     * @param string $token       security token
     * @param string $id          id order
     * @param array  $parameters  set of parameters
     * 
     * @return Response
     */
    public function orderStatus($token, $id, array $parameters = array())
    {
        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        if (empty($id)) {
            throw new \InvalidArgumentException("Id order must be not empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters responce must be not empty");
        }

        $path = sprintf('order/update/%s', $id);

        return $this->request->makeRequest($token, $path, 'POST', $parameters);
    }

    /**
     * Get order
     *
     * @param string $token  security token
     * @param string $id     order
     *
     * @return Response
     */
    public function order($token, $id)
    {
        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        if (empty($id)) {
            throw new \InvalidArgumentException("Id order must be not empty");
        }

        $path = sprintf('order/%s', $id);

        return $this->request->makeRequest($token, $path, 'GET');
    }

    /**
     * Get all orders
     *
     * @param string $token  security token
     *
     * @return Response
     */
    public function ordersAll($token)
    {
        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        $path = 'order/get-all';

        return $this->request->makeRequest($token, $path, 'GET');
    }
}