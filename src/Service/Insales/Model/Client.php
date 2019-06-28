<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;

/**
 * Class Client
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Client
{
    const INDIVIDUAL = 'Client::Individual';
    const JURIDICAL = 'Client::Juridical';

    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * Bonus points quantity
     *
     * @var int $bonusPoints
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("bonus_points")
     *
     * @FakeMockField()
     */
    public $bonusPoints;

    /**
     * @var int $clientGroupId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("client_group_id")
     *
     * @FakeMockField()
     */
    public $clientGroupId;

    /**
     * @var string $email
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     *
     * @FakeMockField()
     */
    public $email;

    /**
     * Password at least 6 characters
     *
     * @var string $password
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("password")
     *
     * @FakeMockField(faker="password")
     */
    public $password;

    /**
     * @var string $middlename
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("middlename")
     *
     * @FakeMockField()
     */
    public $middlename;

    /**
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @FakeMockField()
     */
    public $name;

    /**
     * @var string $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField()
     */
    public $phone;

    /**
     * @var string $surname
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("surname")
     *
     * @FakeMockField()
     */
    public $surname;

    /**
     * If true, email and password are required
     *
     * @var bool $registered
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("registered")
     *
     * @FakeMockField()
     */
    public $registered;

    /**
     * Set true to subscribe client for emails
     *
     * @var bool $subscribe
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("subscribe")
     *
     * @FakeMockField()
     */
    public $subscribe;

    /**
     * Client::Individual, by default
     *
     * @var string $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"Client::Individual", "Client::Juridical"}})
     */
    public $type;

    /**
     * @var string $consentToPersonalData
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("consent_to_personal_data")
     *
     * @FakeMockField()
     */
    public $consentToPersonalData;

    /**
     * @var string $correspondentAccount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("correspondent_account")
     *
     * @FakeMockField()
     */
    public $correspondentAccount;

    /**
     * @var string $ipAddr
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ip_addr")
     *
     * @FakeMockField(faker="ipv4")
     */
    public $ipAddr;

    /**
     * @var string $settlementAccount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("settlement_account")
     *
     * @FakeMockField()
     */
    public $settlementAccount;

    /**
     * Progressive discount
     *
     * @var float $progressiveDiscount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("progressive_discount")
     *
     * @FakeMockField()
     */
    public $progressiveDiscount;

    /**
     * Group discount
     *
     * @var float $groupDiscount
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("group_discount")
     *
     * @FakeMockField()
     */
    public $groupDiscount;

    /**
     * Set it true to skip sending email confirmation
     *
     * @var bool $skipSendMail
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("skip_send_mail")
     *
     * @FakeMockField()
     */
    public $skipSendMail;

    /**
     * Address of company or a sole trader
     *
     * @var string $juridicalAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("juridical_address")
     *
     * @FakeMockField(faker="address")
     */
    public $juridicalAddress;

    /**
     * @var int $inn
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("inn")
     *
     * @FakeMockField()
     */
    public $inn;

    /**
     * @var int $kpp
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("kpp")
     *
     * @FakeMockField()
     */
    public $kpp;

    /**
     * @var int $ogrn
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ogrn")
     *
     * @FakeMockField()
     */
    public $ogrn;

    /**
     * @var int $okpo
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("okpo")
     *
     * @FakeMockField()
     */
    public $okpo;

    /**
     * @var int $bik
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("bik")
     *
     * @FakeMockField()
     */
    public $bik;

    /**
     * @var string $bankName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_name")
     *
     * @FakeMockField(faker="title")
     */
    public $bankName;

    /**
     * For get client
     *
     * @var array $fieldsValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values")
     */
    public $fieldsValues = [];

    /**
     * For create or update client
     *
     * @var array $fieldsValuesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values_attributes")
     */
    public $fieldsValuesAttributes = [];
}
