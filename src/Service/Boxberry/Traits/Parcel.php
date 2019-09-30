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
 * Class Parcel
 *
 * @package  SaaS\Service\Boxberry\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Parcel
{
    /**
     * Данный метод позволяет создать посылку в Личном кабинете. В метод необходимо передать кодированный в JSON массив.
     *
     * @group parcels
     *
     * @param Model\Request\ParcelCreate $request
     *
     * @return Model\Response\Response
     */
    public function parcelCreate(Model\Request\ParcelCreate $request)
    {
        $options = [
            'form_params' => [
                'token' => $this->token,
                'method' => ucfirst(__FUNCTION__),
                'sdata' => $this->serializer->serialize($request, 'json')
            ]
         ];

        return new Model\Response\Response($this->client->post($this->url, $options), Model\ParcelCreate::class);
    }

    /**
     * Позволяет получить список созданных через API актов передачи.
     * Если не указывать диапазоны дат, то будет возвращен последний созданный акт.
     *
     * @group parcels
     *
     * @param string $from      период с в формате YYYYMMDD
     * @param string $to Код    период до в формате YYYYMMDD
     *
     * @return Model\Response\Response
     */
    public function parselSendStory(string $from = '', string $to = '')
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => ucfirst(__FUNCTION__)
                    ],
                    array_filter([
                        'from' => $from ?: false,
                        'to' => $to ?: false
                    ])
                )
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ParselSendStory::class)
        ));
    }

    /**
     * Формирует акт передачи посылок в boxberry.
     * Обязательно наличие параметра (строки содержащей коды отслеживания заказов).
     *
     * @group parcels
     *
     * @param string $imIds Код отслеживания отправления
     *
     * @return Model\Response\Response
     */
    public function parselSend(string $imIds)
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'ImIds' => $imIds
                ]
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ParselSend::class)
        ));
    }

    /**
     * Позволяет получить список созданных через API посылок.
     * Если не указывать диапазоны дат, то будет возвращена последняя созданная посылка.
     *
     * @group parcels
     *
     * @param string $from      период с в формате YYYYMMDD
     * @param string $to Код    период до в формате YYYYMMDD
     *
     * @return Model\Response\Response
     */
    public function parselStory(string $from = '', string $to = '')
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => ucfirst(__FUNCTION__)
                    ],
                    array_filter([
                        'from' => $from ?: false,
                        'to' => $to ?: false
                    ])
                )
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ParselStory::class)
        ));
    }

    /**
     * Позволяет удалить посылку, но только в том случае, если она не была проведена в акте.
     * Внимание! сервис работает только с посылками созданными через API ЛК
     *
     * @group parcels
     *
     * @param string $imId Код отслеживания отправления
     *
     * @return Model\Response\Response
     */
    public function parselDel(string $imId)
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'ImId' => $imId
                ]
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ParselDel::class)
        ));
    }

    /**
     * Позволяет получить список всех трекинг кодов посылок которые есть в кабинете но не были сформированы в акт.
     * Строка сразу имеет вид необходимый для интеграции в метод ParselSend.
     *
     * @group parcels
     *
     * @return Model\Response\Response
     */
    public function parselList()
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__)
                ]
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ParselList::class)
        ));
    }

    /**
     * Позволяет получить ссылку на файл печати этикеток, список штрих-кодов коробок в посылке через запятую (,),
     * список штрих-кодов выгруженных коробок в посылке через запятую (,).
     *
     * @group parcels
     *
     * @param string $imId Код отслеживания отправления
     *
     * @return Model\Response\Response
     */
    public function parselCheck(string $imId)
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'ImId' => $imId
                ]
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ParselCheck::class)
        ));
    }
}
