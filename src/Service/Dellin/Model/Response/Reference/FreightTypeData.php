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
 * Class FreightTypeData
 *
 * @package  SaaS\Service\Dellin\Model\Response\Reference
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class FreightTypeData
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sqlUID")
     *
     * @FakeMockField(value="0x960d35a065ddb1e841a8b09bf5eb42cc")
     */
    public $sqlUid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     *
     * @FakeMockField(value="Коробка передач")
     */
    public $value;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("order")
     *
     * @FakeMockField(value="1")
     */
    public $order;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("can_transport")
     *
     * @FakeMockField(value="1")
     */
    public $canTransport;


    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     *
     * @FakeMockField(value="Обязательна жесткая упаковка.Во Владивостоке и Хабаровске доступна специальная упаковка для автозапчастей-жесткий короб.")
     */
    public $comment;
}
