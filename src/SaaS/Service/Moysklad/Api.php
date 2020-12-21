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
        'month',
        'syncid'

    );
    const REQUEST_ATTRIBUTES_SECOND = array(
        'accounts',
        'contactpersons',
        'packs',
        'cashiers',
        'positions',
        'audit'
    );

    /**
     * JsonAPI client МойСклад
     *
     * @var Request
     * @access protected
     */
    protected $client;

    /**
     * Entity mapping
     *
     * @var array
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
        'prepayment' => 'entity',
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
        'sales' => 'report',
        'bundle' => 'entity',
        'audit' => 'audit'
    );

    /**
     * Constructor
     *
     * @param string $login
     * @param string $password
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
     * Adding extra headers
     *
     * @param array $value  set of extra headers
     */
    public function addHeaders($value)
    {
        $this->client->addHeaders($value);
    }

    /**
     * Get data.
     *
     * @param array $params
     * @param array $filters
     *
     * @throws \InvalidArgumentException
     * @throws MoySkladException
     *
     * @access public
     *
     * @return Response
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

        if (in_array('syncid', $params)) {
            $inc = 1;
        } else {
            $inc = 0;
        }

        if (!empty($filters)) {
            if (is_array($filters)) {
                foreach ($filters as $index => $value) {
                    $filter[$index] = $value;
                }

                unset($index, $value);
            } else {
                throw new \InvalidArgumentException('Wrong `filters` type: `filters` must be an "array"');
            }
        }

        switch (count($params)) {
            case 3:
            case 4:
                $this->checkUuid($params[(1+$inc)]);

                if (gettype($params[(2+$inc)]) !== 'string') {
                    throw new \InvalidArgumentException('Wrong second attribute: attribute must be a "string"');
                }

                if (!in_array($params[(2+$inc)], self::REQUEST_ATTRIBUTES_SECOND)) {
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
                $this->checkUuid($params[(3+$inc)]);
                break;
        }

        if ($this->entity[strtolower(reset($params))] != reset($params)) {
            $uri = $this->entity[strtolower(reset($params))] . '/';
        } else {
            $uri = '/';
        }

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
     * @param array $expand
     *
     * @access public
     *
     * @return Response
     *
     * @throws MoySkladException
     */
    public function createData($param, $data, $expand = [])
    {
        if (empty($data)) {
            throw new \InvalidArgumentException('The `data` can not be empty');
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Wrong `data` type: `data` must be an "array"');
        }

        if (is_array($param) && count($param) >= 2) {
            $type = $param[0];
            $uuid = $param[1];
            $this->checkUuid($uuid);
            $stype = !empty($param[2]) ? $param[2] : null;

            if (
                !is_null($stype) &&
                !in_array($stype, self::REQUEST_ATTRIBUTES_SECOND)
            ) {
                throw new \InvalidArgumentException(sprintf('Wrong attribute: `%s`', $stype));
            }
        } else {
            $type = $param;
            $uuid = null;
            $stype = null;
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

        if (!empty($expand)) {
            if (!is_array($expand)) {
                throw new \InvalidArgumentException('Wrong `expand` type: `expand` must be an "array"');
            }

            $parameters['expand'] = $expand;
        }

        return $this->client->makeRequest(
            $this->entity[strtolower($type)] .
            '/' .
            $type .
            (!is_null($uuid) ? ('/'.$uuid) : '') .
            (!is_null($stype) ? ('/'.$stype) : ''),
            Request::METHOD_POST,
            $parameters
        );
    }

    /**
     * Update data.
     *
     * @param string $type
     * @param string $uuid
     * @param array  $data
     * @param array  $expand
     *
     * @access public
     *
     * @return Response
     *
     * @throws MoySkladException
     */
    public function updateData($type, $uuid, $data, $expand = [])
    {
        if (empty($type) || is_null($type)) {
            throw new \InvalidArgumentException('The `type` can not be empty');
        }

        $this->checkUuid($uuid);

        if (empty($data)) {
            throw new \InvalidArgumentException('The `data` can not be empty');
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Wrong `data` type: `data` must be an "array"');
        }

        $parameters['data'] = $data;

        if (!empty($expand)) {
            if (!is_array($expand)) {
                throw new \InvalidArgumentException('Wrong `expand` type: `expand` must be an "array"');
            }

            $parameters['expand'] = $expand;
        }

        if (is_array($type)) {
            if (gettype($type[0]) !== 'string') {
                throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
            }

            if (empty($this->entity[strtolower($type[0])])) {
                throw new \InvalidArgumentException('Undefined data type');
            }

            $this->checkUuid($type[1]);

            if (empty($type[2])) {
                throw new \InvalidArgumentException('Not found second attribute');
            }

            if (!in_array($type[2], self::REQUEST_ATTRIBUTES_SECOND)) {
                throw new \InvalidArgumentException(sprintf('Wrong attribute: `%s`', $type[2]));
            }

            return $this->client->makeRequest(
                sprintf($this->entity[strtolower($type[0])] . '/' . implode('/', $type) . '/%s', $uuid),
                Request::METHOD_PUT,
                $parameters
            );
        } else {
            if (gettype($type) !== 'string') {
                throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
            }

            if (empty($this->entity[strtolower($type)])) {
                throw new \InvalidArgumentException('Undefined data type');
            }

            return $this->client->makeRequest(
                sprintf($this->entity[strtolower($type)] . '/' . $type . '/%s', $uuid),
                Request::METHOD_PUT,
                $parameters
            );
        }
    }

    /**
     * Delete data.
     *
     * @param string $type
     * @param string $uuid
     * @param bool $trash
     *
     * @access public
     *
     * @return Response
     *
     * @throws MoySkladException
     */
    public function deleteData($type, $uuid, $trash = false)
    {
        if (empty($type) || is_null($type)) {
            throw new \InvalidArgumentException('The `type` can not be empty');
        }

        $this->checkUuid($uuid);

        if (is_array($type)) {
            if (gettype($type[0]) !== 'string') {
                throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
            }

            if (empty($this->entity[strtolower($type[0])])) {
                throw new \InvalidArgumentException('Undefined data type');
            }

            $this->checkUuid($type[1]);

            if (empty($type[2])) {
                throw new \InvalidArgumentException('Not found second attribute');
            }

            if (!in_array($type[2], self::REQUEST_ATTRIBUTES_SECOND)) {
                throw new \InvalidArgumentException(sprintf('Wrong attribute: `%s`', $type[2]));
            }

            return $this->client->makeRequest(
                sprintf($this->entity[strtolower($type[0])] . '/' . implode('/', $type) . '/%s', $uuid),
                Request::METHOD_DELETE
            );
        } else {
            if (gettype($type) !== 'string') {
                throw new \InvalidArgumentException('Wrong `type`: `type` must be a "string"');
            }

            if (empty($this->entity[strtolower($type)])) {
                throw new \InvalidArgumentException('Undefined data type');
            }

            if (true === $trash) {
                return $this->client->makeRequest(
                    sprintf($this->entity[strtolower($type)] . '/' . $type . '/%s', $uuid .'/trash'),
                    Request::METHOD_POST
                );
            } else {
                return $this->client->makeRequest(
                    sprintf($this->entity[strtolower($type)] . '/' . $type . '/%s', $uuid),
                    Request::METHOD_DELETE
                );
            }
        }
    }

    /**
     * Check uuid.
     *
     * @param string $uuid
     * @throws \InvalidArgumentException
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
