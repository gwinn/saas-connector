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
use SaaS\Service\Insales\Exception\InsalesLimitException;

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
    /**
     * @param string $raw
     * @param string $className
     *
     * @return array|\JMS\Serializer\scalar|mixed|object|null
     */
    protected function serializeResponse(string $raw, string $className)
    {
        if ($raw == '""') {
            return null;
        }

        return $this->serializer->deserialize($raw, $className, 'json');
    }

    /**
     * Response constructor.
     *
     * @param ResponseInterface $response
     * @param string            $className
     *
     * @throws InsalesLimitException
     */
    public function __construct(ResponseInterface $response, $className)
    {
        parent::__construct($response, $className);

        $this->checkLimitException($response);
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws InsalesLimitException
     */
    protected function checkLimitException(ResponseInterface $response): void
    {
        if ($response->getStatusCode() == 503
            && $response->hasHeader('Retry-After')
        ) {
            $retryAfter = current($response->getHeader('Retry-After'));

            $apiUsageLimit = $response->hasHeader('API-Usage-Limit')
                ? current($response->getHeader('API-Usage-Limit'))
                : null;

            $message = [
                'message' => 'Requested API limit exceeded',
                'Retry-After' => $retryAfter,
                'API-Usage-Limit' => $apiUsageLimit
            ];

            $limit = new InsalesLimitException((string) json_encode($message), $response->getStatusCode());
            $limit->setRetryAfter($retryAfter);
            $limit->setApiUsageLimit($apiUsageLimit);

            throw $limit;
        }
    }
}
