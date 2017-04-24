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
use InvalidArgumentException;
use SaaS\Exception\InvalidJsonException;
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
class ResponseXML implements \ArrayAccess
{
    protected $statusCode;
    protected $response;

    /**
     * Response constructor.
     *
     * @param integer $statusCode   status code
     * @param mixed   $responseBody response body content
     */
    public function __construct($statusCode, $responseBody = null)
    {
        $this->statusCode = (int) $statusCode;

        if (!empty($responseBody)) {
            $message = [];
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
        } else {

        }
    }

    /**
     * Return HTTP response status code
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Return HTTP response body
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * HTTP request was successful
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->statusCode < 400;
    }

    /**
     * Allow to access for the property throw class method
     *
     * @param string $name      method name
     * @param array  $arguments method arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        // convert getSomeProperty to someProperty
        $propertyName = strtolower(substr($name, 3, 1)) . substr($name, 4);

        if (!isset($this->response[$propertyName])) {
            throw new \InvalidArgumentException("Method \"$name\" not found");
        }

        return $this->response[$propertyName];
    }

    /**
     * Allow to access for the property throw object property
     *
     * @param string $name property name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (!isset($this->response[$name])) {
            throw new \InvalidArgumentException("Property \"$name\" not found");
        }

        return $this->response[$name];
    }

    /**
     * Set offset
     *
     * @param mixed $offset offset value
     * @param mixed $value  value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        throw new \BadMethodCallException(
            "This call not allowed: offsetSet [$offset] [$value]"
        );
    }

    /**
     * Unset offset
     *
     * @param mixed $offset offset value
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException(
            "This call not allowed: offsetSet [$offset]"
        );
    }

    /**
     * Check offset
     *
     * @param mixed $offset offset value
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->response[$offset]);
    }

    /**
     * Get offset
     *
     * @param mixed $offset offset value
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (!isset($this->response[$offset])) {
            throw new \InvalidArgumentException("Property \"$offset\" not found");
        }

        return $this->response[$offset];
    }
}
