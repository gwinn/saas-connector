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
 * Class Outlet
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Outlet
{
    use Traits\Id;
    use Traits\Title;
    use Traits\Description;

    /**
     * @var string|null $externalId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("external_id")
     *
     * @FakeMockField()
     */
    public $externalId;

    /**
     * @var string|null $latitude
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("latitude")
     *
     * @FakeMockField(faker="latitude")
     */
    public $latitude;

    /**
     * @var string|null $longitude
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("longitude")
     *
     * @FakeMockField(faker="longitude")
     */
    public $longitude;

    /**
     * @var string|null $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @FakeMockField()
     */
    public $address;

    /**
     * @var array|null $paymentMethod
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("payment_method")
     */
    public $paymentMethod = [];

    /**
     * @return null|string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param null|string $externalId
     */
    public function setExternalId(?string $externalId): void
    {
        $this->externalId = $externalId;
    }

    /**
     * @return null|string
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * @param null|string $latitude
     */
    public function setLatitude(?string $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return null|string
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * @param null|string $longitude
     */
    public function setLongitude(?string $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return array|null
     */
    public function getPaymentMethod(): ?array
    {
        return $this->paymentMethod;
    }

    /**
     * @param array|null $paymentMethod
     */
    public function setPaymentMethod(?array $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }
}
