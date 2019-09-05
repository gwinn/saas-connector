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
 * Class Characteristic
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Characteristic
{
    use Traits\Id;
    use Traits\Title;
    use Traits\Position;
    use Traits\Permalink;

    /**
     * @var int $propertyId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("property_id")
     *
     * @FakeMockField()
     */
    protected $propertyId;

    /**
     * @return int|null
     */
    public function getPropertyId(): ?int
    {
        return $this->propertyId;
    }

    /**
     * @param int $propertyId
     */
    public function setPropertyId(int $propertyId): void
    {
        $this->propertyId = $propertyId;
    }
}
