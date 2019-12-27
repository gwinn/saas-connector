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
 * Class DeliveryRequest
 *
 * @package  SaaS\Service\Dellin\Model\Request\Delivery
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryRequest
{
    /**
     * @var bool
     *
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("inOrder")
     *
     * @FakeMockField(value="true")
     */
    public $inOrder;

    /**
     * @var Delivery
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Delivery")
     * @Serializer\SerializedName("delivery")
     *
     * @FakeMockField()
     */
    public $delivery;

    /**
     * @var Members
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Members")
     * @Serializer\SerializedName("members")
     *
     * @FakeMockField()
     */
    public $members;

    /**
     * @var Cargo
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Cargo")
     * @Serializer\SerializedName("cargo")
     *
     * @FakeMockField()
     */
    public $cargo;

    /**
     * @var Payment
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Request\Delivery\Payment")
     * @Serializer\SerializedName("payment")
     */
    public $payment;
}
