<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Tracker;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Document
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
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
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("create_date")
     *
     * @FakeMockField(value="2018-12-12 17:36:58")
     */
    public $createDate;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("document_id")
     *
     * @FakeMockField(value="15-01905000217")
     */
    public $documentId;

    /**
     * Available: request | shipping | request_sf
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("document_type")
     *
     * @FakeMockField(value="shipping")
     */
    public $documentType;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("document_uid")
     *
     * @FakeMockField(value="0x9bcf2e07c8ff70e84bd7e62b335779c3")
     */
    public $documentUid;

    /**
     * @var Payer
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Tracker\Payer")
     * @Serializer\SerializedName("payer")
     *
     * @FakeMockField()
     */
    public $payer;

    /**
     * Available: paid | not_paid | in_process
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("payment_state")
     *
     * @FakeMockField(value="paid")
     */
    public $paymentState;

    /**
     * @var array|Service[]|null
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Tracker\Service>")
     * @Serializer\SerializedName("services")
     */
    public $services;

    /**
     * @var float|null
     *
     * @Serializer\Type("float")
     * @Serializer\SerializedName("total_sum")
     *
     * @FakeMockField(value="3060.0
    ")
     */
    public $totalSum;
}
