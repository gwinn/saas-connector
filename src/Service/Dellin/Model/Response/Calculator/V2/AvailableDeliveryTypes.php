<?php

namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * @FakeMock()
 */
class AvailableDeliveryTypes
{
    /**
     * Стоимость автодоставки
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("auto")
     *
     * @FakeMockField(value="2500")
     */
    public $auto;

    /**
     * Стоимость доставки малогабаритного груза
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("small")
     */
    public $small;

    /**
     * Стоимость авиадоставки
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("avia")
     *
     * @FakeMockField(value="1500")
     */
    public $avia;

    /**
     * Стоимость экспресс-доставки
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("express")
     */
    public $express;

    /**
     * Стоимость доставки письма
     *
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("letter")
     */
    public $letter;
}
