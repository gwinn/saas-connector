<?php

/**
 * PHP version 7.1
 *
 * @category Dellin
 * @package  SaaS\Service\Dellin\Exception
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Exception;

use SaaS\Exception\ApiException;

/**
 * @category Dellin
 * @package  SaaS\Service\Dellin\Exception
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class DellinApiException extends ApiException
{
    /**
     * @var array
     */
    private $errors = [];

    public function __construct(array $errors)
    {
        parent::__construct("Api exception.");

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
