<?php

namespace RetailCrm\Response;

use RetailCrm\Response\ApiResponse;

/**
 * Response from retailCRM API
 */
class Response extends ApiResponse implements \ArrayAccess
{

    public function __construct($statusCode, $responseBody = null)
    {
        parent::__construct($statusCode, $responseBody);
    }

    /**
     * Return HTTP response body
     *
     * @return int
     */
    public function getResponse()
    {
        return $this->response;
    }
}
