<?php

namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;
use SaaS\Service\Dellin\Model\Response\Calculator\Air;
use SaaS\Service\Dellin\Model\Response\Calculator\Express;
use SaaS\Service\Dellin\Model\Response\Calculator\InsuranceComponents;
use SaaS\Service\Dellin\Model\Response\Calculator\Intercity;
use SaaS\Service\Dellin\Model\Response\Calculator\Letter;
use SaaS\Service\Dellin\Model\Response\Calculator\OrderDates;
use SaaS\Service\Dellin\Model\Response\Calculator\Small;

/**
 * @FakeMock()
 */
class Data
{
    /**
     * Данные по доставке груза от отправителя
     *
     * @var DerivalArrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\DerivalArrival")
     * @Serializer\SerializedName("derival")
     */
    public $derival;

    /**
     * Данные по доставке груза до получателя
     *
     * @var DerivalArrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\DerivalArrival")
     * @Serializer\SerializedName("arrival")
     *
     * @FakeMockField()
     */
    public $arrival;

    /**
     * Итоговая стоимость для выбранного вида перевозки
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="10000")
     */
    public $price;

    /**
     * Способ перевозки с минимальной стоимостью
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("priceMinimal")
     *
     * @FakeMockField(value="auto")
     */
    public $priceMinimal;

    /**
     * Информация о стоимости упаковки
     *
     * @var array|CostsCalculation[]
     *
     * @Serializer\Type("array<string, SaaS\Service\Dellin\Model\Response\Calculator\V2\CostsCalculation>")
     * @Serializer\SerializedName("packages")
     */
    public $packages;

    /**
     * График движения груза
     *
     * @var OrderDates
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\OrderDates")
     * @Serializer\SerializedName("orderDates")
     *
     * @FakeMockField()
     */
    public $orderDates;

    /**
     * Срок доставки груза от терминала получения до адреса (в днях)
     *
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("deliveryTerm")
     *
     * @FakeMockField(value="1")
     */
    public $deliveryTerm;

    /**
     * Информация о стоимости отправки/возврата сопроводительных документов
     *
     * @var AcDoc
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\AcDoc")
     * @Serializer\SerializedName("accompanyingDocuments")
     */
    public $accompanyingDocuments;

    /**
     * Общая стоимость страхования груза
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("insurance")
     *
     * @FakeMockField(value="350.0")
     */
    public $insurance;

    /**
     * Общий список услуг по страхованию груза и их стоимость
     *
     * @var InsuranceComponents
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\InsuranceComponents")
     * @Serializer\SerializedName("insuranceComponents")
     *
     * @FakeMockField()
     */
    public $insuranceComponents;

    /**
     * Информация о стоимости услуги "информация о статусе заказа"
     *
     * @var CostsCalculation
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\CostsCalculation")
     * @Serializer\SerializedName("notify")
     */
    public $notify;

    /**
     * Список доступных видов перевозки и их стоимость
     *
     * @var AvailableDeliveryTypes
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\AvailableDeliveryTypes")
     * @Serializer\SerializedName("availableDeliveryTypes")
     *
     * @FakeMockField()
     */
    public $availableDeliveryTypes;

    /**
     * @var Intercity
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Intercity")
     * @Serializer\SerializedName("intercity")
     *
     * @FakeMockField()
     */
    public $intercity;

    /**
     * @var Small
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Small")
     * @Serializer\SerializedName("small")
     *
     * @FakeMockField()
     */
    public $small;

    /**
     * @var Air
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Air")
     * @Serializer\SerializedName("air")
     *
     * @FakeMockField()
     */
    public $air;

    /**
     * @var Express
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Express")
     * @Serializer\SerializedName("express")
     *
     * @FakeMockField()
     */
    public $express;

    /**
     * @var Letter
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\Letter")
     * @Serializer\SerializedName("letter")
     *
     * @FakeMockField()
     */
    public $letter;
}
