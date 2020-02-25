<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Delivery
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Delivery
{
    /**
     * @var DeliveryType
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\DeliveryType")
     * @Serializer\SerializedName("deliveryType")
     *
     * @FakeMockField()
     */
    public $deliveryType;

    /**
     * @var array|Package[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\Package>")
     * @Serializer\SerializedName("packages")
     */
    public $packages;

    /**
     * @var array|AcDoc[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Request\Delivery\AcDoc>")
     * @Serializer\SerializedName("accompanyingDocuments")
     */
    public $accompanyingDocuments;

    /**
     * @var Derival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Derival")
     * @Serializer\SerializedName("derival")
     *
     * @FakeMockField()
     */
    public $derival;

    /**
     * @var Arrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Arrival")
     * @Serializer\SerializedName("arrival")
     *
     * @FakeMockField()
     */
    public $arrival;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("smsback")
     *
     * @FakeMockField(value="79213332211")
     */
    public $smsBack;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     *
     * @FakeMockField(value="комментарий к отправке")
     */
    public $comment;
}
