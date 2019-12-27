<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Reference;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class OpfData
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OpfData
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("uid")
     *
     * @FakeMockField(value="0x8390b2048d37e0154b845fb22793e865")
     */
    public $uid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @FakeMockField(value="ОАО")
     */
    public $name;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("juridical")
     *
     * @FakeMockField(value="true")
     */
    public $juridical;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("title")
     *
     * @FakeMockField(value="Открытое Акционерное Общество")
     */
    public $title;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("innLength")
     *
     * @FakeMockField(value="10")
     */
    public $innLength;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryUID")
     *
     * @FakeMockField(value="0x8f51001438c4d49511dbd774581edb7a")
     */
    public $countryUid;
}
