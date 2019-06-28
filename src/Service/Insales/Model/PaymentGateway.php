<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;

/**
 * Class PaymentGateway
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class PaymentGateway
{
    const COD = 'PaymentGateway::Cod';
    const CUSTOM = 'PaymentGateway::Custom';
    const EXTERNAL = 'PaymentGateway::External';

    /**
     * @var int $id
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     *
     * @FakeMockField()
     */
    public $id;

    /**
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * @var int $position
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("position")
     *
     * @FakeMockField()
     */
    public $position;

    /**
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * @var string $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     *
     * @FakeMockField()
     */
    public $description;

    /**
     * @var string $type
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     *
     * @FakeMockField(
     *     faker="randomElement",
     *     arguments={{"PaymentGateway::Cod", "PaymentGateway::Custom", "PaymentGateway::External"}}
     * )
     */
    public $type;

    /**
     * @var float $margin
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("margin")
     *
     * @FakeMockField()
     */
    public $margin;

    /**
     * @var array $paymentDeliveryVariants
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\PaymentDeliveryVariant>")
     * @JMS\SerializedName("payment_delivery_variants")
     *
     * @FakeMockField()
     */
    public $paymentDeliveryVariants;
}
