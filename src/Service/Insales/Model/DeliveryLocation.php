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
 * Class DeliveryLocation
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class DeliveryLocation
{
    use Traits\Id;

    /**
     * Field Region should be enabled in checkout options to be binded to shipping method
     *
     * @var string|null $region
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("region")
     *
     * @FakeMockField()
     */
    protected $region;

    /**
     * If shop has many countries, fill this field;it should be enabled in checkout options to be binded to shipping method
     *
     * @var string|null $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     *
     * @FakeMockField()
     */
    protected $country;

    /**
     * Field Region should be filled
     *
     * @var string|null $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     *
     * @FakeMockField()
     */
    protected $city;

    /**
     * @return null|string
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param null|string $region
     */
    public function setRegion(?string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param null|string $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }
}
