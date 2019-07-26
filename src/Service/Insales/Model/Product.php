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
     * @var string $createdAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("created_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $createdAt;

    /**
     * @var string $updatedAt
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("updated_at")
     *
     * @FakeMockField(faker="dateTime")
     */
    public $updatedAt;

    /**
     * @var bool $archived
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("archived")
     *
     * @FakeMockField()
     */
    public $archived;

    /**
     * @var bool $available
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
     * @var bool $ignoreDiscounts
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("ignore_discounts")
     *
     * @FakeMockField()
     */
    public $ignoreDiscounts;

    /**
     * @var bool $isHidden
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_hidden")
     *
     * @FakeMockField()
     */
    public $isHidden;

    /**
     * @var bool $sortWeight
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("sort_weight")
     *
     * @FakeMockField()
     */
    public $sortWeight;

    /**
     * @var string $unit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("unit")
     *
     * @FakeMockField()
     */
    public $unit;

    /**
     * @var string $dimensions
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
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * @var string $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     *
     * @FakeMockField()
     */
    public $description;

    /**
     * @var string $shortDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("short_description")
     *
     * @FakeMockField()
     */
    public $shortDescription;

    /**
     * @var string $permalink
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("permalink")
     *
     * @FakeMockField()
     */
    public $permalink;

    /**
     * @var string $htmlTitle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("html_title")
     *
     * @FakeMockField()
     */
    public $htmlTitle;

    /**
     * @var string $metaKeywords
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("meta_keywords")
     *
     * @FakeMockField()
     */
    public $metaKeywords;

    /**
     * @var string $metaDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("meta_description")
     *
     * @FakeMockField()
     */
    public $metaDescription;

    /**
     * @var string $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     *
     * @FakeMockField()
     */
    public $currencyCode;

    /**
     * @var array $collectionsIds
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("collections_ids")
     */
    public $collectionsIds = [];

    /**
     * @var array $images
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("images")
     */
    public $images = [];

    /**
     * @var array $optionNames
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\OptionName>")
     * @JMS\SerializedName("option_names")
     */
    public $optionNames = [];

    /**
     * @var array $properties
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Property>")
     * @JMS\SerializedName("properties")
     */
    public $properties = [];

    /**
     * @var array $characteristics
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Characteristic>")
     * @JMS\SerializedName("characteristics")
     */
    public $characteristics = [];

    /**
     * @var array $productFieldValues
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\ProductFieldValue>")
     * @JMS\SerializedName("product_field_values")
     */
    public $productFieldValues = [];

    /**
     * @var array $variants
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\Variant>")
     * @JMS\SerializedName("variants")
     */
    public $variants = [];

    /**
     * @var array $productBundleComponents
     *
     * @JMS\Type("array<SaaS\Service\Insales\Model\ProductBundleComponent>")
     * @JMS\SerializedName("product_bundle_components")
     */
    public $productBundleComponents = [];
}
