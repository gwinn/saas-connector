<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Tests\Service\Dellin
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Tests\Service\Dellin;

use Er1z\FakeMock\FakeMock;
use GuzzleHttp;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use ReflectionClass;
use SaaS\Service\Dellin;
use SaaS\Service\Dellin\Model\Response\Response;

/**
 * Class TestCase
 *
 * @package  SaaS\Tests\Service\Dellin
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Serializer $serializer
     */
    protected $serializer;

    /**
     * @var FakeMock
     */
    protected $fakeMock;

    protected function setUp()
    {
        parent::setUp();

        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build()
        ;

        $this->fakeMock = new FakeMock();
    }

    public function getApiClient($mockHandler = null): Dellin\Client
    {
        if (empty($mockHandler)) {
            $mockHandler = new GuzzleHttp\Handler\MockHandler([]);
        }

        $client = new GuzzleHttp\Client(
            array_merge(
                Dellin\Client::CONFIG,
                ['handler' => GuzzleHttp\HandlerStack::create($mockHandler)]
            )
        );

        $apiClient = new Dellin\Client('00000000-0000-0000-0000-000000000000');

        try {
            $property = (new ReflectionClass($apiClient))->getProperty('client');
            $property->setAccessible(true);
            $property->setValue($apiClient, $client);
        } catch (\ReflectionException $e) {
            $this->fail(
                sprintf(
                    'An error occurred while testing: %s in %s on line %s',
                    $e->getMessage(),
                    $e->getFile(),
                    $e->getLine()
                )
            );
        }

        return $apiClient;
    }

    public function getMockHandler($responses = [])
    {
        $mockHandler = [];

        foreach ($responses as $response) {
            $body = $response['body'] ?? $this->serializer->serialize($this->getMockData($response), 'json');

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
        if (isset($config['className']) && class_exists($config['className'])) {
            $objects = [];

            for ($i = 0; $i < ($config['list'] ?? 1); ++$i) {
                $item = new $config['className']();

                $this->fakeMock->fill($item);

                if (isset($config['fixedValue'])) {
                    $item = $this->setFixedValue($item, $config['fixedValue']);
                }

                if (isset($config['properties'])) {
                    $item = $this->getMockObjectInObject($item, $config['properties']);
                }

                $objects[] = $item;
            }

            return isset($config['list']) ? $objects : current($objects);
        }

        return '';
    }

    public function setFixedValue($object, array $fixedValue = [])
    {
        foreach ($fixedValue as $nameProperty => $value) {
            $object->{$nameProperty} = $value;
        }

        return $object;
    }

    public function getMockObjectInObject($object, array $properties = [])
    {
        foreach ($properties as $nameProperty => $property) {
            $object->{$nameProperty} = $this->getMockData($property);
        }

        return $object;
    }

    public static function assertResponse(Response $response)
    {
        static::assertNotEmpty($response);
        static::assertIsObject($response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertIsString($response->getResponseRaw());
    }

    public static function assertResponseList(Response $response, string $elementClassName, int $countElement = 1)
    {
        static::assertIsArray($response->getResponse());
        static::assertCount($countElement, $response->getResponse());

        foreach ($response->getResponse() as $element) {
            static::assertInstanceOf($elementClassName, $element);
        }
    }
}
