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
 * Class ContactDetailsResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ContactDetailsResponse
{
    /**
     * @var array|Contact[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\Contact>")
     * @Serializer\SerializedName("contacts")
     */
    public $contacts;

    /**
     * @var array|Phone[]
     *
     * @Serializer\Type("array<SaaS\Service\Dellin\Model\Response\Calculator\Phone>")
     * @Serializer\SerializedName("phones")
     */
    public $phones;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("lastUpdate")
     *
     * @FakeMockField(value="2017-05-18T17:23:58.000+03:00")
     */
    public $lastUpdate;
}
