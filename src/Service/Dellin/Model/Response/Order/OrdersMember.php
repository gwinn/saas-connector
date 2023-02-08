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
 * Class Member
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrdersMember
{
    /**
     * @var Opf|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Order\Opf")
     * @Serializer\SerializedName("opf")
     */
    public $opf;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("opfUid")
     */
    public $opfUid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="APIRequestPositiveSender")
     */
    public $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("address")
     *
     * @FakeMockField(value="г. Москва, Загорьевский проезд, д. 4")
     */
    public $address;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isPhysical")
     */
    public $isPhysical;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("inn")
     */
    public $inn;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("documentType")
     */
    public $documentType;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("documentSeries")
     */
    public $documentSeries;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("documentNumber")
     */
    public $documentNumber;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("counteragentUid")
     */
    public $counteragentUid;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("contacts")
     *
     * @FakeMockField(value="contact")
     */
    public $contacts;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phones")
     *
     * @FakeMockField(value="89136665588")
     */
    public $phones;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("anonym")
     */
    public $anonym;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("anonymEmail")
     */
    public $anonymEmail;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("anonymPhone")
     */
    public $anonymPhone;
}
