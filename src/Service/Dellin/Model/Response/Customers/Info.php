<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Customers;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Info
 *
 * @package  SaaS\Service\Dellin\Model\Response\Customers
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Info
{
    /**
     * @var array|Shared[]
     *
     * @Serializer\Type(array<SaaS\Service\Dellin\Model\Response\Customers\Shared>)
     * @Serializer\SerializedName("shared_to")
     */
    public $sharedTo;

    /**
     * Available: 0 (access request in process) | 1 (access denied) | 2 (full access) | 3 (partial access)
     *
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("access_level")
     *
     * @FakeMockField(value="2")
     */
    public $accessLevel;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("request_comment")
     */
    public $requestComment;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("manager_name")
     *
     * @FakeMockField(value="Иванов Иван Иванович")
     */
    public $managerName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("manager_email")
     *
     * @FakeMockField(value="Ivan.Ivanov@dellin.ru")
     */
    public $managerEmail;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("manager_phone")
     *
     * @FakeMockField(value="+7 (911) 232-95-50")
     */
    public $managerPhone;

    /**
     * @var Shared
     *
     * @Serializer\Type(SaaS\Service\Dellin\Model\Response\Customers\Shared)
     * @Serializer\SerializedName("shared_from")
     *
     * @FakeMockField()
     */
    public $sharedFrom;
}
