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
 * Class TerminalListResponse
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class TerminalListResponse
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("hash")
     *
     * @FakeMockField(value="afb376bcefe05f204e6d456785e859813228537677ec3092bb4668b0f8ca7dd1")
     */
    public $hash;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("url")
     *
     * @FakeMockField(value="http://api.dellin.ru/catalog/terminals_v3.json?sk=YxKEbTqWQ1CBIyfLo8Q3lg&e=1521185588")
     */
    public $url;
}
