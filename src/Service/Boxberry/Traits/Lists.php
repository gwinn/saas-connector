<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Boxberry\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Boxberry\Traits;

use SaaS\Exception;
use SaaS\Service\Boxberry\Model;

/**
 * Class Lists
 *
 * @package  SaaS\Service\Boxberry\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Lists
{
    /**
     * Метод позволяет получить список городов, в которых есть пункты выдачи заказов Boxberry.
     *
     * @group lists
     *
     * @param string $countryCode Код страны
     *
     * @return Model\Response\Response
     */
    public function listCities(string $countryCode = '')
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'CountryCode' => $countryCode ?: false
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListCities::class)
        ));
    }

    /**
     * Позволяет получить список городов, в которых осуществляется доставка Boxberry.
     *
     * @group lists
     *
     * @return Model\Response\Response
     */
    public function listCitiesFull()
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__)
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListCitiesFull::class)
        ));
    }

    /**
     * Позволяет получить информацию о всех точках выдачи заказов.
     * Если вам необходимо увидеть точки, работающие с любым типом посылок, передайте параметр "prepaid" равный 1
     *
     * @group lists
     *
     * @param boolean   $prepaid    Cписок всех ПВЗ
     * @param string    $citycode   Cписок ПВЗ в городе
     *
     * @return Model\Response\Response
     */
    public function listPoints(
        bool $prepaid = false,
        string $citycode = ''
    ) {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => ucfirst(__FUNCTION__),
                        'prepaid' => (int) ($prepaid ?: false)
                    ],
                    array_filter([
                        'CityCode' => $citycode ?: false
                    ])
                )
            ]
        );

        return new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListPoints::class)
        );
    }

    /**
     * Позволяет получить коды всех отделений Boxberry
     * или для отдельно взятого города (при указании ''CityCode'') c датой последнего изменения.
     *
     * @group lists
     *
     * @param string $citycode Параметр города
     *
     * @return Model\Response\Response
     */
    public function listPointsShort(
        string $citycode = ''
    ) {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => ucfirst(__FUNCTION__)
                    ],
                    array_filter([
                        'CityCode' => $citycode ?: false
                    ])
                )
            ]
        );

        return new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListPointsShort::class)
        );
    }

    /**
     * Позволяет получить перечень и стоимость оказанных услуг по отправлению.
     *
     * @group lists
     *
     * @param string $imId Код отслеживания заказа
     *
     * @return Model\Response\Response
     */
    public function listServices(string $imId = '')
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'ImId' => $imId ?: false
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListServices::class)
        ));
    }

    /**
     * Позволяет получить информацию о статусах посылки. Обязательно наличие параметра (код отслеживания заказа).
     *
     * @group lists
     *
     * @param string $imId Код отслеживания заказа
     *
     * @return Model\Response\Response
     */
    public function listStatuses(string $imId = '')
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'ImId' => $imId ?: false
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListStatuses::class)
        ));
    }

    /**
     * Позволяет получить информацию о статусах посылки. Обязательно наличие параметра (код отслеживания заказа).
     *
     * @group lists
     *
     * @param string $imId Код отслеживания заказа
     *
     * @return Model\Response\Response
     */
    public function listStatusesFull(string $imId = '')
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'ImId' => $imId ?: false
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            Model\ListStatusesFull::class
        ));
    }

    /**
     * Позволяет получить список почтовых индексов, для которых возможна курьерская доставка.
     *
     * @group lists
     *
     * @return Model\Response\Response
     */
    public function listZips()
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__)
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ListZips::class)
        ));
    }

    /**
     * Позволяет получить список городов в которых осуществляется курьерская доставка
     *
     * @group lists
     *
     * @return Model\Response\Response
     */
    public function courierListCities()
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__)
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\CourierListCities::class)
        ));
    }

    /**
     * Позволяет получить список точек приёма посылок.
     *
     * @group lists
     *
     * @return Model\Response\Response
     */
    public function pointsForParcels()
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__)
                ]
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\PointsForParcels::class)
        ));
    }
}
