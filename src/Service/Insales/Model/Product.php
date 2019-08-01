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
 * Class Product
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Product
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Title;
    use Traits\Permalink;
    use Traits\Description;

    /**
     * @var bool|null $archived
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("archived")
     *
     * @FakeMockField()
     */
    public $archived;

    /**
     * @var bool|null $available
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("available")
     *
     * @FakeMockField()
     */
    public $available;

    /**
     * @var int $canonicalUrlCollectionId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("canonical_url_collection_id")
     *
     * @FakeMockField()
     */
    public $canonicalUrlCollectionId;

    /**
     * @var int $categoryId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("category_id")
     *
     * @FakeMockField()
     */
    public $categoryId;

    /**
     * @var bool|null $ignoreDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("ignore_discounts")
     *
     * @FakeMockField()
     */
    public $ignoreDiscounts;

    /**
     * @var bool|null $isHidden
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_hidden")
     *
     * @FakeMockField()
     */
    public $isHidden;

    /**
     * @var bool|null $sortWeight
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("sort_weight")
     *
     * @FakeMockField()
     */
    public $sortWeight;

    /**
     * @var string|null $unit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     *
     * @FakeMockField()
     */
    public $unit;

    /**
     * @var string|null $dimensions
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("dimensions")
     *
     * @FakeMockField()
     */
    public $dimensions;

    /**
     * @var int $vat
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("vat")
     *
     * @FakeMockField()
     */
    public $vat;

    /**
     * @var string|null $shortDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("short_description")
     *
     * @FakeMockField()
     */
    public $shortDescription;

    /**
     * @var string|null $htmlTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("html_title")
     *
     * @FakeMockField()
     */
    public $htmlTitle;

    /**
     * @var string|null $metaKeywords
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("meta_keywords")
     *
     * @FakeMockField()
     */
    public $metaKeywords;

    /**
     * @var string|null $metaDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("meta_description")
     *
     * @FakeMockField()
     */
    public $metaDescription;

    /**
     * @var string|null $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     *
     * @FakeMockField()
     */
    public $currencyCode;

    /**
     * @var array|null $collectionsIds
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("collections_ids")
     */
    public $collectionsIds = [];

    /**
     * @var array|null $images
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("images")
     */
    public $images = [];

    /**
     * @var array|null $optionNames
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OptionName>")
     * @JMS\SerializedName("option_names")
     */
    public $optionNames = [];

    /**
     * @var array|null $properties
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Property>")
     * @JMS\SerializedName("properties")
     */
    public $properties = [];

    /**
     * @var array|null $characteristics
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Characteristic>")
     * @JMS\SerializedName("characteristics")
     */
    public $characteristics = [];

    /**
     * @var array|null $productFieldValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\ProductFieldValue>")
     * @JMS\SerializedName("product_field_values")
     */
    public $productFieldValues = [];

    /**
     * @var array|null $variants
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Variant>")
     * @JMS\SerializedName("variants")
     */
    public $variants = [];

    /**
     * @var array|null $productBundleComponents
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\ProductBundleComponent>")
     * @JMS\SerializedName("product_bundle_components")
     */
    public $productBundleComponents = [];

    /**
     * @return bool|null
     */
    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    /**
     * @param bool|null $archived
     */
    public function setArchived(?bool $archived): void
    {
        $this->archived = $archived;
    }

    /**
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    /**
     * @param bool|null $available
     */
    public function setAvailable(?bool $available): void
    {
        $this->available = $available;
    }

    /**
     * @return int|null
     */
    public function getCanonicalUrlCollectionId(): ?int
    {
        return $this->canonicalUrlCollectionId;
    }

    /**
     * @param int $canonicalUrlCollectionId
     */
    public function setCanonicalUrlCollectionId(int $canonicalUrlCollectionId): void
    {
        $this->canonicalUrlCollectionId = $canonicalUrlCollectionId;
    }

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
     * @return bool|null
     */
    public function getIgnoreDiscounts(): ?bool
    {
        return $this->ignoreDiscounts;
    }

    /**
     * @param bool|null $ignoreDiscounts
     */
    public function setIgnoreDiscounts(?bool $ignoreDiscounts): void
    {
        $this->ignoreDiscounts = $ignoreDiscounts;
    }

    /**
     * @return bool|null
     */
    public function getisHidden(): ?bool
    {
        return $this->isHidden;
    }

    /**
     * @param bool|null $isHidden
     */
    public function setIsHidden(?bool $isHidden): void
    {
        $this->isHidden = $isHidden;
    }

    /**
     * @return bool|null
     */
    public function getSortWeight(): ?bool
    {
        return $this->sortWeight;
    }

    /**
     * @param bool|null $sortWeight
     */
    public function setSortWeight(?bool $sortWeight): void
    {
        $this->sortWeight = $sortWeight;
    }

    /**
     * @return null|string
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param null|string $unit
     */
    public function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return null|string
     */
    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    /**
     * @param null|string $dimensions
     */
    public function setDimensions(?string $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return int|null
     */
    public function getVat(): ?int
    {
        return $this->vat;
    }

    /**
     * @param int $vat
     */
    public function setVat(int $vat): void
    {
        $this->vat = $vat;
    }

    /**
     * @return null|string
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param null|string $shortDescription
     */
    public function setShortDescription(?string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return null|string
     */
    public function getHtmlTitle(): ?string
    {
        return $this->htmlTitle;
    }

    /**
     * @param null|string $htmlTitle
     */
    public function setHtmlTitle(?string $htmlTitle): void
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @return null|string
     */
    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    /**
     * @param null|string $metaKeywords
     */
    public function setMetaKeywords(?string $metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * @return null|string
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param null|string $metaDescription
     */
    public function setMetaDescription(?string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return null|string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * @param null|string $currencyCode
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return array|null
     */
    public function getCollectionsIds(): ?array
    {
        return $this->collectionsIds;
    }

    /**
     * @param array|null $collectionsIds
     */
    public function setCollectionsIds(?array $collectionsIds): void
    {
        $this->collectionsIds = $collectionsIds;
    }

    /**
     * @return array|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }

    /**
     * @param array|null $images
     */
    public function setImages(?array $images): void
    {
        $this->images = $images;
    }

    /**
     * @return array|null
     */
    public function getOptionNames(): ?array
    {
        return $this->optionNames;
    }

    /**
     * @param array|null $optionNames
     */
    public function setOptionNames(?array $optionNames): void
    {
        $this->optionNames = $optionNames;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * @param array|null $properties
     */
    public function setProperties(?array $properties): void
    {
        $this->properties = $properties;
    }

    /**
     * @return array|null
     */
    public function getCharacteristics(): ?array
    {
        return $this->characteristics;
    }

    /**
     * @param array|null $characteristics
     */
    public function setCharacteristics(?array $characteristics): void
    {
        $this->characteristics = $characteristics;
    }

    /**
     * @return array|null
     */
    public function getProductFieldValues(): ?array
    {
        return $this->productFieldValues;
    }

    /**
     * @param array|null $productFieldValues
     */
    public function setProductFieldValues(?array $productFieldValues): void
    {
        $this->productFieldValues = $productFieldValues;
    }

    /**
     * @return array|null
     */
    public function getVariants(): ?array
    {
        return $this->variants;
    }

    /**
     * @param array|null $variants
     */
    public function setVariants(?array $variants): void
    {
        $this->variants = $variants;
    }

    /**
     * @return array|null
     */
    public function getProductBundleComponents(): ?array
    {
        return $this->productBundleComponents;
    }

    /**
     * @param array|null $productBundleComponents
     */
    public function setProductBundleComponents(?array $productBundleComponents): void
    {
        $this->productBundleComponents = $productBundleComponents;
    }
}
