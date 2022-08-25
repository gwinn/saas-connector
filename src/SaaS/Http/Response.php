<?php

/**
 * PHP version 5.3
 *
 * @category SaaS
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
namespace SaaS\Http;

use InvalidArgumentException;
use SaaS\Exception\InvalidJsonException;

/**
 * Response
 *
 * @category SaaS
 * @package  SaaS
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
class Response extends BaseResponse
{
    protected $responseBody;

    protected function processResponse($responseBody)
    {
        $this->responseBody = $responseBody;

        if (!empty($responseBody)) {
            $response = json_decode($responseBody, true);
            $message = array();
            if ($this->statusCode >= 400 && $this->statusCode < 500) {
                if (is_array($response)) {
                    foreach ($response as $key =>  $value) {
                        $message[] =  "$key: " . (is_array($value) ? implode(', ', $value) : $value);
                    }
                    throw new InvalidArgumentException(
                        implode(' ', $message),
                        $this->statusCode
                    );

                } else {
                    throw new InvalidArgumentException(
                        "ErrorResponce #$this->statusCode $responseBody",
                        $this->statusCode
                    );
                }
            }
            if (!$response
                && JSON_ERROR_NONE !== ($error = json_last_error())
            ) {
                throw new InvalidJsonException(
                    "Invalid JSON in the API response body. Error code #$error",
                    $error
                );
            }

            $this->response = $response;
        }
    }

    /**
     * Return HTTP response raw
     *
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
