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
    protected $categoryId;

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
    protected $collectionId;

    /**
     * Get deleted products
     *
     * @var bool|null $deleted
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("deleted")
     *
     * @FakeMockField()
     */
    protected $deleted;

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int|null
     */
    public function getCollectionId(): ?int
    {
        return $this->collectionId;
    }

    /**
     * @param int $collectionId
     */
    public function setCollectionId(int $collectionId): void
    {
        $this->collectionId = $collectionId;
    }

    /**
     * @return bool|null
     */
    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}
