<?php

/**
 * PHP version 5.3
 *
 * @package SaaS\Service\Bizpost
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see https://bizpost.ru/doc/bizpost_API_current.zip
 */

namespace SaaS\Service\Bizpost;

use SaaS\Http\Response;

/**
 * BizpostClient
 *
 * @package SaaS\Service\Bizpost
 * @author Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link http://github.com/gwinn/saas-connector
 * @see https://bizpost.ru/doc/bizpost_API_current.zip
 */

class Api
{
    /**
     * Api constructor.
     *
     * @param $login
     * @param $password
     */
    public function __construct($login, $password)
    {
        $this->client = new Request($login, $password);
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
            Request::METHOD_GET,
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
            Request::METHOD_GET,
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
            Request::METHOD_POST,
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
            Request::METHOD_POST,
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
            Request::METHOD_GET
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
            Request::METHOD_GET
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
            Request::METHOD_GET
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
            Request::METHOD_POST,
            $parameters
        );
    }
}
