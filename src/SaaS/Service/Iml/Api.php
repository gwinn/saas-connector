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
        $this->client = new Request($login, $password);
    }
    
    /**
     * Get status order
     * 
     * @param array $parameters set of parameters request
     * 
     * @return Response
     */
    public function getOrderStatuses(array $parameters = array()){
        
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }
        
        return $this->client->makeRequest('GetStatuses', 
               'POST', 
                $parameters
                );
    }
    
    /**
     * Get orders
     * 
     * @param array $parameters set of parameters request
     * 
     * @return Responce
     */
    public function getOrders(array $parameters = array()){
        
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }
        
        return $this->client->makeRequest('GetOrders', 
               'POST', 
                $parameters
                );
    }
    
    /**
     * Create orders
     * 
     * @param array $parameters set of parameters request
     * 
     * @return Responce
     */
    public function createOrder(array $parameters = array()){
        
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }
        
        return $this->client->makeRequest('CreateOrder', 
               'POST', 
                $parameters
                );
    }
    
    /**
     * Calculate orders
     * 
     * @param array $parameters set of parameters request
     * 
     * @return Responce
     */
    public function calcOrderPrice(array $parameters = array()){
        
        if (empty($parameters) ){
            throw new \InvalidArgumentException(
                "parameters request must be not empty"
            );
        }
        
        return $this->client->makeRequest('GetPrice',
               'POST',
                $parameters
                );
    }
    
    /**
     * Get list delivery status
     * 
     * @return Responce
     */
    public function listDeliveryStatus(){
        
        return $this->client->makeRequest('deliverystatus', 
                'GET');
        
    }
    
    /**
     * Get list order status
     * 
     * @return Responce
     */
    public function listOrderStatus(){
        
        return $this->client->makeRequest('orderstatus', 
                'GET');
        
    }
    
    /**
     * Get list region
     * 
     * @return Responce
     */
    public function listRegion(){
        
        return $this->client->makeRequest('region', 
                'GET');
        
    }
    
    /**
     * Get  list ex items
     * 
     * @return Responce
     */
    public function listSD($regionCode = null){
        
        $parameters = array();
        
        if(!empty($regionCode)){
            $parameters['RegionCode'] = $regionCode;
        }
        
        return $this->client->makeRequest('sd', 
                'GET',$parameters);
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function listService(){
        
        return $this->client->makeRequest('service', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getResourceLimit(){
        
        return $this->client->makeRequest('ResourceLimit', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getLocation(){
        
        return $this->client->makeRequest('Location', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getZone(){
        
        return $this->client->makeRequest('zone', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getExceptionServiceRegion(){
        
        return $this->client->makeRequest('ExceptionServiceRegion', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getPostDeliveryLimit(){
        
        return $this->client->makeRequest('PostDeliveryLimit', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getLocationExt(){
        
        return $this->client->makeRequest('LocationExt', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getStatus(){
        
        return $this->client->makeRequest('status', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getPostRateZone(){
        
        return $this->client->makeRequest('PostRateZone', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getPostCode(){
        
        return $this->client->makeRequest('PostCode', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getCalendar(){
        
        return $this->client->makeRequest('calendar', 
                'GET');
        
    }
    
    /**
     * Get list service
     * 
     * @return Responce
     */
    public function getAll(){
        
        return $this->client->makeRequest('all', 
                'GET');
        
    }
}
