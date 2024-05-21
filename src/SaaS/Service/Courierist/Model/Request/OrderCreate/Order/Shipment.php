<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCreate\Order;

use SaaS\Service\Courierist\Model\Request\Traits\ShipmentTrait;
use JMS\Serializer\Annotation as JMS;

class Shipment
{
    use ShipmentTrait;

    /**
     * Название
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Артикул
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("article")
     */
    public $article;

    /**
     * Грузоместо
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("freight")
     */
    public $freight;

    /**
     * Штрихкод товара
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("barcode")
     */
    public $barcode;

    /**
     * Код маркировки товаров для Честного знака
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("marking_code")
     */
    public $markingCode;

    /**
     * Тип кода маркировки - 6
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("marking_type")
     */
    public $markingType;

    /**
     * Признак подакциозного товара - true
     *
     * @var bool
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_excise")
     */
    public $isExcise;

    /**
     * Цена за одну единицу товара с учетом скидки
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("tax_item_price")
     */
    public $taxItemPrice;

    /**
     * Ставка НДС:
     * 0 = НДС 0%
     * 10 = НДС 10%
     * 20 = НДС 30%
     * null = НДС не облагается
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("tax_rate")
     */
    public $taxRate;

    /**
     * Тип единицы измерения товара
     *
     * Количество (поле unit) = 1
     * Килограммы (поле weight) = 2
     *
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("tax_unit_type")
     */
    public $taxUnitType;

    /**
     * Игнорировать tax_rate при false (или 0)
     *
     * @var bool
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("legal_vat")
     */
    public $legalVat;

    /**
     * ИНН поставщика
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("legal_inn")
     */
    public $legalInn;

    /**
     * Наименование поставщика
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("legal_name")
     */
    public $legalName;

    /**
     * Телефон поставщика
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("legal_phone")
     */
    public $legalPhone;
}