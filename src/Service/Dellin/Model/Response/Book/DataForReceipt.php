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
 * Class DataForReceipt
 *
 * @package  SaaS\Service\Dellin\Model\Response\Book
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DataForReceipt
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phone")
     *
     * @FakeMockField(value="+79ХХХХХХХХХ")
     */
    public $phone;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("email")
     *
     * @FakeMockField(value="test@mail.ru")
     */
    public $email;
}
