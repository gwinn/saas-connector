<?php
/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Courierist
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 *
 */
namespace SaaS\Service\Courierist;

use SaaS\Http\Response;

/**
 * Courierist API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Courierist
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://retailcrm.ru Proprietary
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
        $this->request = new Request();
        $auth = $this->auth($login, $password)->getResponse();
        $token = $auth['access_token'];

        $this->token = $token;
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

        return $this->request->makeRequest(null, $path, 'POST', $parameters);
    }

    /**
     * Get cost of order
     *
     * @param array  $parameters set of parameters
     *
     * @return Response
     */
    public function orderCost(array $parameters = array())
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters response must be not empty");
        }

        $path = 'order/evaluate';

        return $this->request->makeRequest($token, $path, 'POST', $parameters);
    }

    /**
     * Set orders create
     *
     * @param array  $parameters set of parameters
     *
     * @return Response
     */
    public function orderCreate(array $parameters = array())
    {
        $token = $this->getToken();

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
     * @param string $id          id order
     * @param array  $parameters  set of parameters
     *
     * @return Response
     */
    public function orderStatus($id, array $parameters = array())
    {
        $token = $this->getToken();

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
     * @param string $id     order id
     *
     * @return Response
     */
    public function order($id)
    {
        $token = $this->getToken();

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
     * @return Response
     */
    public function ordersAll()
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must be not empty");
        }

        $path = 'order/get-all';

        return $this->request->makeRequest($token, $path, 'GET');
    }
}
