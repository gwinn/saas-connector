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
 * Class ApplicationCharge
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ApplicationCharge
{
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
     * Purpose of payment
     *
     * @var string $name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     *
     * @FakeMockField()
     */
    public $name;

    /**
     * Url for notification about payment
     *
     * @var string $returnUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("return_url")
     *
     * @FakeMockField(faker="url")
     */
    public $returnUrl;

    /**
     * @var string $confirmationUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("confirmation_url")
     *
     * @FakeMockField(faker="url")
     */
    public $confirmationUrl;

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
     * Bill amount
     *
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    public $price;

    /**
     * @var string $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     *
     * @FakeMockField(faker="randomElement", arguments={{"declined", "pending"}})
     */
    public $status;

    /**
     * Flag for debugging purpose; if true, bill can be confirmed without payment; false by default
     *
     * @var bool $test
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("test")
     *
     * @FakeMockField(value="true")
     */
    public $test;
}
