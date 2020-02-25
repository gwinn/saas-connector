<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Request\Delivery;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CustomForm
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CustomForm
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("formName")
     *
     * @FakeMockField(value="ОБРУГ")
     */
    public $formName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryUID")
     *
     * @FakeMockField(value="0x00000000000000000000000000000000")
     */
    public $countryUid;

    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("juridical")
     *
     * @FakeMockField(value="true")
     */
    public $juridical;
}
