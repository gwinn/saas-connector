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
 * Trait PageFilter
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
trait PageFilter
{
    /**
     * @var int $page
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("page")
     *
     * @FakeMockField()
     */
    public $page;

    /**
     * @var int $perPage
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("per_page")
     *
     * @FakeMockField()
     */
    public $perPage;
}
