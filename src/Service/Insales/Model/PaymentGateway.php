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
use SaaS\Service\Insales\Model\Traits;

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
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;
    use Traits\Position;
    use Traits\Description;

    const COD = 'PaymentGateway::Cod';
    const CUSTOM = 'PaymentGateway::Custom';
    const EXTERNAL = 'PaymentGateway::External';

    /**
     * @var string|null $type
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
     * @var array|null $paymentDeliveryVariants
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\PaymentDeliveryVariant>")
     * @JMS\SerializedName("payment_delivery_variants")
     */
    public $paymentDeliveryVariants = [];

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float|null
     */
    public function getMargin(): ?float
    {
        return $this->margin;
    }

    /**
     * @param float $margin
     */
    public function setMargin(float $margin): void
    {
        $this->margin = $margin;
    }

    /**
     * @return array|null
     */
    public function getPaymentDeliveryVariants(): ?array
    {
        return $this->paymentDeliveryVariants;
    }

    /**
     * @param array|null $paymentDeliveryVariants
     */
    public function setPaymentDeliveryVariants(?array $paymentDeliveryVariants): void
    {
        $this->paymentDeliveryVariants = $paymentDeliveryVariants;
    }
}
