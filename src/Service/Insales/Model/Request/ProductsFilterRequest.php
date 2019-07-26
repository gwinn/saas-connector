<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Request;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use SaaS\Service\Insales\Model\Traits\PageFilter;
use SaaS\Service\Insales\Model\Traits\UpdatedFilter;

/**
 * Class ProductsFilterRequest
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ProductsFilterRequest extends FilterRequest
{
    use PageFilter;
    use UpdatedFilter;

    /**
     * Stock category id
     *
     * @var int $categoryId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("category_id")
     *
     * @FakeMockField()
     */
    public $categoryId;

    /**
     * Site category id
     *
     * @var int $collectionId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("collection_id")
     *
     * @FakeMockField()
     */
    public $collectionId;

    /**
     * Get deleted products
     *
     * @var bool $deleted
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("deleted")
     *
     * @FakeMockField()
     */
    public $deleted;
}
