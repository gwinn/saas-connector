<?php

namespace SaaS\Http;

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
abstract class BaseResponse implements \ArrayAccess
{
    protected $statusCode;
    protected $response;

    public function __construct($statusCode, $responseBody = null)
    {
        $this->statusCode = (int) $statusCode;
        $this->processResponse($responseBody);
    }

    abstract protected function processResponse($responseBody);

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
