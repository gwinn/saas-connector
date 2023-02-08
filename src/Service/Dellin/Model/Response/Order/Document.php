<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Document
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Document
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("id")
     *
     * @FakeMockField(value="39513109")
     */
    public $id;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("uid")
     */
    public $uid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     *
     * @FakeMockField(value="request")
     */
    public $type;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("createDate")
     *
     * @FakeMockField(value="2019-11-11 11:16:36")
     */
    public $createDate;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("state")
     *
     * @FakeMockField(value="ordered")
     */
    public $state;

    /**
     * @var DocumentsMember
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\DocumentsMember")
     * @Serializer\SerializedName("sender")
     *
     * @FakeMockField()
     */
    public $sender;

    /**
     * @var DocumentsMember
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\DocumentsMember")
     * @Serializer\SerializedName("receiver")
     *
     * @FakeMockField()
     */
    public $receiver;

    /**
     * @var DocumentsMember
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\DocumentsMember")
     * @Serializer\SerializedName("payer")
     *
     * @FakeMockField()
     */
    public $payer;

    /**
     * Format: YYYY-MM-DD
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("produceDate")
     *
     * @FakeMockField(value="2019-11-20")
     */
    public $produceDate;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("forwarderId")
     */
    public $forwarderId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     *
     * @FakeMockField(value="Comment")
     */
    public $comment;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("fullDocumentId")
     *
     * @FakeMockField(value="K-39513109")
     */
    public $fullDocumentId;

    /**
     * @var Freight
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Freight")
     * @Serializer\SerializedName("freight")
     *
     * @FakeMockField()
     */
    public $freight;

    /**
     * @var Derival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Derival")
     * @Serializer\SerializedName("derival")
     *
     * @FakeMockField()
     */
    public $derival;

    /**
     * @var Arrival
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Arrival")
     * @Serializer\SerializedName("arrival")
     *
     * @FakeMockField()
     */
    public $arrival;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("barcode")
     */
    public $barcode;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("payment")
     */
    public $payment;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("totalSum")
     */
    public $totalSum;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("serviceKind")
     */
    public $serviceKind;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("organization")
     */
    public $organization;

    /**
     * @var array|Service[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Order\Service>")
     * @Serializer\SerializedName("services")
     */
    public $services;

    /**
     * @var array|AcDoc[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Order\AcDoc>")
     * @Serializer\SerializedName("accompanyingDocuments")
     */
    public $accompanyingDocuments;

    /**
     * @var array|string[]|null
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("availableDocs")
     */
    public $availableDocs;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentState")
     *
     * @FakeMockField(value="paid")
     */
    public $paymentState;
}
