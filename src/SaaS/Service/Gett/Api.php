<?php
/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package SaaS\Service\Gett
 * @author Vasyagin Sergey <vasyagin@intaro.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
namespace SaaS\Service\Gett;

use SaaS\Http\Response;

/**
 * Gett API Client
 * @see https://developer.gett.com/docs/business-overview
 *
 * @category ApiClient
 * @package  SaaS\Service\Gett
 * @author Vasyagin Sergey <vasyagin@intaro.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 */
class Api
{
    /**
     * @var string Access token
     */
    protected $token;

    /**
     * @var string Business id
     */
    protected $business_id;

    /**
     * @var Request Request object
     */
    protected $request;

    /**
     * Client constructor.
     *
     * @param string $client_id User client id
     * @param string $client_secret User client secret
     * @param string $business_id Business id
     * @param bool $is_test_mode Enable/disable test mode
     */
    public function __construct($client_id, $client_secret, $business_id, bool $is_test_mode = false)
    {
        if (empty($client_id) || empty($client_secret) || empty($business_id)) {
            throw new \InvalidArgumentException(
                "client_id, client_secret and business_id must be not empty"
            );
        }

        $this->business_id = $business_id;
        $this->request = new Request($is_test_mode);
        $auth = $this->auth($client_id, $client_secret)->getResponse();
        $token = $auth['access_token'];

        $this->token = $token;
    }

    /**
     * Authorization method
     *
     * @param string $client_id User client id
     * @param string $client_secret User client secret
     *
     * @return Response
     */
    public function auth($client_id, $client_secret)
    {
        $path = '/oauth/token';
        $parameters = array(
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'client_credentials',
            'scope' => 'business',
        );

        $headers = array(
            'Content-Type: multipart/form-data'
        );

        return $this->request->makeRequest(null, $path, 'POST', $parameters, $headers);
    }

    /**
     * Gets a request token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get products
     * @see https://developer.gett.com/docs/business-get-products
     *
     * @param array $parameters set of parameters
     * @return Response
     */
    public function getProducts(array $parameters)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters must not be empty");
        }

        $path = '/business/products';
        $parameters['business_id'] = $this->business_id;

        return $this->request->makeRequest($token, $path, 'GET', $parameters);
    }

    /**
     * Get product
     * @see https://developer.gett.com/docs/business-get-products
     *
     * @param string $product_id product id
     * @return Response
     */
    public function getProduct(string $product_id)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($product_id)) {
            throw new \InvalidArgumentException("Product id must not be empty");
        }

        $path = '/business/products/' . $product_id;
        $parameters = array('business_id' => $this->business_id);

        return $this->request->makeRequest($token, $path, 'GET', $parameters);
    }

    /**
     * Get ETA (Estimated time of arrival)
     * @see https://developer.gett.com/docs/business-get-eta
     *
     * @param array $parameters set of parameters
     * @return Response
     */
    public function getEta(array $parameters)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters must not be empty");
        }

        $path = '/business/eta';
        $parameters['business_id'] = $this->business_id;

        return $this->request->makeRequest($token, $path, 'GET', $parameters);
    }

    /**
     * Get price estimate
     * @see https://developer.gett.com/docs/business-get-price-estimate
     *
     * @param array $parameters set of parameters
     * @return Response
     */
    public function getPriceEstimate(array $parameters)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters must not be empty");
        }

        $path = '/business/price';
        $parameters['business_id'] = $this->business_id;

        return $this->request->makeRequest($token, $path, 'GET', $parameters);
    }

    /**
     * Create new ride
     * @see https://developer.gett.com/docs/business-ride-request
     *
     * @param array $parameters set of parameters
     * @return Response
     */
    public function createRide(array $parameters)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters must not be empty");
        }

        $path = '/business/rides?business_id=' . $this->business_id;

        return $this->request->makeRequest($token, $path, 'POST', json_encode($parameters));
    }

    /**
     * Get ride details
     * @see https://developer.gett.com/docs/business-get-ride-details
     *
     * @param string $ride_id ride id
     * @return Response
     */
    public function getRide(string $ride_id)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($ride_id)) {
            throw new \InvalidArgumentException("Ride id must not be empty");
        }

        $path = '/business/rides/' . $ride_id;
        $parameters = array('business_id' => $this->business_id);

        return $this->request->makeRequest($token, $path, 'GET', $parameters);
    }

    /**
     * Update ride
     * @see https://developer.gett.com/docs/business-update-ride
     *
     * @param string $ride_id ride id
     * @param array $parameters set of parameters
     * @return Response
     */
    public function updateRide(string $ride_id, array $parameters)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($ride_id)) {
            throw new \InvalidArgumentException("Ride id must not be empty");
        }

        if (empty($parameters)) {
            throw new \InvalidArgumentException("Parameters must not be empty");
        }

        $path = '/business/rides/' . $ride_id . '?business_id=' . $this->business_id;

        return $this->request->makeRequest($token, $path, 'PATCH', json_encode($parameters));
    }

    /**
     * Cancel ride
     * @see https://developer.gett.com/docs/business-cancel-ride
     *
     * @param string $ride_id ride id
     * @return Response
     */
    public function cancelRide(string $ride_id)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($ride_id)) {
            throw new \InvalidArgumentException("Ride id must not be empty");
        }

        $path = '/business/rides/' . $ride_id . '/cancel?business_id=' . $this->business_id;

        return $this->request->makeRequest($token, $path, 'POST');
    }

    /**
     * Get ride receipt
     * @see https://developer.gett.com/docs/business-get-ride-receipt
     *
     * @param string $ride_id ride id
     * @return Response
     */
    public function getRideReceipt(string $ride_id)
    {
        $token = $this->getToken();

        if (empty($token)) {
            throw new \InvalidArgumentException("Access token must not be empty");
        }

        if (empty($ride_id)) {
            throw new \InvalidArgumentException("Ride id must not be empty");
        }

        $path = '/business/rides/' . $ride_id . '/receipt';
        $parameters = array('business_id' => $this->business_id);

        return $this->request->makeRequest($token, $path, 'GET', $parameters);
    }
}
