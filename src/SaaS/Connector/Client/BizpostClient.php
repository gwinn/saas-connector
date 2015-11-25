<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see https://bizpost.ru/doc/bizpost_API_current.zip
 */

namespace SaaS\Connector\Client;

use SaaS\Connector\Http\Request\BizpostRequest;

/**
 * BizpostClient
 *
 * @package SaaS\Connector\Client
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see https://bizpost.ru/doc/bizpost_API_current.zip
 */

class BizpostClient
{
    public function __construct($login, $password)
    {
        $this->client = new BizpostRequest($login, $password);
    }

    /**
     * Get orders changes
     *
     * @param string $from
     * @param string $till
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function getOrdersChanges($from, $till = null)
    {
        if (empty($from)) {
            throw new \InvalidArgumentException("Date parameter must be not empty");
        }

        $parameters = array('date' => $from);

        if (!is_null($till)) {
            $parameters['date_end'] = $till;
        }

        return $this->client->makeRequest(
            'order_changes.xml',
            BizpostRequest::METHOD_GET,
            $parameters
        );
    }

    /**
     * Get orders statuses
     *
     * @param string $from
     * @param array  $ids
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function getOrdersStatuses($from, array $ids = array())
    {
        $parameters = array(
            'date' => $from,
            'ids' => implode(',', $ids)
        );

        return $this->client->makeRequest(
            'status.xml',
            BizpostRequest::METHOD_GET,
            $parameters
        );
    }

    /**
     * Upload orders
     *
     * @param string $filepath
     * @param string $create possible values: logistic, pickup
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function uploadOrders($filepath, $create = null)
    {
        if (empty($filepath)) {
            throw new \InvalidArgumentException("Date parameter must be not empty");
        }

        $parameters = array('file' => $filepath);

        if (!is_null($create)) {
            $parameters['create'] = $create;
        }

        return $this->client->makeRequest(
            'upload.xml',
            BizpostRequest::METHOD_POST,
            $parameters
        );
    }

    /**
     * Upload store items
     *
     * @param string $filepath
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function uploadStoreItems($filepath)
    {
        if (empty($filepath)) {
            throw new \InvalidArgumentException("Date parameter must be not empty");
        }

        $parameters = array('file' => $filepath);

        return $this->client->makeRequest(
            'store_items_upload.xml',
            BizpostRequest::METHOD_POST,
            $parameters
        );
    }

    /**
     * Get store items
     *
     * @return Response
     */
    public function getStoreItems()
    {
        return $this->client->makeRequest(
            'store_items.xml',
            BizpostRequest::METHOD_GET
        );
    }

    /**
     * Get contractors
     *
     * @return Response
     */
    public function getContractors()
    {
        return $this->client->makeRequest(
            'contractors.xml',
            BizpostRequest::METHOD_GET
        );
    }

    /**
     * Get logistics
     *
     * @return Response
     */
    public function getLogistics()
    {
        return $this->client->makeRequest(
            'logistics.xml',
            BizpostRequest::METHOD_GET
        );
    }

    /**
     * Upload invoice
     *
     * @param string $filepath   invoice file
     * @param string $invoice    invoice number
     * @param string $contractor contractor id
     * @param string $date       invoice date
     * @param string $create     default: debit (debit, credit)
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return Response
     */
    public function uploadInvoice($filepath, $invoice, $contractor = null, $date = null, $create = 'debit')
    {
        if (empty($filepath)) {
            throw new \InvalidArgumentException("Date parameter must be not empty");
        }

        if (empty($invoice)) {
            throw new \InvalidArgumentException("Date parameter must be not empty");
        }

        $parameters = array(
            'invoice' => $filepath,
            'invoice_number' => $invoice,
            'create' => $create
        );

        if (!is_null($contractor)) {
            $parameters['contractor_id'] = $contractor;
        }

        if (!is_null($date)) {
            $parameters['invoice_date'] = $date;
        }

        return $this->client->makeRequest(
            'invoice_upload.xml',
            BizpostRequest::METHOD_POST,
            $parameters
        );
    }
}
