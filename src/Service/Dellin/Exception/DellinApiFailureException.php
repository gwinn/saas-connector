<?php

/**
 * PHP version 7.1.
 *
 * @category Dellin
 *
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 *
 * @see     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */

namespace SaaS\Service\Dellin\Exception;

use SaaS\Exception\ApiException;
use SaaS\Model\Response\Response;

/**
 * @category Dellin
 *
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 *
 * @see     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class DellinApiFailureException extends ApiException
{
    /** @var Response */
    private $response;

    public function __construct(string $message, Response $response)
    {
        parent::__construct($message);

        $this->response = $response;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
