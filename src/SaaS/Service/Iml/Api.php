<?php
/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Iml
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 *
 */
namespace SaaS\Service\Iml;

use SaaS\Http\Response;

/**
 * Iml API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Iml
 * @author   Sergey <sergeygv1990@mail.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 *
 */
class Api {

    protected $client;

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

        $this->client = new Request($login, $password);
    }

    /**
     * Get status order
     *
     * @param array $parameters set of parameters request
     *
     * @return Response
     */
    public function getOrderStatuses(array $parameters = array())
    {
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }
        if (empty($parameters['BarCode']) && empty($parameters['CustomerOrder'])){
            throw new \InvalidArgumentException(
                "BarCode or CustomerOrder must be not empty"
            );
        }

        return $this->client->makeRequest('GetStatuses', 'POST', $parameters);
    }

    /**
     * Get orders
     *
     * @param array $parameters set of parameters request
     *
     * @return Responce
     */
    public function getOrders(array $parameters = array())
    {
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }

        return $this->client->makeRequest('GetOrders', 'POST', $parameters );
    }

    /**
     * Create orders
     *
     * @param array $parameters set of parameters request
     *
     * @return Responce
     */
    public function createOrder(array $parameters = array())
    {
        $argumentArray = array ('CustomerOrder', 'Job', 'Contact', 'RegionCodeTo', 'RegionCodeFrom','Phone');

        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }

        foreach ($argumentArray as $argument){
            if (empty($parameters[$argument])){
                throw new \InvalidArgumentException(
                    "Not all values are filled in"
                );
            }
        }
        return $this->client->makeRequest('CreateOrder', 'POST', $parameters);
    }

    /**
     * Calculate orders
     *
     * @param array $parameters set of parameters request
     *
     * @return Responce
     */
    public function calcOrderPrice(array $parameters = array())
    {
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }

        return $this->client->makeRequest('GetPrice', 'GET', $parameters);
    }

    /**
     * Get reference delivery status
     *
     * @return Responce
     */
    public function getListDeliveryStatus()
    {
        return $this->client->makeRequest('deliverystatus', 'GET');
    }

    /**
     * Get reference order status
     *
     * @return Responce
     */
    public function getListOrderStatus(){

        return $this->client->makeRequest('orderstatus', 'GET');
    }

    /**
     * Get reference region
     *
     * @return Responce
     */
    public function getListRegion()
    {
        return $this->client->makeRequest('region', 'GET');
    }

    /**
     * Get  list point self-delivery
     *
     * @param string $regionCode region from list region
     *
     * @return Responce
     */
    public function getListSD($regionCode = null)
    {
        $parameters = array();

        if(!empty($regionCode)){
            $parameters['RegionCode'] = $regionCode;
        }

        return $this->client->makeRequest('sd', 'GET',$parameters);

    }

    /**
     * Get reference service
     *
     * @return Responce
     */
    public function getListService()
    {
        return $this->client->makeRequest('service', 'GET');
    }

    /**
     * Get resource limit
     *
     * @return Responce
     */
    public function getResourceLimit()
    {
        return $this->client->makeRequest('ResourceLimit', 'GET');
    }

    /**
     * Get location warehouse
     *
     * @return Responce
     */
    public function getLocation()
    {
        return $this->client->makeRequest('Location', 'GET');
    }

    /**
     * Get zone delivery
     *
     * @return Responce
     */
    public function getZone()
    {
        return $this->client->makeRequest('zone', 'GET');
    }

    /**
     * Get exeption service region
     *
     * @return Responce
     */
    public function getExceptionServiceRegion()
    {
        return $this->client->makeRequest('ExceptionServiceRegion', 'GET');
    }

    /**
     * Get post delivery limit
     *
     * @return Responce
     */
    public function getPostDeliveryLimit(){

        return $this->client->makeRequest('PostDeliveryLimit', 'GET');
    }

    /**
     * Get location warehouse expanded
     *
     * @return Responce
     */
    public function getLocationExt()
    {
        return $this->client->makeRequest('LocationExt', 'GET');
    }

    /**
     * Get list status
     *
     * @return Responce
     */
    public function getStatus()
    {
        return $this->client->makeRequest('status', 'GET');
    }

    /**
     * Get post zone delivery
     *
     * @return Responce
     */
    public function getPostRateZone()
    {
        return $this->client->makeRequest('PostRateZone', 'GET');
    }

    /**
     * Get post delivery for code
     *
     * @param $index index post (required)
     *
     * @return Responce
     */
    public function getPostCode($index)
    {
        $parameters = array();

        if(empty($index) || !isset($index)){
            throw new \InvalidArgumentException(
                "index must be established and must be not empty"
            );
        }else{
            $parameters = array('index' => $index);
        }

        return $this->client->makeRequest('PostCode', 'GET',$parameters);
    }

    /**
     * Get calendar IML
     *
     * @return Responce
     */
    public function getCalendar()
    {
        return $this->client->makeRequest('calendar', 'GET');
    }

    /**
     * Get All references
     *
     * @return Responce
     */
    public function getAll()
    {
        return $this->client->makeRequest('all', 'GET');
    }

}
