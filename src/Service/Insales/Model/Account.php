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
    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField(value="100049")
     */
    public $id;

    /**
     * @var string $subdomain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("subdomain")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $subdomain;

    /**
     * @var string $organization
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("organization")
     *
     * @FakeMockField(faker="title")
     */
    public $organization;

    /**
     * @var string $contactPhone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_phone")
     *
     * @FakeMockField(faker="phoneNumber")
     */
    public $contactPhone;

    /**
     * @var string $notificationEmail
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("notification_email")
     *
     * @FakeMockField(faker="email")
     */
    public $notificationEmail;

    /**
     * @var int $inviterId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("inviter_id")
     *
     * @FakeMockField()
     */
    public $inviterId;

    /**
     * @var bool $blocked
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("blocked")
     *
     * @FakeMockField(value="false")
     */
    public $blocked;

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
     * @var bool $hideItemsOutOfStock
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("hide_items_out_of_stock")
     *
     * @FakeMockField()
     */
    public $hideItemsOutOfStock;

    /**
     * @var string $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     *
     * @FakeMockField()
     */
    public $country;

    /**
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @FakeMockField()
     */
    public $city;

    /**
     * @var bool $enableOrderDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_order_discounts")
     *
     * @FakeMockField()
     */
    public $enableOrderDiscounts;

    /**
     * @var bool $enableClientDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_client_discounts")
     *
     * @FakeMockField()
     */
    public $enableClientDiscounts;

    /**
     * @var bool $enableGroupDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_group_discounts")
     *
     * @FakeMockField()
     */
    public $enableGroupDiscounts;

    /**
     * @var bool $enableCartDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("enable_cart_discounts")
     *
     * @FakeMockField()
     */
    public $enableCartDiscounts;

    /**
     * @var string $state
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("state")
     *
     * @FakeMockField()
     */
    public $state;

    /**
     * @var int $registrationTypeId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("registration_type_id")
     *
     * @FakeMockField()
     */
    public $registrationTypeId;

    /**
     * @var string $paidTill
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("paid_till")
     *
     * @FakeMockField(faker="date")
     */
    public $paidTill;

    /**
     * @var string $smsNotificationPhone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sms_notification_phone")
     *
     * @FakeMockField(faker="phoneNumber")
     */
    public $smsNotificationPhone;

    /**
     * @var string $email
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     *
     * @FakeMockField(faker="email")
     */
    public $email;

    /**
     * @var string $icq
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("icq")
     *
     * @FakeMockField()
     */
    public $icq;

    /**
     * @var string $phone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone")
     *
     * @FakeMockField(faker="phoneNumber")
     */
    public $phone;

    /**
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * @var float $minimumItemsPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("minimum_items_price")
     *
     * @FakeMockField()
     */
    public $minimumItemsPrice;

    /**
     * @var float $stockCurrencyExchangeRate
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("stock_currency_exchange_rate")
     *
     * @FakeMockField()
     */
    public $stockCurrencyExchangeRate;

    /**
     * @var string $clientCookiesWhitelist
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("client_cookies_whitelist")
     *
     * @FakeMockField()
     */
    public $clientCookiesWhitelist;

    /**
     * @var string $mainHost
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("main_host")
     *
     * @FakeMockField()
     */
    public $mainHost;

    /**
     * @var string $mainHostProtocol
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("main_host_protocol")
     *
     * @FakeMockField(value="https")
     */
    public $mainHostProtocol;

    /**
     * @var int $nextOrderNumber
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("next_order_number")
     *
     * @FakeMockField()
     */
    public $nextOrderNumber;

    /**
     * @var string $timeZone
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("time_zone")
     *
     * @FakeMockField(value="Moscow")
     */
    public $timeZone;

    /**
     * @var Owner $owner
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Owner")
     * @JMS\SerializedName("owner")
     *
     * @FakeMockField()
     */
    public $owner;
}
