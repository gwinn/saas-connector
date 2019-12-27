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
 * Class RequestServicesResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class RequestServicesResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("hash")
     *
     * @FakeMockField(value="1707aea20f301fd0a8787b5a68608dd6cf270347ea04c266f1b4c6aa540088a4")
     */
    public $hash;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("url")
     *
     * @FakeMockField(value="https://api.dellin.ru/catalog/request_services.csv?sk=Kn0OtWJcumDYUqRjtCEvhg&e=1401285434")
     */
    public $url;
}
