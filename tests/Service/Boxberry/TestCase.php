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
namespace SaaS\Tests\Service\Boxberry;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use ReflectionClass;
use SaaS\Model\Response\Response;
use SaaS\Service\ClientSimpleFactory;
use SaaS\Service\Boxberry\Client;

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

    /**
     * @param null $mockHandler
     *
     * @return \SaaS\Service\Boxberry\Client
     */
    public function getApiClient($mockHandler = null)
    {
        if (empty($mockHandler)) {
            $mockHandler = new GuzzleHttp\Handler\MockHandler([]);
        }

        $client = new GuzzleHttp\Client(
            array_merge(
                Client::CONFIG,
                ['handler' => GuzzleHttp\HandlerStack::create($mockHandler)]
            )
        );

        $apiClient = (new ClientSimpleFactory('5448637f804cb40d491cbcbe6e511942'))->getBoxberryApiClient();

        try {
            $reflection = new ReflectionClass($apiClient);
            $property = $reflection->getProperty('client');
            $property->setAccessible(true);
            $property->setValue($apiClient, $client);
        } catch (\ReflectionException $exception) {
            static::fail(
                sprintf(
                    'An error occurred while testing: %s in %s on line %s',
                    $exception->getMessage(),
                    $exception->getFile(),
                    $exception->getLine()
                )
            );
        }

        return $apiClient;
    }

    /**
     * @param array $responses
     *
     * @return \GuzzleHttp\Handler\MockHandler
     */
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

    /**
     * @param $config
     *
     * @return array|mixed|string
     */
    public function getMockData($config)
    {
        $fakeMock = new \Er1z\FakeMock\FakeMock();
        $list = isset($config['list']) ? $config['list'] : 1;

        if (isset($config['className'])) {
            $object = [];

            for ($iteration = 1; $iteration <= $list; $iteration++) {
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

    /**
     * @param $object
     * @param $properties
     *
     * @return mixed
     */
    public function getMockObjectInObject($object, $properties)
    {
        foreach ($properties as $nameProperty => $property) {
            $object->{$nameProperty} = $this->getMockData($property);
        }

        return $object;
    }

    /**
     * @param $object
     * @param $fixedValue
     *
     * @return mixed
     */
    public function setFixedValue($object, $fixedValue)
    {
        if (!is_array($fixedValue)) {
            return $object;
        }

        foreach ($fixedValue as $nameProperty => $value) {
            $object->{$nameProperty} = $value;
        }

        return $object;
    }

    /**
     * @param \SaaS\Model\Response\Response $response
     */
    public static function assertResponse(Response $response)
    {
        static::assertNotEmpty($response);
        static::assertIsObject($response);
        static::assertInstanceOf(\SaaS\Service\Boxberry\Model\Response\Response::class, $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertIsString($response->getResponseRaw());
    }

    /**
     * @param \SaaS\Model\Response\Response $response
     * @param string                        $elementClassName
     * @param int                           $countElement
     * @param string                        $responseType
     */
    public static function assertResponseList(
        Response $response,
        string $elementClassName,
        string $responseType,
        int $countElement = 1
    ) {
        if ('array' === $responseType) {
            static::assertIsArray($response->getResponse());
            static::assertCount($countElement, $response->getResponse());

            foreach ($response->getResponse() as $element) {
                static::assertInstanceOf($elementClassName, $element);
            }
        } else {
            static::assertInstanceOf($responseType, $response->getResponse());
        }
    }

    /**
     * @param \SaaS\Model\Response\Response $response
     * @param                               $className
     * @param array                         $equalsFields
     */
    public static function assertResponseGet(Response $response, $className, $equalsFields = [])
    {
        static::assertInstanceOf($className, $response->getResponse());

        foreach ($equalsFields as $nameField => $valueExpected) {
            static::assertEquals($valueExpected, $response->getResponse()->{$nameField});
        }
    }
}
