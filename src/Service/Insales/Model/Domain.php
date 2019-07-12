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
 * Class Domain
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Domain
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
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * @var string $domain
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("domain")
     *
     * @FakeMockField(faker="domainName")
     */
    public $domain;

    /**
     * @var bool $main
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("main")
     *
     * @FakeMockField()
     */
    public $main;
}
