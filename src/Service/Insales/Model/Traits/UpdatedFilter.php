<?php

/**
 * PHP version 7.0
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Traits;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;

/**
 * Trait UpdatedFilter
 *
 * @category Integration
 * @package  SaaS\Service\Insales\Model\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
trait UpdatedFilter
{
    /**
     * @var string $updatedSince
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_since")
     *
     * @FakeMockField()
     */
    public $updatedSince;

    /**
     * @var int $fromId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("from_id")
     *
     * @FakeMockField()
     */
    public $fromId;
}
