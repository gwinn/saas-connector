<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Traits;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use SaaS\Service\Insales\Model;
use SaaS\Service\Insales\Model\Response;
use SaaS\Service\Insales\Exception;

/**
 * Class StockCurrency
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait StockCurrency
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get stock currencies list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-get-stock-currencies-json
     * @group   stock_currencies
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function stockCurrenciesList()
    {
        $url = '/admin/stock_currencies.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\StockCurrency::class)
        );
    }

    /**
     * Get stock currency
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-get-stock-currency-json
     * @group   stock_currencies
     *
     * @param $stockCurrencyId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function stockCurrencyGet($stockCurrencyId)
    {
        $url = sprintf('/admin/stock_currencies/%s.json', $stockCurrencyId);

        return new Response\Response($this->client->get($url), Model\StockCurrency::class);
    }
}
