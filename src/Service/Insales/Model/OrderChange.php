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
 * Class OrderChange
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrderChange
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
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $action
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("action")
     *
     * @FakeMockField()
     */
    public $action;

    /**
     * @var array $valueWas
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("value_was")
     *
     * @FakeMockField()
     */
    public $valueWas;

    /**
     * @var array $valueIs
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("value_is")
     *
     * @FakeMockField()
     */
    public $valueIs;

    /**
     * @var string $fullDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_description")
     *
     * @FakeMockField()
     */
    public $fullDescription;

    /**
     * @var string $userName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("user_name")
     *
     * @FakeMockField()
     */
    public $userName;
}
