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
 * Class Outlet
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Outlet
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
     * @var string $externalId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("external_id")
     *
     * @FakeMockField()
     */
    public $externalId;

    /**
     * @var string $latitude
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("latitude")
     *
     * @FakeMockField(faker="latitude")
     */
    public $latitude;

    /**
     * @var string $longitude
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("longitude")
     *
     * @FakeMockField(faker="longitude")
     */
    public $longitude;


    /**
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @FakeMockField()
     */
    public $address;

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
     * @var string $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     *
     * @FakeMockField()
     */
    public $description;

    /**
     * @var array $paymentMethod
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("payment_method")
     */
    public $paymentMethod = [];
}
