<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Book;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Document
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Document
{
    /**
     * Available: passport | drivingLicence | foreignPassport
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     *
     * @FakeMockField(value="passport")
     */
    public $type;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("serial")
     *
     * @FakeMockField(value="0000")
     */
    public $serial;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("number")
     *
     * @FakeMockField(value="000000")
     */
    public $number;

    /**
     * Format: YYYY-MM-DD
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("date")
     *
     * @FakeMockField(value="2014-01-23")
     */
    public $date;
}
