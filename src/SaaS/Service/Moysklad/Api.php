<?php

/**
 * PHP version 5.6
 *
 * @category ApiClient
 * @package  SaaS\Service\Moysklad
 * @author   Andrey Artahanov <azgalot9@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://online.moysklad.ru/api/remap/1.1/doc/index.html
 */

namespace SaaS\Service\Moysklad;

use SaaS\Http\Response;
use SaaS\Exception\MoySkladException;

/**
 * MoySklad API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Moysklad
 * @author   Andrey Artahanov <azgalot9@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://online.moysklad.ru/api/remap/1.1/doc/index.html
 */
class Api
{
    /**
     * Requests
     */
    const REQUEST_ATTRIBUTES_MAIN = array(
        'metadata',
        'all',
        'bystore',
        'byoperation',
        'day',
        'week',
        'month'
    );
    const REQUEST_ATTRIBUTES_SECOND = array(
        'accounts',
        'contactpersons',
        'packs',
        'cashiers',
        'positions'
    );

    /**
     * JsonAPI client МойСклад
     *
     * @var client
     * @access protected
     */
    protected $client;

    /**
     * Entity mapping
     *
     * @var entity
     * @access protected
     */
    protected $entity = array(
        'salesreturn' => 'entity',
        'counterparty' => 'entity',
        'dashboard' => 'report',
        'dasboard' => 'report',
        'assortment' => 'entity',
        'currency' => 'entity',
        'product' => 'entity',
        'service' => 'entity',
        'productfolder' => 'entity',
        'variant' => 'entity',
        'consignment' => 'entity',
        'contract' => 'entity',
        'project' => 'entity',
        'companysettings' => 'entity',
        'expenseitem' => 'entity',
        'country' => 'entity',
        'group' => 'entity',
        'discount' => 'entity',
        'uom' => 'entity',
        'uon' => 'entity',
        'employee' => 'entity',
        'customentity' => 'entity',
        'store' => 'entity',
        'organization' => 'entity',
        'retailstore' => 'entity',
        'cashier' => 'entity',
        'webhook' => 'entity',
        'move' => 'entity',
        'demand' => 'entity',
        'paymentin' => 'entity',
        'cashin' => 'entity',
        'retailshift' => 'entity',
        'enter' => 'entity',
        'customerorder' => 'entity',
        'purchaseorder' => 'entity',
        'purchase' => 'entity',
        'invoiceout' => 'entity',
        'invoicein' => 'entity',
        'paymentout' => 'entity',
        'cashout' => 'entity',
        'supply' => 'entity',
        'loss' => 'entity',
        'retaildemand' => 'entity',
        'retailsalesreturn' => 'entity',
        'retaildrawercashin' => 'entity',
        'retaildrawercashout' => 'entity',
        'purchasereturn' => 'entity',
        'factureout' => 'entity',
        'facturein' => 'entity',
        'inventory' => 'entity',
        'commissionreportin' => 'entity',
        'commissionreportout' => 'entity',
        'pricelist' => 'entity',
        'processingplan' => 'entity',
        'processingorder' => 'entity',
        'processing' => 'entity',
        'internalorder' => 'entity',
        'stock' => 'report',
        'sales' => 'report'
    );

    /**
     * Filters for get data requests
     * @var main_filters
     * @access protected
     */
    protected $main_filters = array(
        "updatedFrom",
        "updatedTo",
        "updatedBy",
        "state.name",
        "state.id",
        "organization.id",
        "search",
        "isDeleted",
        "limit",
        "offset",
        "filters",
        "expand"
    );

    /**
     * Constructor
     *
     * @param string $login
     * @param string $password
     *
     * @throws MoySkladException
     *
     * @access public
     *
     * @return void
     */
    public function __construct($login, $password)
    {
        $this->client = new Request($login, $password);
    }
    
    /**
     * Getter
     *
     * @param string $property
     *
     * @return Mixed
     */
    public function __get($property)
    {
        return $this->{$property};
    }

    /**
     * Get data.
     *
     * @param array $params
     * @param array $filters
     *
     * @throws \InvalidArgumentException
     *
     * @access public
     *
     * @return ApiResponse
     */
    public function getData(
        $params,
        $filters = array()
    ) {
        if (empty($params) || is_null($params)) {
            throw new \InvalidArgumentException('The `params` can not be empty');
        }

        if (!is_array($params)) {
            throw new \InvalidArgumentException('Wrong `params` type: `params` must be an "array"');
        }

        if (gettype(reset($params)) !== 'string') {
            throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
        }

        if (empty($this->entity[strtolower(reset($params))])) {
            throw new \InvalidArgumentException('Undefined data type');
        }

        $filter = array();

        if (count($params) > 4) {
            throw new \InvalidArgumentException('Too many attribute...');
        }

        switch (count($params)) {
            case 1:
            case 2:
                if (!empty($filters)) {
                    if (is_array($filters)) {
                        if (!empty(array_diff(array_keys($filters), $this->main_filters))) {
                            throw new \InvalidArgumentException(
                                sprintf(
                                    'Wrong main filters: `%s`',
                                    implode(', ', array_diff(array_keys($filters), $this->main_filters))
                                )
                            );
                        }
                        foreach ($filters as $index => $value) {
                            $filter[$index] = $value;
                        }
                        unset($index, $value);
                    } else {
                        throw new \InvalidArgumentException('Wrong `filters` type: `filters` must be an "array"');
                    }
                }
                break;
            case 3:
            case 4:
                $this->checkUuid($params[1]);

                if (gettype($params[2]) !== 'string') {
                    throw new \InvalidArgumentException('Wrong second attribute: attribute must be a "string"');
                }

                if (!in_array($params[2], self::REQUEST_ATTRIBUTES_SECOND)) {
                    throw new \InvalidArgumentException(sprintf('Wrong attribute: `%s`', $params[2]));
                }
                break;
        }

        switch (count($params)) {
            case 2:
                if (!in_array($params[1], self::REQUEST_ATTRIBUTES_MAIN)) {
                    $this->checkUuid($params[1]);
                }
                break;
            case 4:
                $this->checkUuid($params[3]);
                break;
        }

        $uri = $this->entity[strtolower(reset($params))] . '/';

        foreach ($params as $param) {
            $uri .= $param . '/';
        }
        unset($param);
        $uri = trim($uri, '/');

        return $this->client->makeRequest(
            $uri,
            Request::METHOD_GET,
            $filter
        );
    }

    /**
     * Create data.
     *
     * @param mixed $param
     * @param array $data
     *
     * @access public
     *
     * @return Response
     */
    public function createData($param, $data)
    {
        if (empty($data)) {
            throw new \InvalidArgumentException('The `data` can not be empty');
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Wrong `data` type: `data` must be an "array"');
        }

        if (is_array($param) && count($param) == 2) {
            $type = $param[0];
            $uuid = $param[1];
            $this->checkUuid($uuid);
        } else {
            $type = $param;
            $uuid = null;
        }

        if (gettype($type) !== 'string') {
            throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
        }

        if (empty($type) || is_null($type)) {
            throw new \InvalidArgumentException('The `param` can not be empty');
        }

        if (empty($this->entity[strtolower($type)])) {
            throw new \InvalidArgumentException('Undefined data type');
        }

        $parameters['data'] = $data;

        return $this->client->makeRequest(
            $this->entity[strtolower($type)] . '/' . $type . (!is_null($uuid) ? ('/'.$uuid) : ''),
            Request::METHOD_POST,
            $parameters
        );
    }

    /**
     * Update data.
     *
     * @param string $type
     * @param string $uuid
     * @param json $data
     *
     * @access public
     *
     * @return Response
     */
    public function updateData($type, $uuid, $data)
    {
        if (empty($type) || is_null($type)) {
            throw new \InvalidArgumentException('The `type` can not be empty');
        }

        if (gettype($type) !== 'string') {
            throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
        }

        if (empty($this->entity[strtolower($type)])) {
            throw new \InvalidArgumentException('Undefined data type');
        }

        $this->checkUuid($uuid);

        if (empty($data)) {
            throw new \InvalidArgumentException('The `data` can not be empty');
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Wrong `data` type: `data` must be an "array"');
        }

        $parameters['data'] = $data;

        return $this->client->makeRequest(
            sprintf($this->entity[strtolower($type)] . '/' . $type . '/%s', $uuid),
            Request::METHOD_PUT,
            $parameters
        );
    }

    /**
     * Delete data.
     *
     * @param string $type
     * @param string $uuid
     *
     * @access public
     *
     * @return Response
     */
    public function deleteData($type, $uuid)
    {
        if (empty($type) || is_null($type)) {
            throw new \InvalidArgumentException('The `type` can not be empty');
        }

        if (gettype($type) !== 'string') {
            throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
        }

        if (empty($this->entity[strtolower($type)])) {
            throw new \InvalidArgumentException('Undefined data type');
        }

        $this->checkUuid($uuid);

        return $this->client->makeRequest(
            sprintf($this->entity[strtolower($type)] . '/' . $type . '/%s', $uuid),
            Request::METHOD_DELETE
        );
    }

    /**
     * Check uuid.
     *
     * @param string $uuid
     * @throws InvalidArgumentException
     *
     * @access private
     *
     * @return void
     */
    private function checkUuid($uuid)
    {
        if (is_null($uuid) || empty($uuid)) {
            throw new \InvalidArgumentException('The `uuid` can not be empty');
        }

        if (gettype($uuid) !== 'string') {
            throw new \InvalidArgumentException('Wrong `uuid` type: `uuid` must be a "string"');
        }

        if (!preg_match("#^[\w\d]{8}-[\w\d]{4}-[\w\d]{4}-[\w\d]{4}-[\w\d]{12}$#", $uuid)) {
            if (preg_match("#^[a-z\d]+$#i", $uuid)) {
                throw new \InvalidArgumentException(sprintf('Wrong attribute: `%s`', $uuid));
            }
            throw new \InvalidArgumentException('The `uuid` has invalid format');
        }
    }
}
