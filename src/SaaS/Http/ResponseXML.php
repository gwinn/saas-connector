<?php

/**
 * PHP version 5.3
 *
 * @category SaaS
 * @package  SaaS
 * @author   Anna Mazepina <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
namespace SaaS\Http;

use DOMDocument;
use SaaS\Exception\InvalidXmlException;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * ResponseXML
 *
 * @category SaaS
 * @package  SaaS
 * @author   Anna Mazepina <putintseva@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://github.com/gwinn/saas-connector
 */
class ResponseXML extends BaseResponse
{
    protected function processResponse($responseBody)
    {
        if (!empty($responseBody)) {
            if ($this->statusCode >= 400 && $this->statusCode < 500) {
                throw new InvalidXmlException(
                    "ErrorResponce #$this->statusCode $responseBody",
                    $this->statusCode
                );
            }

            try {
                $document = new DOMDocument();
                $document->loadXML($responseBody);
                $response = XmlFileLoader::convertDomElementToArray($document->documentElement);

                $this->response = $response;
            } catch (\Exception $e) {
                //TODO:Переделать обработку ошибок $response
                $error = libxml_get_last_error()->code;

                throw new InvalidXmlException(
                    "Invalid XML in the API response body. Error code #$error",
                    $error
                );
            }
        }
    }
}
