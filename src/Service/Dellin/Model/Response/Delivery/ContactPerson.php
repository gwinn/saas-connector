<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ContactPerson
 *
 * @package  SaaS\Service\Dellin\Model\Response\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ContactPerson
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     *
     * @FakeMockField(value="78436784")
     */
    public $id;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("state")
     *
     * @FakeMockField(value="existed")
     */
    public $state;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     *
     * @FakeMockField(value="Иван Иванович")
     */
    public $value;
}
