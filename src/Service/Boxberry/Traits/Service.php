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
 * Class Service
 *
 * @package  SaaS\Service\Boxberry\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Service
{
    /**
     * Метод позволяет получить всю информацию по пункту выдачи, включая фотографии.
     *
     * @group services
     *
     * @param string    $code   Код ПВЗ
     * @param integer   $photo  Если photo равно 1 - будет возвращен массив полноразмерных изображений ПВЗ в base64.
     *
     * @return Model\Response\Response
     */
    public function pointsDescription(string $code, int $photo = 0)
    {
        $queryParam = array_merge(
            $this->params,
            array_filter([
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => ucfirst(__FUNCTION__),
                        'code' => $code
                    ],
                    array_filter([
                        'photo' => $photo ?: false
                    ])
                )
            ])
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            Model\PointsDescription::class
        ));
    }

    /**
     * Метод позволяет получить всю информацию по пункту выдачи, включая фотографии.
     *
     * @group services
     *
     * @param string $zip Код ПВЗ
     *
     * @return Model\Response\Response
     */
    public function zipCheck(string $zip)
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'zip' => $zip
                ]
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\ZipCheck::class)
        ));
    }

    /**
     * Данный метод позволяет узнать стоимость доставки посылки до ПВЗ или клиента(курьерская доставка).
     * Все расчеты указаны в рублях. Описание полей смотрите в примере интеграции.
     *
     * @group services
     *
     * @param Model\Request\DeliveryCosts $request
     *
     * @return Model\Response\Response
     */
    public function deliveryCosts(Model\Request\DeliveryCosts $request)
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => array_merge(
                    [
                        'token' => $this->token,
                        'method' => ucfirst(__FUNCTION__)
                    ],
                    $this->serializer->toArray($request)
                )
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            Model\DeliveryCosts::class
        ));
    }

    /**
     * Создание заявки на забор посылок
     *
     * @group services
     *
     * @param Model\Request\CreateIntake $request
     *
     * @return Model\Response\Response
     */
    public function createIntake(Model\Request\CreateIntake $request)
    {
        $options = [
            'form_params' => [
                'token' => $this->token,
                'method' => ucfirst(__FUNCTION__),
                'sdata' => $this->serializer->serialize($request, 'json')
            ]
         ];

        return new Model\Response\Response($this->client->post($this->url, $options), Model\CreateIntake::class);
    }

    /**
     * Метод позволяет получить информацию по заказам, которые фактически переданы на доставку в Boxberry,
     * но они еще не доставлены клиенту.
     *
     * @group services
     *
     * @param int $onlyPostpaid Если равно =1, возвращает список заказов только с постоплатой
     *
     * @return Model\Response\Response
     */
    public function ordersBalance(int $onlyPostpaid = 0)
    {
        $queryParam = array_merge(
            $this->params,
            [
                'query' => [
                    'token' => $this->token,
                    'method' => ucfirst(__FUNCTION__),
                    'OnlyPostpaid' => $onlyPostpaid
                ]
            ]
        );

        return (new Model\Response\Response(
            $this->client->get(
                $this->url,
                $queryParam
            ),
            sprintf('array<%s>', Model\OrdersBalance::class)
        ));
    }
}
