<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Book;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CounteragentRequest
 *
 * @package  SaaS\Service\Dellin\Model\Request\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CounteragentRequest
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("form")
     *
     * @FakeMockField(value="0x8F51001438C4D49511DBD774581EDB80")
     */
    public $form;

    /**
     * @var CustomForm
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Book\CustomForm")
     * @Serializer\SerializedName("customForm")
     *
     * @FakeMockField()
     */
    public $customForm;

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
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("inn")
     *
     * @FakeMockField(value="1234567890")
     */
    public $inn;

    /**
     * @var JuridicalAddress
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Book\JuridicalAddress")
     * @Serializer\SerializedName("juridicalAddress")
     *
     * @FakeMockField()
     */
    public $juridicalAddress;
}
