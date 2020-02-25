<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Book;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Counteragent
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Counteragent
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     *
     * @FakeMockField(value="3")
     */
    public $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("is_anonym")
     *
     * @FakeMockField(value="false")
     */
    public $isAnonym;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("form")
     *
     * @FakeMockField(value="Ч/Л")
     */
    public $form;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("formUID")
     *
     * @FakeMockField(value="0x8F51001438C4D49511DBD774581EDB80")
     */
    public $formUid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="Иванов Иван Иванович")
     */
    public $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phone")
     *
     * @FakeMockField(value="+7 (900) 000-00-00")
     */
    public $phone;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     *
     * @FakeMockField(value="test@mail.com")
     */
    public $email;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     *
     * @FakeMockField(value="physical")
     */
    public $type;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("inn")
     */
    public $inn;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("adresses")
     *
     * @FakeMockField(value="1")
     */
    public $adresses;

    /**
     * @var Document
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Book\Document")
     * @Serializer\SerializedName("document")
     *
     * @FakeMockField()
     */
    public $document;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("lastUpdate")
     *
     * @FakeMockField(value="2015-07-04 02:27:15")
     */
    public $lastUpdate;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("country_uid")
     *
     * @FakeMockField(value="0x8f51001438c4d49511dbd774581edb7a")
     */
    public $countryUid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("uid")
     *
     * @FakeMockField(value="00000000-0000-0000-0000-000000000000")
     */
    public $uid;

    /**
     * @var DataForReceipt
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Book\Document")
     * @Serializer\SerializedName("data_for_receipt")
     *
     * @FakeMockField()
     */
    public $dataForReceipt;
}
