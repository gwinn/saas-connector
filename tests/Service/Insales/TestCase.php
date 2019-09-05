<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Insales;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use ReflectionClass;
use SaaS\Model\Response\Response;
use SaaS\Service\Insales;

/**
 * Class TestCase
 *
 * @package  SaaS\Tests
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /* @var Serializer $serializer */
    protected $serializer;

    protected function setUp()
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()->setPropertyNamingStrategy(
            new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(
                new \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy()
            )
        )->build();
    }

    public function getApiClient($mockHandler = null)
    {
        $domain = 'http://shop.myinsales.ru';
        $apiKey = 'login';
        $password = 'password';

        if (empty($mockHandler)) {
            $mockHandler = new GuzzleHttp\Handler\MockHandler([]);
        }

        $client = new GuzzleHttp\Client(
            array_merge(
                Insales::CONFIG, [
                    'base_uri' => $domain,
                    'auth' => [$apiKey, $password],
                    'handler' => GuzzleHttp\HandlerStack::create($mockHandler),
                ]
            )
        );

        $apiClient = new Insales('login', 'password', 'http://shop.myinsales.ru');

        $reflection = new ReflectionClass($apiClient);
        $property = $reflection->getProperty('client');
        $property->setAccessible(true);
        $property->setValue($apiClient, $client);

        return $apiClient;
    }

    public function getMockHandler($responses = [])
    {
        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $mockHandler = [];

        foreach ($responses as $response) {
            $body = isset($response['body'])
                ? $response['body']
                : $this->serializer->serialize($this->getMockData($response), 'json');

            $mockHandler[] = new GuzzleHttp\Psr7\Response(
                $response['statusCode'],
                $response['headers'] ?? [],
                $body
            );
        }

        return new GuzzleHttp\Handler\MockHandler($mockHandler);
    }

    public function getMockData($config)
    {
        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $list = isset($config['list']) ? $config['list'] : 1;

        if (isset($config['className'])) {
            $object = [];

            for ($i = 1; $i <= $list; $i++) {
                $item = new $config['className']();
                $fakeMock->fill($item);
                $item = $this->setFixedValue($item, $config['fixedValue'] ?? null);

                if (isset($config['properties'])) {
                    $item = $this->getMockObjectInObject($item, $config['properties']);
                }

                $object[] = $item;
            }

            $object = isset($config['list']) ? $object : current($object);

            return $object;
        }

        return '';
    }

    public function getMockObjectInObject($object, $properties)
    {
        $reflection = new \ReflectionClass($object);

        foreach ($properties as $nameProperty => $property) {
            $reflectionProperty = $reflection->getProperty($nameProperty);
            $reflectionProperty->setAccessible(true);

            $reflectionProperty->setValue($object, $this->getMockData($property));
        }

        return $object;
    }

    public function setFixedValue($object, $fixedValue)
    {
        if (!is_array($fixedValue)) {
            return $object;
        }

        $reflection = new \ReflectionClass($object);

        foreach ($fixedValue as $nameProperty => $value) {
            $property = $reflection->getProperty($nameProperty);
            $property->setAccessible(true);
            $property->setValue($object, $value);
        }

        return $object;
    }

    public static function assertResponse(Response $response)
    {
        static::assertNotEmpty($response);
        static::assertIsObject($response);
        static::assertInstanceOf(Insales\Model\Response\Response::class, $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertIsString($response->getResponseRaw());
    }

    public static function assertResponseList(Response $response, $elementClassName, $countElement = 1)
    {
        static::assertIsArray($response->getResponse());
        static::assertCount($countElement, $response->getResponse());

        foreach ($response->getResponse() as $element) {
            static::assertInstanceOf($elementClassName, $element);
        }
    }

    public static function assertResponseGet(Response $response, $className, $equalsFields = [])
    {
        static::assertInstanceOf($className, $response->getResponse());
        $reflection = new \ReflectionClass($response->getResponse());

        foreach ($equalsFields as $nameField => $valueExpected) {
            $property = $reflection->getProperty($nameField);
            $property->setAccessible(true);

            static::assertEquals($valueExpected, $property->getValue($response->getResponse()));
        }
    }
}
