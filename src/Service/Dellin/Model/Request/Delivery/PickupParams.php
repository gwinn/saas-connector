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
 * Class PickupParams
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class PickupParams
{
    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("derivalDriverPass")
     *
     * @FakeMockField(value="24")
     */
    public $derivalDriverPass;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("shipmentRegister")
     *
     * @FakeMockField(value="true")
     */
    public $shipmentRegister;

    /**
     * @var PaidEntry|null
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\PaidEntry")
     * @Serializer\SerializedName("paidEntry")
     *
     * @FakeMockField()
     */
    public $paidEntry;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shipmentDerival")
     *
     * @FakeMockField(value="АБ1000222")
     */
    public $shipmentDerival;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("priorCall")
     *
     * @FakeMockField(value="true")
     */
    public $priorCall;

    /**
     * @var bool|null
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("noNeedAgreement")
     *
     * @FakeMockField(value="true")
     */
    public $noNeedAgreement;

    /**
     * @var array|string[]|null
     *
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("documentsForReceive")
     */
    public $documentsForReceive;
}
