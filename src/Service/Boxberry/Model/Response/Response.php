<?php
/**
 * PHP version 7.1
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model\Response
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace SaaS\Service\Boxberry\Model\Response;

use Psr\Http\Message\ResponseInterface;
use JMS\Serializer\Exception\RuntimeException;
use SaaS\Exception\ApiException;
use SaaS\Exception\InvalidJsonException;

/**
 * Class Response
 *
 * @category Models
 * @package  SaaS\Service\Boxberry\Model\Response
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
     * @return array|\JMS\Serializer\scalar|mixed|object
     * @throws \SaaS\Exception\ApiException
     */
    protected function serializeResponse(string $raw, string $className)
    {
        try {
            $errors = $this->serializer->deserialize($raw, Error::class, 'json');

            if (isset($errors->error)) {
                throw new ApiException($errors->error);
            }
        } catch (RuntimeException $exception) {
        }

        unset($exception);

        try {
            $response = $this->serializer->deserialize($raw, $className, 'json');
        } catch (RuntimeException $exception) {
            throw new InvalidJsonException(
                sprintf(
                    'Error json: %s | %s (raw: %s)',
                    $className,
                    $exception->getMessage(),
                    $raw
                )
            );
        }

        return $response;
    }
}
