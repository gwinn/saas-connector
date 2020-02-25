<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Tracker;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Request
 *
 * @package  SaaS\Service\Dellin\Model\Response\Tracker
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Request
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("cityID")
     *
     * @FakeMockField(value="234")
     */
    public $cityId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("docNumber")
     *
     * @FakeMockField(value="16-123456789")
     */
    public $docNumber;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("price")
     *
     * @FakeMockField(value="500")
     */
    public $price;
}
