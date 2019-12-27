<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Members
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Counteragent
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("form")
     *
     * @FakeMockField(value="0x8F51001438C4D49511DBD774581EDB80")
     */
    public $form;

    /**
     * @var CustomForm|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\CustomForm")
     * @Serializer\SerializedName("customForm")
     *
     * @FakeMockField()
     */
    public $customForm;

    /**
     * @var Document|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Document")
     * @Serializer\SerializedName("document")
     *
     * @FakeMockField()
     */
    public $document;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isAnonym")
     *
     * @FakeMockField(value="false")
     */
    public $isAnonym;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phone")
     *
     * @FakeMockField(value="79213332211")
     */
    public $phone;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="Ромашка")
     */
    public $name;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("inn")
     *
     * @FakeMockField(value="1234567890")
     */
    public $inn;

    /**
     * @var Address|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Address")
     * @Serializer\SerializedName("juridicalAddress")
     *
     * @FakeMockField()
     */
    public $juridicalAddress;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("save")
     *
     * @FakeMockField(value="true")
     */
    public $save;
}
