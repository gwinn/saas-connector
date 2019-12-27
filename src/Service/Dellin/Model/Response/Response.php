<?php

/**
 * PHP version 7.1
 *
 * @category Models
 * @package  SaaS\Service\Dellin\Model\Response
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response;

use SaaS\Exception\InvalidJsonException;
use SaaS\Service\Dellin\Exception\DellinApiException;

/**
 * Class Response
 *
 * @category Models
 * @package  SaaS\Service\Dellin\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Response extends \SaaS\Model\Response\Response
{
    /**
     * {@inheritDoc}
     *
     * @throws DellinApiException
     */
    protected function serializeResponse(string $raw, string $className)
    {
        $response = json_decode($raw, true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidJsonException(
                sprintf(
                    'Error json: %s | %s (raw: %s)',
                    $className,
                    json_last_error_msg(),
                    $raw
                )
            );
        }

        if (isset($response['errors'])) {
            $errors = [];

            switch (true) {
                case is_string($response['errors']):
                    $errors[] = $response['errors'];

                    break;

                case is_array($response['errors']):
                    if (array_keys($response['errors']) === range(0, count($response['errors']) - 1)) {
                        foreach ($response['errors'] as $error) {
                            foreach ($error['fields'] as $field) {
                                $errors[$field] = $error['detail'];
                            }
                        }
                    } else {
                        $this->errorAggregate($response['errors'], null, $errors);
                    }

                    break;

                case isset($response['errors']['messages']):
                    $errors = $response['errors']['messages'];

                    break;

                default:
                    $errors[] = 'Unknown error';

                    break;
            }

            if (count($errors) > 0) {
                throw new DellinApiException($errors);
            }
        }

        try {
            return $this->serializer->deserialize($raw, $className, 'json');
        } catch (\Exception $exception) {
            throw new InvalidJsonException(
                sprintf(
                    'Error json: %s | %s (raw: %s)',
                    $className,
                    $exception->getMessage(),
                    $raw
                )
            );
        }
    }

    private function errorAggregate(array $array = [], $root = null, array & $errors = [])
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->errorAggregate($value, (isset($root) ? ($root . '.') : '') . $key, $errors);
            } else {
                $errors[(isset($root) ? ($root . '.') : '') . $key] = $value;
            }
        }
    }
}
