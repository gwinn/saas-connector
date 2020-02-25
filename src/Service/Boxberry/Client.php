<?php

/**
 * PHP version 7.1
 *
 * @category Boxberry
 * @package  SaaS\Service\Boxberry
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Boxberry;

use GuzzleHttp;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use SaaS\Service\Boxberry\Traits;

/**
 * Class Boxberry
 *
 * @category Insales
 * @package  SaaS\Service\Boxberry
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Client
{
    use Traits\Lists;
    use Traits\Parcel;
    use Traits\Service;

    const API_URL_NEW = 'https://api.boxberry.ru/json.php';
    const API_URL = 'https://api.boxberry.de/json.php';
    const API_URL_TEST = 'https://test.api.boxberry.de/json.php';

    const CONFIG = [
        'http_errors' => false,
        'headers'  => [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Cache-Control' =>'no-cache'
        ],
    ];

    /**
     * @var array
     */
    protected $params = [
        'connect_timeout' => 10,
        'timeout' => 30
    ];

    /**
     * @var string
     */
    protected $token;

    /**
     * @var GuzzleHttp\Client $client
     */
    protected $client;

    /**
     * @var Serializer $serializer
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $url;

    /**
     * Insales constructor.
     *
     * @param string    $token  api key value
     * @param bool      $new    type of api url
     * @param bool      $test   api environment
     */
    public function __construct(string $token, bool $new = true, bool $test = false)
    {
        $this->token = $token;
        $this->url = $new ? self::API_URL_NEW : ($test ? self::API_URL : self::API_URL_TEST);
        $this->client = new GuzzleHttp\Client(self::CONFIG);

        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build()
        ;

        if ($serializer instanceof Serializer) {
            $this->serializer = $serializer;
        }
    }
}
