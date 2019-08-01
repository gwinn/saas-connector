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
use SaaS\Service\Insales\Model\Traits;

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
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Name;
    use Traits\Email;

    const INDIVIDUAL = 'Client::Individual';
    const JURIDICAL = 'Client::Juridical';

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
    protected $bonusPoints;

    /**
     * @var int $clientGroupId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("client_group_id")
     *
     * @FakeMockField()
     */
    protected $clientGroupId;

    /**
     * Password at least 6 characters
     *
     * @var string|null $password
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("password")
     *
     * @FakeMockField(faker="password")
     */
    protected $password;

    /**
     * @var string|null $middlename
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("middlename")
     *
     * @FakeMockField()
     */
    protected $middlename;

    /**
     * @var string|null $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField()
     */
    protected $phone;

    /**
     * @var string|null $surname
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("surname")
     *
     * @FakeMockField()
     */
    protected $surname;

    /**
     * If true, email and password are required
     *
     * @var bool|null $registered
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("registered")
     *
     * @FakeMockField()
     */
    protected $registered;

    /**
     * Set true to subscribe client for emails
     *
     * @var bool|null $subscribe
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("subscribe")
     *
     * @FakeMockField()
     */
    protected $subscribe;

    /**
     * Client::Individual, by default
     *
     * @var string|null $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"Client::Individual", "Client::Juridical"}})
     */
    protected $type;

    /**
     * @var string|null $consentToPersonalData
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("consent_to_personal_data")
     *
     * @FakeMockField()
     */
    protected $consentToPersonalData;

    /**
     * @var string|null $correspondentAccount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("correspondent_account")
     *
     * @FakeMockField()
     */
    protected $correspondentAccount;

    /**
     * @var string|null $ipAddr
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ip_addr")
     *
     * @FakeMockField(faker="ipv4")
     */
    protected $ipAddr;

    /**
     * @var string|null $settlementAccount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("settlement_account")
     *
     * @FakeMockField()
     */
    protected $settlementAccount;

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
    protected $progressiveDiscount;

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
    protected $groupDiscount;

    /**
     * Set it true to skip sending email confirmation
     *
     * @var bool|null $skipSendMail
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("skip_send_mail")
     *
     * @FakeMockField()
     */
    protected $skipSendMail;

    /**
     * Address of company or a sole trader
     *
     * @var string|null $juridicalAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("juridical_address")
     *
     * @FakeMockField(faker="address")
     */
    protected $juridicalAddress;

    /**
     * @var int $inn
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("inn")
     *
     * @FakeMockField()
     */
    protected $inn;

    /**
     * @var int $kpp
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("kpp")
     *
     * @FakeMockField()
     */
    protected $kpp;

    /**
     * @var int $ogrn
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ogrn")
     *
     * @FakeMockField()
     */
    protected $ogrn;

    /**
     * @var int $okpo
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("okpo")
     *
     * @FakeMockField()
     */
    protected $okpo;

    /**
     * @var int $bik
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("bik")
     *
     * @FakeMockField()
     */
    protected $bik;

    /**
     * @var string|null $bankName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("bank_name")
     *
     * @FakeMockField(faker="title")
     */
    protected $bankName;

    /**
     * For get client
     *
     * @var array|null $fieldsValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values")
     */
    protected $fieldsValues = [];

    /**
     * For create or update client
     *
     * @var array|null $fieldsValuesAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\FieldValue>")
     * @JMS\SerializedName("fields_values_attributes")
     */
    protected $fieldsValuesAttributes = [];

    /**
     * @return int|null
     */
    public function getBonusPoints(): ?int
    {
        return $this->bonusPoints;
    }

    /**
     * @param int $bonusPoints
     */
    public function setBonusPoints(int $bonusPoints): void
    {
        $this->bonusPoints = $bonusPoints;
    }

    /**
     * @return int|null
     */
    public function getClientGroupId(): ?int
    {
        return $this->clientGroupId;
    }

    /**
     * @param int $clientGroupId
     */
    public function setClientGroupId(int $clientGroupId): void
    {
        $this->clientGroupId = $clientGroupId;
    }

    /**
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param null|string $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return null|string
     */
    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    /**
     * @param null|string $middlename
     */
    public function setMiddlename(?string $middlename): void
    {
        $this->middlename = $middlename;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return null|string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param null|string $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return bool|null
     */
    public function getRegistered(): ?bool
    {
        return $this->registered;
    }

    /**
     * @param bool|null $registered
     */
    public function setRegistered(?bool $registered): void
    {
        $this->registered = $registered;
    }

    /**
     * @return bool|null
     */
    public function getSubscribe(): ?bool
    {
        return $this->subscribe;
    }

    /**
     * @param bool|null $subscribe
     */
    public function setSubscribe(?bool $subscribe): void
    {
        $this->subscribe = $subscribe;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return null|string
     */
    public function getConsentToPersonalData(): ?string
    {
        return $this->consentToPersonalData;
    }

    /**
     * @param null|string $consentToPersonalData
     */
    public function setConsentToPersonalData(?string $consentToPersonalData): void
    {
        $this->consentToPersonalData = $consentToPersonalData;
    }

    /**
     * @return null|string
     */
    public function getCorrespondentAccount(): ?string
    {
        return $this->correspondentAccount;
    }

    /**
     * @param null|string $correspondentAccount
     */
    public function setCorrespondentAccount(?string $correspondentAccount): void
    {
        $this->correspondentAccount = $correspondentAccount;
    }

    /**
     * @return null|string
     */
    public function getIpAddr(): ?string
    {
        return $this->ipAddr;
    }

    /**
     * @param null|string $ipAddr
     */
    public function setIpAddr(?string $ipAddr): void
    {
        $this->ipAddr = $ipAddr;
    }

    /**
     * @return null|string
     */
    public function getSettlementAccount(): ?string
    {
        return $this->settlementAccount;
    }

    /**
     * @param null|string $settlementAccount
     */
    public function setSettlementAccount(?string $settlementAccount): void
    {
        $this->settlementAccount = $settlementAccount;
    }

    /**
     * @return float|null
     */
    public function getProgressiveDiscount(): ?float
    {
        return $this->progressiveDiscount;
    }

    /**
     * @param float $progressiveDiscount
     */
    public function setProgressiveDiscount(float $progressiveDiscount): void
    {
        $this->progressiveDiscount = $progressiveDiscount;
    }

    /**
     * @return float|null
     */
    public function getGroupDiscount(): ?float
    {
        return $this->groupDiscount;
    }

    /**
     * @param float $groupDiscount
     */
    public function setGroupDiscount(float $groupDiscount): void
    {
        $this->groupDiscount = $groupDiscount;
    }

    /**
     * @return bool|null
     */
    public function getSkipSendMail(): ?bool
    {
        return $this->skipSendMail;
    }

    /**
     * @param bool|null $skipSendMail
     */
    public function setSkipSendMail(?bool $skipSendMail): void
    {
        $this->skipSendMail = $skipSendMail;
    }

    /**
     * @return null|string
     */
    public function getJuridicalAddress(): ?string
    {
        return $this->juridicalAddress;
    }

    /**
     * @param null|string $juridicalAddress
     */
    public function setJuridicalAddress(?string $juridicalAddress): void
    {
        $this->juridicalAddress = $juridicalAddress;
    }

    /**
     * @return int|null
     */
    public function getInn(): ?int
    {
        return $this->inn;
    }

    /**
     * @param int $inn
     */
    public function setInn(int $inn): void
    {
        $this->inn = $inn;
    }

    /**
     * @return int|null
     */
    public function getKpp(): ?int
    {
        return $this->kpp;
    }

    /**
     * @param int $kpp
     */
    public function setKpp(int $kpp): void
    {
        $this->kpp = $kpp;
    }

    /**
     * @return int|null
     */
    public function getOgrn(): ?int
    {
        return $this->ogrn;
    }

    /**
     * @param int $ogrn
     */
    public function setOgrn(int $ogrn): void
    {
        $this->ogrn = $ogrn;
    }

    /**
     * @return int|null
     */
    public function getOkpo(): ?int
    {
        return $this->okpo;
    }

    /**
     * @param int $okpo
     */
    public function setOkpo(int $okpo): void
    {
        $this->okpo = $okpo;
    }

    /**
     * @return int|null
     */
    public function getBik(): ?int
    {
        return $this->bik;
    }

    /**
     * @param int $bik
     */
    public function setBik(int $bik): void
    {
        $this->bik = $bik;
    }

    /**
     * @return null|string
     */
    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    /**
     * @param null|string $bankName
     */
    public function setBankName(?string $bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * @return array|null
     */
    public function getFieldsValues(): ?array
    {
        return $this->fieldsValues;
    }

    /**
     * @param array|null $fieldsValues
     */
    public function setFieldsValues(?array $fieldsValues): void
    {
        $this->fieldsValues = $fieldsValues;
    }

    /**
     * @return array|null
     */
    public function getFieldsValuesAttributes(): ?array
    {
        return $this->fieldsValuesAttributes;
    }

    /**
     * @param array|null $fieldsValuesAttributes
     */
    public function setFieldsValuesAttributes(?array $fieldsValuesAttributes): void
    {
        $this->fieldsValuesAttributes = $fieldsValuesAttributes;
    }
}
