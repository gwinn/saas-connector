<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Response\Calculator\DiscountDetails;
use SaaS\Service\Dellin\Model\Response\Calculator\PremiumDetails;
use SaaS\Service\Dellin\Model\Response\Calculator\Terminal;

/**
 * Class DerivalArrival
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator\V2
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DerivalArrival
{
    /**
     * Город подразделения-отправителя
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("terminal")
     *
     * @FakeMockField(value="Санкт-Петербург")
     */
    public $terminal;

    /**
     * Итоговая стоимость доставки от отправителя
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="2150.0")
     */
    public $price;

    /**
     * Флаг, обозначающий, что стоимость доставки является договорной
     *
     * @var bool
     *
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("contractPrice")
     *
     * @FakeMockField(value="false")
     */
    public $contractPrice;

    /**
     * Стоимость услуги доставки груза от адреса отправителя(без учёта скидок и наценок)
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("servicePrice")
     *
     * @FakeMockField(value="2100.0")
     */
    public $servicePrice;

    /**
     * Подробная информация о наценках по услуге
     *
     * @var array|PremiumDetails[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\PremiumDetails>")
     * @Serializer\SerializedName("premiumDetails")
     */
    public $premiumDetails;

    /**
     * Подробная информация о скидках по услуге
     *
     * @var DiscountDetails[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\DiscountDetails>")
     * @Serializer\SerializedName("discountDetails")
     */
    public $discountDetails;

    /**
     * Информация о терминалах, где может быть сдан груз
     *
     * @var array|Terminal[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\Terminal>")
     * @Serializer\SerializedName("terminals")
     */
    public $terminals;

    /**
     * Информация о стоимости погрузо-разгрузочных работ
     *
     * @var CostsCalculation
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\CostsCalculation")
     * @Serializer\SerializedName("handling")
     */
    public $handling;
}
