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
 * Class DeliveryZone
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryZone
{
    use Traits\Id;
    use Traits\Title;

    /**
     * For get delivery zone
     *
     * @var array|null $tariffs
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Tariff>")
     * @JMS\SerializedName("tariffs")
     */
    protected $tariffs = [];

    /**
     * For create delivery zone
     *
     * @var array|null $tariffsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Tariff>")
     * @JMS\SerializedName("tariffs_attributes")
     */
    protected $tariffsAttributes = [];

    /**
     * For get delivery variant
     *
     * @var array|null $deliveryLocations
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations")
     */
    protected $deliveryLocations = [];

    /**
     * For create delivery variant
     *
     * @var array|null $deliveryLocationsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations_attributes")
     */
    protected $deliveryLocationsAttributes = [];

    /**
     * @return array|null
     */
    public function getTariffs(): ?array
    {
        return $this->tariffs;
    }

    /**
     * @param array|null $tariffs
     */
    public function setTariffs(?array $tariffs): void
    {
        $this->tariffs = $tariffs;
    }

    /**
     * @return array|null
     */
    public function getTariffsAttributes(): ?array
    {
        return $this->tariffsAttributes;
    }

    /**
     * @param array|null $tariffsAttributes
     */
    public function setTariffsAttributes(?array $tariffsAttributes): void
    {
        $this->tariffsAttributes = $tariffsAttributes;
    }

    /**
     * @return array|null
     */
    public function getDeliveryLocations(): ?array
    {
        return $this->deliveryLocations;
    }

    /**
     * @param array|null $deliveryLocations
     */
    public function setDeliveryLocations(?array $deliveryLocations): void
    {
        $this->deliveryLocations = $deliveryLocations;
    }

    /**
     * @return array|null
     */
    public function getDeliveryLocationsAttributes(): ?array
    {
        return $this->deliveryLocationsAttributes;
    }

    /**
     * @param array|null $deliveryLocationsAttributes
     */
    public function setDeliveryLocationsAttributes(?array $deliveryLocationsAttributes): void
    {
        $this->deliveryLocationsAttributes = $deliveryLocationsAttributes;
    }
}
