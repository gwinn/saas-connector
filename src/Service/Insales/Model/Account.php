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
 * Class Account
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Account
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\Title;
    use Traits\Email;

    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField(value="100049")
     */
    protected $id;

    /**
     * @var string|null $subdomain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("subdomain")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    protected $subdomain;

    /**
     * @var string|null $organization
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("organization")
     *
     * @FakeMockField(faker="title")
     */
    protected $organization;

    /**
     * @var string|null $contactPhone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_phone")
     *
     * @FakeMockField(faker="phoneNumber")
     */
    protected $contactPhone;

    /**
     * @var string|null $notificationEmail
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("notification_email")
     *
     * @FakeMockField(faker="email")
     */
    protected $notificationEmail;

    /**
     * @var int|null $inviterId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("inviter_id")
     *
     * @FakeMockField(faker="randomNumber")
     */
    protected $inviterId;

    /**
     * @var bool|null $blocked
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("blocked")
     *
     * @FakeMockField(value="false")
     */
    protected $blocked;

    /**
     * @var bool|null $hideItemsOutOfStock
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("hide_items_out_of_stock")
     *
     * @FakeMockField()
     */
    protected $hideItemsOutOfStock;

    /**
     * @var string|null $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     *
     * @FakeMockField()
     */
    protected $country;

    /**
     * @var string|null $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @FakeMockField()
     */
    protected $city;

    /**
     * @var bool|null $enableOrderDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_order_discounts")
     *
     * @FakeMockField()
     */
    protected $enableOrderDiscounts;

    /**
     * @var bool|null $enableClientDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_client_discounts")
     *
     * @FakeMockField()
     */
    protected $enableClientDiscounts;

    /**
     * @var bool|null $enableGroupDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_group_discounts")
     *
     * @FakeMockField()
     */
    protected $enableGroupDiscounts;

    /**
     * @var bool|null $enableCartDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_cart_discounts")
     *
     * @FakeMockField()
     */
    protected $enableCartDiscounts;

    /**
     * @var string|null $state
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state")
     *
     * @FakeMockField()
     */
    protected $state;

    /**
     * @var int|null $registrationTypeId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("registration_type_id")
     *
     * @FakeMockField(faker="randomNumber")
     */
    protected $registrationTypeId;

    /**
     * @var string|null $paidTill
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("paid_till")
     *
     * @FakeMockField(faker="date")
     */
    protected $paidTill;

    /**
     * @var string|null $smsNotificationPhone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sms_notification_phone")
     *
     * @FakeMockField(faker="phoneNumber")
     */
    protected $smsNotificationPhone;

    /**
     * @var string|null $icq
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("icq")
     *
     * @FakeMockField()
     */
    protected $icq;

    /**
     * @var string|null $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField(faker="phoneNumber")
     */
    protected $phone;

    /**
     * @var float|null $minimumItemsPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("minimum_items_price")
     *
     * @FakeMockField(faker="randomFloat")
     */
    protected $minimumItemsPrice;

    /**
     * @var float|null $stockCurrencyExchangeRate
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("stock_currency_exchange_rate")
     *
     * @FakeMockField(faker="randomFloat")
     */
    protected $stockCurrencyExchangeRate;

    /**
     * @var string|null $clientCookiesWhitelist
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("client_cookies_whitelist")
     *
     * @FakeMockField()
     */
    protected $clientCookiesWhitelist;

    /**
     * @var string|null $mainHost
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("main_host")
     *
     * @FakeMockField()
     */
    protected $mainHost;

    /**
     * @var string|null $mainHostProtocol
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("main_host_protocol")
     *
     * @FakeMockField(value="https")
     */
    protected $mainHostProtocol;

    /**
     * @var int|null $nextOrderNumber
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("next_order_number")
     *
     * @FakeMockField(faker="randomNumber")
     */
    protected $nextOrderNumber;

    /**
     * @var string|null $timeZone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("time_zone")
     *
     * @FakeMockField(value="Moscow")
     */
    protected $timeZone;

    /**
     * @var Owner $owner
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Owner")
     * @JMS\SerializedName("owner")
     *
     * @FakeMockField()
     */
    protected $owner;

    public function __construct()
    {
        $this->owner = new Owner();
    }

    /**
     * @return null|string
     */
    public function getSubdomain(): ?string
    {
        return $this->subdomain;
    }

    /**
     * @param null|string $subdomain
     */
    public function setSubdomain(?string $subdomain): void
    {
        $this->subdomain = $subdomain;
    }

    /**
     * @return null|string
     */
    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    /**
     * @param null|string $organization
     */
    public function setOrganization(?string $organization): void
    {
        $this->organization = $organization;
    }

    /**
     * @return null|string
     */
    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    /**
     * @param null|string $contactPhone
     */
    public function setContactPhone(?string $contactPhone): void
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return null|string
     */
    public function getNotificationEmail(): ?string
    {
        return $this->notificationEmail;
    }

    /**
     * @param null|string $notificationEmail
     */
    public function setNotificationEmail(?string $notificationEmail): void
    {
        $this->notificationEmail = $notificationEmail;
    }

    /**
     * @return int|null
     */
    public function getInviterId(): ?int
    {
        return $this->inviterId;
    }

    /**
     * @param int|null $inviterId
     */
    public function setInviterId(?int $inviterId): void
    {
        $this->inviterId = $inviterId;
    }

    /**
     * @return bool|null
     */
    public function getBlocked(): ?bool
    {
        return $this->blocked;
    }

    /**
     * @param bool|null $blocked
     */
    public function setBlocked(?bool $blocked): void
    {
        $this->blocked = $blocked;
    }

    /**
     * @return bool|null
     */
    public function getHideItemsOutOfStock(): ?bool
    {
        return $this->hideItemsOutOfStock;
    }

    /**
     * @param bool|null $hideItemsOutOfStock
     */
    public function setHideItemsOutOfStock(?bool $hideItemsOutOfStock): void
    {
        $this->hideItemsOutOfStock = $hideItemsOutOfStock;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return bool|null
     */
    public function getEnableOrderDiscounts(): ?bool
    {
        return $this->enableOrderDiscounts;
    }

    /**
     * @param bool|null $enableOrderDiscounts
     */
    public function setEnableOrderDiscounts(?bool $enableOrderDiscounts): void
    {
        $this->enableOrderDiscounts = $enableOrderDiscounts;
    }

    /**
     * @return bool|null
     */
    public function getEnableClientDiscounts(): ?bool
    {
        return $this->enableClientDiscounts;
    }

    /**
     * @param bool|null $enableClientDiscounts
     */
    public function setEnableClientDiscounts(?bool $enableClientDiscounts): void
    {
        $this->enableClientDiscounts = $enableClientDiscounts;
    }

    /**
     * @return bool|null
     */
    public function getEnableGroupDiscounts(): ?bool
    {
        return $this->enableGroupDiscounts;
    }

    /**
     * @param bool|null $enableGroupDiscounts
     */
    public function setEnableGroupDiscounts(?bool $enableGroupDiscounts): void
    {
        $this->enableGroupDiscounts = $enableGroupDiscounts;
    }

    /**
     * @return bool|null
     */
    public function getEnableCartDiscounts(): ?bool
    {
        return $this->enableCartDiscounts;
    }

    /**
     * @param bool|null $enableCartDiscounts
     */
    public function setEnableCartDiscounts(?bool $enableCartDiscounts): void
    {
        $this->enableCartDiscounts = $enableCartDiscounts;
    }

    /**
     * @return null|string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int|null
     */
    public function getRegistrationTypeId(): ?int
    {
        return $this->registrationTypeId;
    }

    /**
     * @param int|null $registrationTypeId
     */
    public function setRegistrationTypeId(?int $registrationTypeId): void
    {
        $this->registrationTypeId = $registrationTypeId;
    }

    /**
     * @return null|string
     */
    public function getPaidTill(): ?string
    {
        return $this->paidTill;
    }

    /**
     * @param null|string $paidTill
     */
    public function setPaidTill(?string $paidTill): void
    {
        $this->paidTill = $paidTill;
    }

    /**
     * @return null|string
     */
    public function getSmsNotificationPhone(): ?string
    {
        return $this->smsNotificationPhone;
    }

    /**
     * @param null|string $smsNotificationPhone
     */
    public function setSmsNotificationPhone(?string $smsNotificationPhone): void
    {
        $this->smsNotificationPhone = $smsNotificationPhone;
    }

    /**
     * @return null|string
     */
    public function getIcq(): ?string
    {
        return $this->icq;
    }

    /**
     * @param null|string $icq
     */
    public function setIcq(?string $icq): void
    {
        $this->icq = $icq;
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
     * @return float|null
     */
    public function getMinimumItemsPrice(): ?float
    {
        return $this->minimumItemsPrice;
    }

    /**
     * @param float|null $minimumItemsPrice
     */
    public function setMinimumItemsPrice(?float $minimumItemsPrice): void
    {
        $this->minimumItemsPrice = $minimumItemsPrice;
    }

    /**
     * @return float|null
     */
    public function getStockCurrencyExchangeRate(): ?float
    {
        return $this->stockCurrencyExchangeRate;
    }

    /**
     * @param float|null $stockCurrencyExchangeRate
     */
    public function setStockCurrencyExchangeRate(?float $stockCurrencyExchangeRate): void
    {
        $this->stockCurrencyExchangeRate = $stockCurrencyExchangeRate;
    }

    /**
     * @return null|string
     */
    public function getClientCookiesWhitelist(): ?string
    {
        return $this->clientCookiesWhitelist;
    }

    /**
     * @param null|string $clientCookiesWhitelist
     */
    public function setClientCookiesWhitelist(?string $clientCookiesWhitelist): void
    {
        $this->clientCookiesWhitelist = $clientCookiesWhitelist;
    }

    /**
     * @return null|string
     */
    public function getMainHost(): ?string
    {
        return $this->mainHost;
    }

    /**
     * @param null|string $mainHost
     */
    public function setMainHost(?string $mainHost): void
    {
        $this->mainHost = $mainHost;
    }

    /**
     * @return null|string
     */
    public function getMainHostProtocol(): ?string
    {
        return $this->mainHostProtocol;
    }

    /**
     * @param null|string $mainHostProtocol
     */
    public function setMainHostProtocol(?string $mainHostProtocol): void
    {
        $this->mainHostProtocol = $mainHostProtocol;
    }

    /**
     * @return int|null
     */
    public function getNextOrderNumber(): ?int
    {
        return $this->nextOrderNumber;
    }

    /**
     * @param int|null $nextOrderNumber
     */
    public function setNextOrderNumber(?int $nextOrderNumber): void
    {
        $this->nextOrderNumber = $nextOrderNumber;
    }

    /**
     * @return null|string
     */
    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    /**
     * @param null|string $timeZone
     */
    public function setTimeZone(?string $timeZone): void
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return Owner|null
     */
    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    /**
     * @param Owner $owner
     */
    public function setOwner(Owner $owner): void
    {
        $this->owner = $owner;
    }
}
