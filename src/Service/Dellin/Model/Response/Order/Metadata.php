<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Order;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Metadata
 *
 * @package  SaaS\Service\Dellin\Model\Response\Order
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Metadata
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("status")
     *
     * @FakeMockField(value="200")
     */
    public $status;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("currentPage")
     *
     * @FakeMockField(value="1")
     */
    public $currentPage;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("nextPage")
     */
    public $nextPage;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("prevPage")
     */
    public $prevPage;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("totalPages")
     *
     * @FakeMockField(value="1")
     */
    public $totalPages;

    /**
     * Format: YYYY-MM-DD HH:MM:SS
     *
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("generatedAt")
     *
     * @FakeMockField(value="2019-11-11 12:50:20")
     */
    public $generatedAt;
}
