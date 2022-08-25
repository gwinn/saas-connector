<?php

namespace SaaS\Http;

use InvalidArgumentException;

/**
 * ResponseText
 *
 * @category SaaS
 * @package  SaaS
 * @author   Vladimir Kolchin <kolchin@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
class ResponseText extends BaseResponse
{
    protected function processResponse($responseBody)
    {
        if (!empty($responseBody)) {
            $this->response = $responseBody;
        }
    }
}
