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
     * Title of delivery zone
     *
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * For get delivery zone
     *
     * @var array $tariffs
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Tariff>")
     * @JMS\SerializedName("tariffs")
     */
    public $tariffs = [];

    /**
     * For create delivery zone
     *
     * @var array $tariffsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Tariff>")
     * @JMS\SerializedName("tariffs_attributes")
     */
    public $tariffsAttributes = [];

    /**
     * For get delivery variant
     *
     * @var array $deliveryLocations
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations")
     */
    public $deliveryLocations = [];

    /**
     * For create delivery variant
     *
     * @var array $deliveryLocationsAttributes
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\DeliveryLocation>")
     * @JMS\SerializedName("delivery_locations_attributes")
     */
    public $deliveryLocationsAttributes = [];
}
