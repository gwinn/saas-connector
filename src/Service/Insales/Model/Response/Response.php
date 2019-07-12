<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 *
 * @package  SaaS\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Response extends \SaaS\Model\Response\Response implements ResponseInterface
{
    protected function serializeResponse($raw, $className)
    {
        if ($raw == '""') {
            return null;
        }

        return $this->serializer->deserialize($raw, $className, 'json');
    }
}
