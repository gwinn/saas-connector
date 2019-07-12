<?php

/**
 * PHP version 7.1
 *
 * @category Insales
 * @package  SaaS\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service;

use GuzzleHttp;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use SaaS\Service\Insales\Traits;

/**
 * Class Insales
 *
 * @category Insales
 * @package  SaaS\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Insales
{
    use Traits\Account;
    use Traits\ApplicationAction;
    use Traits\ApplicationCharge;
    use Traits\ApplicationWidget;
    use Traits\Category;
    use Traits\Client;
    use Traits\CustomStatus;
    use Traits\DeliveryVariant;
    use Traits\Domain;
    use Traits\Field;
    use Traits\Order;
    use Traits\PaymentGateway;
    use Traits\Product;
    use Traits\StockCurrency;
    use Traits\VariantField;
    use Traits\Webhook;

    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    const CONFIG = [
        'http_errors' => false,
        'headers'  => [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Cache-Control' =>'no-cache'
        ],
    ];

    /**
     * Insales constructor.
     *
     * @param string $apiKey   api key value
     * @param string $password password value
     * @param string $domain   InSales internal domain
     */
    public function __construct($apiKey, $password, $domain)
    {
        $this->client = new GuzzleHttp\Client(
            array_merge(self::CONFIG, ['base_uri' => $domain, 'auth' => [$apiKey, $password]])
        );

        $this->serializer = SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )->build();
    }
}
