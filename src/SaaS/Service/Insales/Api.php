<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Service\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Service\Insales;

use SaaS\Http\Response;

/**
 * InSales API Client
 *
 * @category ApiClient
 * @package  SaaS\Service\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class Api
{

    /**
     * Constructor
     *
     * @param string $apiKey   api key value
     * @param string $password password value
     * @param string $domain   InSales internal domain
     */
    public function __construct($apiKey, $password, $domain)
    {
        $this->client = new Request(
            array(
                'apiKey' => $apiKey,
                'password' => $password,
                'domain' => $domain
            )
        );
    }

    /**
     * Get catalog categories list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-get-categories-json
     *
     * @return  Response
     */
    public function categoriesList()
    {
        $url = '/admin/categories.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get catalog category info
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-get-category-json
     * @param   string $categoryId category identificator
     *
     * @return  Response
     */
    public function categoryGet($categoryId)
    {
        if (empty($categoryId)) {
            throw new \InvalidArgumentException("Category id must be set");
        }
        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create catalog category
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-create-category-json
     * @param   array $category category data
     *
     * @return  Response
     */
    public function categoryCreate($category)
    {
        if (empty($category)) {
            throw new \InvalidArgumentException("Category must be set");
        }

        $url = '/admin/categories.json';
        $parameters = array('category' => $category);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update catalog category
     *
     * @link http://api.insales.ru/?doc_format=JSON#category-update-category-json
     * @param array $category category data
     *
     * @return Response
     */
    public function categoryUpdate($category)
    {
        if (empty($category['id'])) {
            throw new \InvalidArgumentException("Category id must be set");
        }

        $url = sprintf('/admin/categories/%s.json', $category['id']);
        $parameters = array('category' => $category);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete catalog category
     *
     * @link http://api.insales.ru/?doc_format=JSON#category-destroy-category-json
     * @param string $categoryId category id
     *
     * @return Response
     */
    public function categoryDelete($categoryId)
    {
        if (empty($categoryId)) {
            throw new \InvalidArgumentException("Category id must be set");
        }

        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get count products
     *
     * @link http://api.insales.ru/?doc_format=JSON#product-get-products-count-json
     *
     * @return Response
     */
    public function productsCount()
    {
        $url = '/admin/products/count.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get catalog products list
     *
     * @link http://api.insales.ru/?doc_format=JSON#product-get-products-json
     * @param int       $categoryId     category id on the store  //ID категории товара на складе
     * @param int       $collectionId   category id on the site //ID категории товара на сайте
     * @param int       $page           number page
     * @param int       $perPage        quantity of objects per page
     * @param string    $updatedSince   set datetime to get only data updated after it
     * @param int       $fromId         set id to get only data starting from it
     * @param boolean   $deleted        get deleted products //получить удаленные товары
     *
     * @return Response
     */
    public function productsList($categoryId = null, $collectionId = null, $page = null, $perPage = null, $updatedSince = null, $fromId = null, $deleted = null)
    {
        $url = '/admin/products.json';

        $parameters = array(
            'category_id' => $categoryId,
            'collection_id' => $collectionId,
            'page' => $page,
            'pre_page' => $perPage <= 250 ? $perPage : 250,
            'updated_since' => $updatedSince,
            'from_id' => $fromId,
            'deleted' => $deleted == true ? $deleted : null
        );

        $parameters = array_filter($parameters);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get catalog product info
     *
     * @link http://api.insales.ru/?doc_format=JSON#product-get-product-json
     * @param string $productId product id
     *
     * @return Response
     */
    public function productGet($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create product
     *
     * @link http://api.insales.ru/?doc_format=JSON#product-get-products-count-json
     * @param array $product product data
     *
     * @return Response
     */
    public function productCreate($product)
    {
        if (empty($product['category_id'])) {
            throw new \InvalidArgumentException("Categoty id must be set");
        }
        if (empty($product['title'])) {
            throw new \InvalidArgumentException("Title product must be set");
        }
        if (empty($product['variants_attributes'])) {
            throw new \InvalidArgumentException("Variants attribures is empty");
        }
        $url = '/admin/products.json';
        $parameters = array('product' => $product);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }
    
    /**
     * Update product by id
     *
     * @link http://api.insales.ru/?doc_format=JSON#product-update-product-json
     * @param array $product product data
     *
     * @return Response
     */
    public function productUpdate($product)
    {
        if (empty($product['id'])) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s.json', $product['id']);
        $parameters = array('product' => $product);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete product by id
     *
     * @param int $productId product id
     * 
     * @return Response
     */
    public function productDelete($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list picture for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#image-get-images-json
     * @param int $productId product id
     *
     * @return Response
     */
    public function picturesList($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/images.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get picture for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#image-get-image-json
     * @param int       $productId product id
     * @param int|null  $pictureId picture id
     *
     * @return Response
     */
    public function pictureGet($productId, $pictureId = null)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/images%s.json', $productId, !is_null($pictureId) ? '/' . $pictureId : '');

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create picture for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#image-create-image-fpom-src-json
     * @link http://api.insales.ru/?doc_format=JSON#image-create-image-from-attachment-json
     * @param int   $productId  product id
     * @param array $picture    picture data
     *
     * @return Response
     */
    public function pictureCreate($productId, $picture)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($picture['src']) && empty($picture['attachment'])) {
            throw new \InvalidArgumentException("Required fields must be set (attachment, filename or src)");
        }
        if (isset($picture['attachment']) && empty($picture['filename'])) {
            throw new \InvalidArgumentException("Filename must be set");
        }

        $url = sprintf('/admin/products/%s/images.json', $productId);
        $parameters = array('image' => $picture);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update picture for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#image-update-image-json
     * @param int   $productId  product id
     * @param int   $pictureId  picture id
     * @param array $picture    picture data
     *
     * @return Response
     */
    public function pictureUpdate($productId, $pictureId, $picture)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($pictureId)) {
            throw new \InvalidArgumentException("Picture id must be set");
        }

        $url = sprintf('/admin/products/%s/images/%s.json', $productId, $pictureId);

        $parameters = array('image' => $picture);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete picture for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#image-destroy-image-json
     * @param int $productId product id
     * @param int $pictureId picture id
     *
     * @return Response
     */
    public function pictureDelete($productId, $pictureId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($pictureId)) {
            throw new \InvalidArgumentException("Picture id must be set");
        }

        $url = sprintf('/admin/products/%s/images/%s.json', $productId, $pictureId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);

    }

    /**
     * Get list variants product
     *
     * @link http://api.insales.ru/?doc_format=JSON#variant-get-variants-json
     * @param int $productId product id
     *
     * @return Response
     */
    public function variantsList($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/variants.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get variant by id product
     *
     * @link http://api.insales.ru/?doc_format=JSON#variant-get-variant-json
     * @param int $productId product id
     * @param int $variantId variant id
     *
     * @return Response
     */
    public function variantGet($productId, $variantId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($variantId)) {
            throw new \InvalidArgumentException("Variant id must be set");
        }

        $url = sprintf('/admin/products/%s/variants%s.json', $productId, !is_null($variantId) ? '/' . $variantId : '');

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create variant for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#variant-create-variant-json
     * @param int   $productId  product id
     * @param array $variant    variant data
     *
     * @return Response
     */
    public function variantCreate($productId, $variant)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($variant['price']) || !is_int($variant['price'])) {
            throw new \InvalidArgumentException("Variant price must be set or be type integer");
        }
        if (empty($variant['quantity']) || !is_int($variant['quantity'])) {
            throw new \InvalidArgumentException("Variant quantity must be set or be type integer");
        }

        $url = sprintf('/admin/products/%s/variants.json', $productId);
        $parameters = array('variant' => $variant);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update variant for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#variant-update-variant-json
     * @param int   $productId  product id
     * @param array $variant    variant data
     *
     * @return Response
     */
    public function variantUpdate($productId, $variant)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($variant['id'])) {
            throw new \InvalidArgumentException("Variant id must be set");
        }
        if (isset($variant['price']) && !is_int($variant['price'])) {
            throw new \InvalidArgumentException("Variant price be type integer");
        }
        if (isset($variant['quantity']) && !is_int($variant['quantity'])) {
            throw new \InvalidArgumentException("Variant quantity be type integer");
        }

        $url = sprintf('/admin/products/%s/variants/%s.json', $productId, $variant['id']);
        $parameters = array('variant' => $variant);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Update group variants
     *
     * @param array $variants variants data
     *
     * @return Response
     */
    public function variantGroupUpdate($variants)
    {
        if (count($variants) > 100) {
            throw new \InvalidArgumentException("Count variants must be less than 100");
        }
        $url = '/admin/products/variants_group_update.json';
        $parameters = array('variants' => $variants);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete variant for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#variant-destroy-variant-json
     * @param int $productId product id
     * @param int $variantId variant id
     *
     * @return Response
     */
    public function variantDelete($productId, $variantId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($variantId)) {
            throw new \InvalidArgumentException("Variant id must be set");
        }

        $url = sprintf('/admin/products/%s/variants/%s.json', $productId, $variantId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list options
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionname-get-option-names-json
     *
     * @return Response
     */
    public function optionsList()
    {
        $url = '/admin/option_names.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get option by id
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionname-get-option-name-json
     * @param int $optionId option id
     *
     * @return Response
     */
    public function optionGet($optionId)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s.json', $optionId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create option
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionname-create-option-name-json
     * @param array $option option dara
     *
     * @return Response
     */
    public function optionCreate($option)
    {
        if (empty($option['title'])) {
            throw new \InvalidArgumentException("Option title must be set");
        }

        $url = '/admin/option_names.json';
        $parameters = $option;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update option by id
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionname-update-option-name-json
     * @param int   $optionId   option id
     * @param array $option     option data
     *
     * @return Response
     */
    public function optionUpdate($optionId, $option)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s.json', $optionId);
        $parameters = $option;

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete option by id
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionname-destroy-option-name-json
     * @param int $optionId option id
     *
     * @return Response
     */
    public function optionDelete($optionId)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s.json', $optionId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list option values
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionvalue-get-option-values-for-all-options-json
     *
     * @return Response
     */
    public function optionValuesList()
    {
        $url = '/admin/option_values.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get option values by option id
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionvalue-get-option-values-for-specific-option-json
     * @param int       $optionId       option id
     * @param null|int  $optionValueId  option value id
     *
     * @return Response
     */
    public function optionValuesGet($optionId, $optionValueId = null)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }

        $url = sprintf(
            '/admin/option_names/%s/option_values%s.json',
            $optionId,
            !is_null($optionValueId) ? '/' . $optionValueId : ''
        );

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create option value
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionvalue-create-option-value-json
     * @param int   $optionId       option id
     * @param array $optionValue    option value
     *
     * @return Response
     */
    public function optionValueCreate($optionId, $optionValue)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s/option_values.json' , $optionId);
        $parameters = $optionValue;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update option value
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionvalue-update-option-value-json
     * @param int   $optionId       option id
     * @param int   $optionValueId  option value id
     * @param array $optionValue    option value data
     *
     * @return Response
     */
    public function optionValueUpdate($optionId, $optionValueId, $optionValue)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }
        if (empty($optionValueId)) {
            throw new \InvalidArgumentException("Value option id must be set");
        }

        $url = sprintf('/admin/option_names/%s/option_values/%s.json' , $optionId, $optionValueId);
        $parameters = $optionValue;

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete option value
     *
     * @link http://api.insales.ru/?doc_format=JSON#optionvalue-destroy-option-value-json
     * @param int $optionId         option id
     * @param int $optionValueId    option value id
     *
     * @return Response
     */
    public function optionValueDelete($optionId, $optionValueId)
    {
        if (empty($optionId)) {
            throw new \InvalidArgumentException("Option id must be set");
        }
        if (empty($optionValueId)) {
            throw new \InvalidArgumentException("Value option id must be set");
        }

        $url = sprintf('/admin/option_names/%s/option_values/%s.json', $optionId, $optionValueId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list product fields
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfield-get-product-fields-json
     *
     * @return Response
     */
    public function productFieldsList()
    {
        $url = '/admin/product_fields.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get product field
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfield-get-product-field-json
     * @param int $fieldId field id
     *
     * @return Response
     */
    public function productFieldGet($fieldId)
    {
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/product_fields/%s.json', $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create product field
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfield-create-product-field-json
     * @param array $field field data
     *
     * @return Response
     */
    public function productFieldCreate($field)
    {
        if (empty($field['title'])) {
            throw new \InvalidArgumentException("Field title must be set");
        }
        if (empty($field['handle'])) {
            throw new \InvalidArgumentException("Field handle must be set");
        }
        if (empty($field['type'])) {
            throw new \InvalidArgumentException("Field type must be set");
        }

        $url = '/admin/product_fields.json';
        $parameters = $field;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update product field
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfield-update-product-field-json
     * @param int   $fieldId    field id
     * @param array $field      field data
     *
     * @return Response
     */
    public function productFieldUpdate($fieldId, $field)
    {
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/product_fields/%s.json', $fieldId);
        $parameters = array('product-field' => $field);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);

    }

    /**
     * Delete product field
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfield-destroy-product-field-json
     * @param int $fieldId field id
     *
     * @return Response
     */
    public function productFieldDelete($fieldId)
    {
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/product_fields/%s.json', $fieldId);
        
        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list field values by product id
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfieldvalue-get-product-field-values-json
     * @param int $productId product id
     *
     * @return Response
     */
    public function productFieldValuesList($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get field values by product id
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfieldvalue-get-product-field-value-json
     * @param int   $productId    product id
     * @param int   $fieldId      field id
     *
     * @return Response
     */
    public function productFieldValuesGet($productId, $fieldId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values/%s.json', $productId, $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create field values for product
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfieldvalue-create-product-field-value-json
     * @param int     $productId  product id
     * @param array   $value      value data
     *
     * @return Response
     */
    public function productFieldValuesCreate($productId, $value)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values.json', $productId);
        $parameters = $value;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update field value by product id
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfieldvalue-update-product-field-value-json
     * @param int   $productId  product id
     * @param int   $fieldId    field id
     * @param array $value      value data
     *
     * @return Response
     */
    public function productFieldValuesUpdate($productId, $fieldId, $value)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values/%s.json', $productId, $fieldId);
        $parameters = array('product-field-value' => $value);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete field value by product id
     *
     * @link http://api.insales.ru/?doc_format=JSON#productfieldvalue-destroy-product-field-value-json
     * @param int $productId    product id
     * @param int $fieldId      field id
     *
     * @return Response
     */
    public function productFieldValuesDelete($productId, $fieldId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values/%s.json', $productId, $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list supplementary products
     *
     * @link http://api.insales.ru/?doc_format=JSON#supplementary-get-supplementaries-json
     * @param int $productId product id
     *
     * @return Response
     */
    public function supplementariesProductsList($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/supplementaries.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create supplementary product
     *
     * @link http://api.insales.ru/?doc_format=JSON#supplementary-create-supplementary-json
     * @param int   $productId          product id
     * @param array $supplementaryIds   supplementary products ids
     *
     * @return Response
     */
    public function supplementaryProductsCreate($productId, $supplementaryIds)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/supplementaries.json', $productId);
        $parameters = array('supplementary_ids' => $supplementaryIds);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete supplementary product
     *
     * @link http://api.insales.ru/?doc_format=JSON#supplementary-destroy-supplementary-json
     * @param int $productId        product id
     * @param int $supplementaryId  supplementary product id
     *
     * @return Response
     */
    public function supplementaryProductsDelete($productId, $supplementaryId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($supplementaryId)) {
            throw new \InvalidArgumentException("Supplementary product id must be set");
        }

        $url = sprintf('/admin/products/%s/supplementaries/%s.json', $productId, $supplementaryId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list similars products
     *
     * @link http://api.insales.ru/?doc_format=JSON#similar-get-similars-json
     * @param int $productId product id
     *
     * @return Response
     */
    public function similarsProductsList($productId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/similars.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create similar product
     *
     * @link http://api.insales.ru/?doc_format=JSON#similar-create-similar-json
     * @param int   $productId  product id
     * @param array $similarIds similar ids
     *
     * @return Response
     */
    public function similarProductsCreate($productId, $similarIds)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/similars.json', $productId);

        $parameters = array('similar_ids' => $similarIds);
        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete similar product Удаление аналогичного товара
     *
     * @link http://api.insales.ru/?doc_format=JSON#similar-destroy-similar-json
     * @param int $productId        product id
     * @param int $similarProductId similar product id
     *
     * @return Response
     */
    public function similarProductsDelete($productId, $similarProductId)
    {
        if (empty($productId)) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($similarProductId)) {
            throw new \InvalidArgumentException("Related productId id must be set");
        }

        $url = sprintf('/admin/products/%s/similars/%s.json', $productId, $similarProductId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list collections
     *
     * @link http://api.insales.ru/?doc_format=JSON#collection-get-collections-json
     * @param null      $perPage        quantity of objects per page
     * @param \DateTime $updatedSince   set datetime to get only data updated after it
     * @param null      $fromId         set id to get only data starting from it
     *
     * @return Response
     */
    public function collectionsList($perPage = null, \DateTime $updatedSince = null, $fromId = null)
    {
        $url = '/admin/collections.json';

        $parameters = array(
            'updated_since' => isset($updatedSince) ? $updatedSince->format('c') : null,
            'from_id' => $fromId,
            'per_page' => $perPage <= 250 ? $perPage : 250,
        );

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collection-get-collection-json
     * @param int $collectionId collection id
     *
     * @return Response
     */
    public function collectionGet($collectionId)
    {
        if (empty($collectionId)) {
            throw new \InvalidArgumentException("Collection id must be set");
        }

        $url = sprintf('/admin/collections/%s.json', $collectionId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collection-create-collection-json
     * @param array $collection collection data
     *
     * @return Response
     */
    public function collectionCreate($collection)
    {
        if (empty($collection['title'])) {
            throw new \InvalidArgumentException("Collection title must be set");
        }
        if (empty($collection['parent_id'])) {
            throw new \InvalidArgumentException("Collection parent id must be set");
        }
        if (empty($collection['position'])) {
            throw new \InvalidArgumentException("Collection position must be set");
        }
        $url = '/admin/collections.json';
        $parameters = array('collection' => $collection);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collection-update-collection-json
     * @param int   $collectionId   collection id
     * @param array $collection     collection data
     *
     * @return Response
     */
    public function collectionUpdate($collectionId, $collection)
    {
        if (empty($collectionId)) {
            throw new \InvalidArgumentException("Collection id must be set");
        }

        $possibleSort = array(1, 2, 3, 4, 5, 6, 7);

        if (isset($collection['sort-type']) && !in_array($collection['sort-type'], $possibleSort)) {
            throw new \InvalidArgumentException("Unavailable sorting. Possible sorting codes: 1, 2, 3, 4, 5, 6, 7");
        }

        $url = sprintf('/admin/collections/%s.json', $collectionId);
        $parameters = array('collection' => $collection);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collection-destroy-collection-json
     * @param int $collectionId collection id
     *
     * @return Response
     */
    public function collectionDelete($collectionId)
    {
        if (empty($collectionId)) {
            throw new \InvalidArgumentException("Collection id must be set");
        }

        $url = sprintf('/admin/collections/%s.json', $collectionId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list collects
     *
     * @link http://api.insales.ru/?doc_format=JSON#collect-get-collects-json
     *
     * @return Response
     */
    public function collectsList()
    {
        $url = '/admin/collects.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get collections by product or products by collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collect-get-collections-by-product-json
     * @link http://api.insales.ru/?doc_format=JSON#collect-get-products-by-collection-json
     * @param int $productId    product id
     * @param int $collectionId collection id
     *
     * @return Response
     */
    public function collectsGet($productId, $collectionId)
    {

        if (empty($productId) && empty($collectionId)) {
            throw new \InvalidArgumentException("Product id or collection id must be set");
        }

        $url = '/admin/collects.json';

        $parameters = array(
            'product_id' => $productId,
            'collection_id' => $collectionId
        );

        $parameters = array_filter($parameters);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Add product to collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collect-add-product-to-collection-json
     * @param array $collect collect data
     *
     * @return Response
     */
    public function collectCreate($collect)
    {
        if (empty($collect['product_id'])) {
            throw new \InvalidArgumentException("Product id must be set");
        }
        if (empty($collect['collection_id'])) {
            throw new \InvalidArgumentException("Collection id must be set");
        }

        $url = '/admin/collects.json';
        $parameters = array('collect' => $collect);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update position  or move product to another collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collect-update-position-json
     * @link http://api.insales.ru/?doc_format=JSON#collect-move-product-to-another-collection-json
     *
     * @param int   $collectId  collect id
     * @param array $collect    collect data
     *
     * @return Response
     */
    public function collectsUpdate($collectId, $collect)
    {
        if (empty($collectId)) {
            throw new \InvalidArgumentException("Collect id must be set");
        }
        if (empty($collect)) {
            throw new \InvalidArgumentException("Collect must be set");
        }

        $url = sprintf('/admin/collects/%s.json', $collectId);
        $parameters = array('collect' => $collect);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete product from collection
     *
     * @link http://api.insales.ru/?doc_format=JSON#collect-remove-product-from-collection-json
     * @param int $collectId collect id
     *
     * @return Response
     */
    public function collectDelete($collectId)
    {
        if (empty($collectId)) {
            throw new \InvalidArgumentException("Collect id must be set");
        }

        $url = sprintf('/admin/collects/%s.json', $collectId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list orders
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-get-orders-json
     * @param array $filter string  [status]                order status (open/closed)
     *                      string  [fulfillment_status]    fulfillment status
     *                      string  [financial_status]      status payment (paid/pending)
     *                      int     [delivery_variant]      delivery variant id
     * @param int               $page           number page
     * @param int               $perPage        quantity of objects per page
     * @param \DateTime|null    $updatedSince   set datetime to get only data updated after it
     * @param int               $fromId         set id to get only data starting from it
     * @param bool              $deleted        get deleted orders
     *
     * @return Response
     */
    public function ordersList($filter = null, $page = null, $perPage = null, \DateTime $updatedSince = null, $fromId = null, $deleted = null)
    {
        if (isset($filter['status']) && ($filter['status'] != 'open' || $filter['status'] != 'closed')) {
            throw new \InvalidArgumentException("Status must be set. open|closed");
        }

        $url = '/admin/orders.json';

        $parameters = array(
            'status' => isset($filter['status']) ? $filter['status'] : null,
            'fulfillment_status' => isset($filter['fulfillment_status']) ? $filter['fulfillment_status'] : null,
            'financial_status' => isset($filter['financial_status']) ? $filter['financial_status'] : null,
            'delivery_variant' => isset($filter['delivery_variant']) ? $filter['delivery_variant'] : null,
            'page' => $page,
            'pre_page' => $perPage <= 250 ? $perPage : 250,
            'updated_since' => isset($updatedSince) ? $updatedSince->format('c') : null,
            'from_id' => $fromId,
            'deleted' => $deleted == true ? $deleted : null
        );
        $parameters = array_filter($parameters);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get orders count
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-get-orders-count-json
     * @param array $filter string  [status]                order status (open/closed)
     *                      string  [fulfillment_status]    fulfillment status
     *                      string  [financial_status]      status payment (paid/pending)
     *                      int     [delivery_variant]      delivery variant id
     * @param int               $page           number page
     * @param int               $perPage        quantity of objects per page
     * @param \DateTime|null    $updatedSince   set datetime to get only data updated after it
     * @param int               $fromId         set id to get only data starting from it
     * @param bool              $deleted        get deleted orders
     *
     * @return Response
     */
    public function ordersCount($filter = array(), $page = null , $perPage = null, \DateTime $updatedSince = null, $fromId = null, $deleted = null)
    {
        $status = array('open', 'closed');
        if (isset($filter['status']) && !in_array($filter['status'], $status)) {
            throw new \InvalidArgumentException("Status must be set. open|closed");
        }

        $url = '/admin/orders/count.json';

        $parameters = array(
            'status' => isset($filter['status']) ? $filter['status'] : null,
            'fulfillment_status' => isset($filter['fulfillment_status']) ? $filter['fulfillment_status'] : null,
            'financial_status' => isset($filter['financial_status']) ? $filter['financial_status'] : null,
            'delivery_variant' => isset($filter['delivery_variant']) ? $filter['delivery_variant'] : null,
            'page' => $page,
            'pre_page' => $perPage <= 250 ? $perPage : 250,
            'updated_since' => isset($updatedSince) ? $updatedSince->format('c') : null,
            'from_id' => $fromId,
            'deleted' => $deleted == true ? $deleted : null
        );
        $parameters = array_filter($parameters);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);

    }

    /**
     * Get order by id
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-get-order-json
     * @param int $orderId order id
     *
     * @return Response
     */
    public function orderGet($orderId)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }

        $url = sprintf('/admin/orders/%s.json', $orderId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Update order
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-update-order-json
     * @param int   $orderId    order id
     * @param array $order      order data
     *
     * @return Response
     */
    public function orderUpdate($orderId, $order)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }

        $url = sprintf('/admin/orders/%s.json', $orderId);
        $parameters = array('order' => $order);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Create order line by product_id or by variant_id
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-product-id-json
     * @link http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-variant-id-json
     * @param int   $orderId    order id
     * @param array $orderLines order lines attributes
     *
     * @return Response
     */
    public function orderLineCreate($orderId, $orderLines)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }
        foreach ($orderLines as $orderLine) {
            if ((empty($orderLine['variant_id']) && empty($orderLine['product_id'])) || empty($orderLine['quantity'])) {
                throw new \InvalidArgumentException("Variant or product id and quantity must be set");
            }
        }
        $order = array('order_lines_attributes' => $orderLines);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Update order line
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-update-order-line-json
     * @param int   $orderId    order id
     * @param array $orderLines order lines attributes
     *
     * @return Response
     */
    public function orderLineUpdate($orderId, $orderLines)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }
        foreach ($orderLines as $orderLine) {
            if (empty($orderLine['id'])) {
                throw new \InvalidArgumentException("Order line id must be set");
            }
        }
        $order = array('order_lines_attributes' => $orderLines);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Remove order line
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-remove-order-line-json
     * @param int   $orderId    order id
     * @param array $orderLines order lines attributes
     * @return Response
     */
    public function orderLineDelete($orderId, $orderLines)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }
        foreach ($orderLines as $orderLine) {
            if (empty($orderLine['id'])) {
                throw new \InvalidArgumentException("Order line id must be set");
            }
        }
        $order = array('order_lines_attributes' => $orderLines);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Update shipping address
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-update-shipping-address-json
     * @param int       $orderId order id
     * @param string    $address address delivery
     *
     * @return Response
     */
    public function orderShippingAddressUpdate($orderId, $address)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }
        if (empty($address)) {
            throw new \InvalidArgumentException("Order address must be set");
        }

        $order = array('shipping_address_attributes' => $address);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Update custom status
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-update-custom-status-json
     * @param int       $orderId            order id
     * @param string    $customStatus       custom status
     * @param null      $fulfillmentStatus  fulfillment status
     *
     * @return Response
     */
    public function orderCustomStatusUpdate($orderId, $customStatus, $fulfillmentStatus = null)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }
        if (empty($customStatus)) {
            throw new \InvalidArgumentException("Custom status must be set");
        }

        $order = array(
            'custom_status_permalink' => $customStatus,
            'fulfillment_status' => $fulfillmentStatus
        );
        $order = array_filter($order);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Create order
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-create-order-json
     * @param array $order order data
     *
     * @return Response
     */
    public function orderCreate($order)
    {
        $requiredFields = array(
            'client' => array(
                'phone' => 'value'
            ),
            'shipping_address_attributes' => array(
                'address' => 'value'
            ),
            'delivery_variant_id' => 'value',
            'payment_gateway_id' => 'value'
        );
        $requiredFieldsLine = array(
            'quantity' => 'value',
            'product_id' => 'value',
            'variant_id' => 'value'
        );

        if (empty($order)) {
            throw new \InvalidArgumentException("Order must be set");
        }

        $res = array_diff_key($requiredFields, $order);
        foreach ($requiredFields as $key => $field) {
            if (is_array($field) && isset($order[$key])) {
                $diff = array_diff_key($field, $order[$key]);
                if (!empty($diff)) {
                    $res = array_merge($res, array($key => $diff));
                }
            }
        }
        foreach ($order['order_lines_attributes'] as $key => $line) {
            $diffLine = array_diff_key($requiredFieldsLine, $line);
            if (!isset($diffLine['product_id']) || !isset($diffLine['variant_id'])) {
                unset($diffLine['product_id']);
                unset($diffLine['variant_id']);
            }
            if (!empty($diffLine)) {
                $lines[$key] = $diffLine;
            }
        }
        if (!empty($lines)) {
            $res = array_merge($res, array('order_lines_attributes' => $lines));
        }

        if (!empty($res)) {
            throw new \InvalidArgumentException("Order values are not complete. Required parameters that are not in order: " . json_encode($res, true));
        }

        $url = '/admin/orders.json';

        $parameters = $order;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete order
     *
     * @link http://api.insales.ru/?doc_format=JSON#order-remove-order-line-json
     * @param int $orderId order id
     *
     * @return Response
     */
    public function orderDelete($orderId)
    {
        if (empty($orderId)) {
            throw new \InvalidArgumentException("Order id must be set");
        }

        $url = sprintf('/admin/orders/%s.json', $orderId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list client
     *
     * @link http://api.insales.ru/?doc_format=JSON#client-get-clients-json
     * @param int       $perPage        quantity of objects per page
     * @param \DateTime $updatedSince   set datetime to get only data updated after it
     * @param int       $fromId         set id to get only data starting from it
     *
     * @return Response
     */
    public function clientsList($perPage = null, \DateTime $updatedSince = null, $fromId = null)
    {
        $url = '/admin/clients.json';
        $parameters = array(
            'updated_since' => isset($updatedSince) ? $updatedSince->format('c') : null,
            'from_id' => $fromId,
            'per_page' => $perPage <= 250 ? $perPage : 250,
        );
        $parameters = array_filter($parameters);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get client
     *
     * @link http://api.insales.ru/?doc_format=JSON#client-get-client-json
     * @param int $clientId client id
     *
     * @return Response
     */
    public function clientGet($clientId)
    {
        if (empty($clientId)) {
            throw new \InvalidArgumentException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s.json', $clientId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create individual or juridical client
     *
     * @link http://api.insales.ru/?doc_format=JSON#client-create-individual-client-json
     * @link http://api.insales.ru/?doc_format=JSON#client-create-juridical-client-json
     * @param array $client client data
     *
     * @return Response
     */
    public function clientCreate($client)
    {
        if (empty($client['name'])) {
            throw new \InvalidArgumentException("Name client must be set");
        }
        if (isset($client['type']) && $client['type'] == 'Client::Juridical') {
            if (empty($client['inn'])) {
                throw new \InvalidArgumentException("INN client must be set");
            }
        } else {
            if (empty($client['surname']) || empty($client['middlename'])) {
                throw new \InvalidArgumentException("Name and surname and middlename client must be set");
            }
        }

        $url = '/admin/clients.json';
        $parameters = array('client' => $client);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete client
     *
     * @link http://api.insales.ru/?doc_format=JSON#client-destroy-client-json
     * @param int $clientId client id
     *
     * @return Response
     */
    public function clientDelete($clientId)
    {
        if (empty($clientId)) {
            throw new \InvalidArgumentException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s.json', $clientId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list discount codes
     *
     * @link http://api.insales.ru/?doc_format=JSON#discountcode-get-discount-codes-json
     *
     * @return Response
     */
    public function discountCodesList()
    {
        $url = '/admin/discount_codes.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get discount code
     *
     * @link http://api.insales.ru/?doc_format=JSON#discountcode-get-discount-code-json
     * @param int $discountId discount id
     *
     * @return Response
     */
    public function discountCodeGet($discountId)
    {
        if (empty($discountId)) {
            throw new \InvalidArgumentException("Discount code id must be set");
        }

        $url = sprintf('/admin/discount_codes/%s.json', $discountId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create discount code
     *
     * @link http://api.insales.ru/?doc_format=JSON#discountcode-create-discount-code-json
     * @param array $discount discount data
     *
     * @return Response
     */
    public function discountCodeCreate($discount)
    {
        if (empty($discount['code'])) {
            throw new \InvalidArgumentException("Discount code must be set");
        }
        $type = array(1, 2); // 1-percent, 2-money
        if (empty($discount['type_id']) || !in_array($discount['type_id'], $type)) {
            throw new \InvalidArgumentException("Discount type id must be set");
        }
        if (empty($discount['discount'])) {
            throw new \InvalidArgumentException("Discount must be set");
        }

        $url = '/admin/discount_codes.json';
        $parameters = array('discount_code' => $discount);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update discount code
     *
     * @link http://api.insales.ru/?doc_format=JSON#discountcode-update-discount-code-json
     * @param int   $discountId discount id
     * @param array $discount   discount data
     *
     * @return Response
     */
    public function discountCodeUpdate($discountId, $discount)
    {
        if (empty($discountId)) {
            throw new \InvalidArgumentException("Discount code id must be set");
        }

        $url = sprintf('/admin/discount_codes/%s.json', $discountId);
        $parameters = array('discount_code' => $discount);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete discount code
     *
     * @link http://api.insales.ru/?doc_format=JSON#discountcode-destroy-discount-code-json
     * @param int $discountId discount id
     *
     * @return Response
     */
    public function discountCodeDelete($discountId)
    {
        if (empty($discountId)) {
            throw new \InvalidArgumentException("Discount code id must be set");
        }

        $url = sprintf('/admin/discount_codes/%s.json', $discountId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list delivery variants
     *
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variants-json
     *
     * @return Response
     */
    public function deliveryVariantsList()
    {
        $url = '/admin/delivery_variants.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get delivery_variant
     *
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variant-json
     * @param int $deliveryId delivery id
     *
     * @return Response
     */
    public function deliveryVariantGet($deliveryId)
    {
        if (empty($deliveryId)) {
            throw new \InvalidArgumentException("Delivery variant id must be set");
        }

        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create delivery_variant
     *
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-external-json
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-fixed-json
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-locationdepend-json
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-pricedepend-json
     * @param array $delivery delivery data
     *
     * @return Response
     */
    public function deliveryVariantCreate($delivery)
    {
        if (empty($delivery['title'])) {
            throw new \InvalidArgumentException("Delivery variant title must be set");
        }
        if (empty($delivery['type'])) {
            throw new \InvalidArgumentException("Delivery variant type must be set");
        }
        if ($delivery['type'] == 'DeliveryVariant::Fixed' && empty($delivery['price'])) {
            throw new \InvalidArgumentException("Delivery price must be set");
        }
        if ($delivery['type'] == 'DeliveryVariant::LocationDepend' && empty($delivery['delivery_zones_attributes'])) {
            throw new \InvalidArgumentException("Delivery zones must be set");
        }

        $url = '/admin/delivery_variants.json';
        $parameters = array('delivery_variant' => $delivery);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update delivery variant
     *
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-update-delivery-variant-json
     * @param int   $deliveryId delivery id
     * @param array $delivery   delivery data
     *
     * @return Response
     */
    public function deliveryVariantUpdate($deliveryId, $delivery)
    {
        if (empty($deliveryId)) {
            throw new \InvalidArgumentException("Delivery variant id must be set");
        }

        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryId);
        $parameters = array('delivery_variant' => $delivery);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete delivery variant
     *
     * @link http://api.insales.ru/?doc_format=JSON#deliveryvariant-destroy-delivery-variant-json
     * @param int $deliveryId delivery id
     *
     * @return Response
     */
    public function deliveryVariantDelete($deliveryId)
    {
        if (empty($deliveryId)) {
            throw new \InvalidArgumentException("Delivery variant id must be set");
        }

        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list payment gateways
     *
     * @link http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateways-json
     *
     * @return Response
     */
    public function paymentGatewaysList()
    {
        $url = '/admin/payment_gateways.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get payment gateway
     *
     * @link http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateway-json
     * @param int $paymentId payment id
     *
     * @return Response
     */
    public function paymentGatewayGet($paymentId)
    {
        if (empty($paymentId)) {
            throw new \InvalidArgumentException("Payment gateway id must be set");
        }

        $url = sprintf('/admin/payment_gateways/%s.json', $paymentId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create Cod or Custom or External payment gateway
     *
     * @link http://api.insales.ru/?doc_format=JSON#paymentgateway-create-cod-or-custom-payment-gateway-json
     * @link http://api.insales.ru/?doc_format=JSON#paymentgateway-create-external-payment-gateway-json
     * @param array $payment payment data
     *
     * @return Response
     */
    public function paymentGatewayCreate($payment)
    {
        if (empty($payment['title'])) {
            throw new \InvalidArgumentException("Payment title must be set");
        }
        if (empty($payment['type'])) {
            throw new \InvalidArgumentException("Payment type must be set");
        }
        if ($payment['type'] == 'PaymentGateway::External' && (empty($payment['url']) || empty($payment['shop_id']))) {
            throw new \InvalidArgumentException("Url and shop_id in payment must be set");
        }

        $url = '/admin/payment_gateways.json';
        $parameters = array('payment_gateway' => $payment);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update payment gateway
     *
     * @link http://api.insales.ru/?doc_format=JSON#paymentgateway-update-payment-gateway-json
     * @param int   $paymentId  payment id
     * @param array $payment    payment data
     *
     * @return Response
     */
    public function paymentGatewayUpdate($paymentId, $payment)
    {
        if (empty($paymentId)) {
            throw new \InvalidArgumentException("Payment gateway id must be set");
        }

        $url = sprintf('/admin/payment_gateways/%s.json', $paymentId);
        $parameters = $payment;

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete payment gateway
     *
     * @link http://api.insales.ru/?doc_format=JSON#paymentgateway-destroy-payment-gateway-json
     * @param int $paymentId payment id
     *
     * @return Response
     */
    public function paymentGatewayDelete($paymentId)
    {
        if (empty($paymentId)) {
            throw new \InvalidArgumentException("Payment gateway id must be set");
        }
        $url = sprintf('/admin/payment_gateways/%s.json', $paymentId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list domains
     *
     * @link http://api.insales.ru/?doc_format=JSON#domain-get-domains-json
     *
     * @return Response
     */
    public function domainsList()
    {
        $url = '/admin/domains.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get domain
     *
     * @link http://api.insales.ru/?doc_format=JSON#domain-get-domain-json
     * @param int $domainId domain id
     *
     * @return Response
     */
    public function domainGet($domainId)
    {
        if (empty($domainId)) {
            throw new \InvalidArgumentException("Domain id must be set");
        }

        $url = sprintf('/admin/domains/%s.json', $domainId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create domain
     *
     * @link http://api.insales.ru/?doc_format=JSON#domain-create-domain-json
     * @param array $domain domain data
     *
     * @return Response
     */
    public function domainCreate($domain)
    {
        if (empty($domain['domain'])) {
            throw new \InvalidArgumentException("Domain must be set");
        }

        $url = '/admin/domains.json';
        $parameters = array('domain' => $domain);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update domain
     *
     * @link http://api.insales.ru/?doc_format=JSON#domain-update-domain-json
     * @param int   $domainId   domain id
     * @param array $domain     domain data
     *
     * @return Response
     */
    public function domainUpdate($domainId, $domain)
    {
        if (empty($domainId)) {
            throw new \InvalidArgumentException("Domain id must be set");
        }

        $url = sprintf('/admin/domains/%s.json', $domainId);
        $parameters = array('domain' => $domain);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete domain
     *
     * @link http://api.insales.ru/?doc_format=JSON#domain-destroy-domain-json
     * @param int $domainId domain id
     *
     * @return Response
     */
    public function domainDelete($domainId)
    {
        if (empty($domainId)) {
            throw new \InvalidArgumentException("Domain id must be set");
        }

        $url = sprintf('/admin/domains/%s.json', $domainId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list webhooks
     *
     * @link http://api.insales.ru/?doc_format=JSON#webhook-get-webhooks-json
     *
     * @return Response
     */
    public function webhooksList()
    {
        $url = '/admin/webhooks.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get webhook
     *
     * @link http://api.insales.ru/?doc_format=JSON#webhook-get-webhook-json
     * @param int $webhookId webhook id
     *
     * @return Response
     */
    public function webhookGet($webhookId)
    {
        if (empty($webhookId)) {
            throw new \InvalidArgumentException("Webhook id must be set");
        }

        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create webhook
     *
     * @link http://api.insales.ru/?doc_format=JSON#webhook-create-webhook-json
     * @param array $webhook webhook data
     *
     * @return Response
     */
    public function webhookCreate($webhook)
    {
        if (empty($webhook)) {
            throw new \InvalidArgumentException("Webhook must be set");
        }
        if (empty($webhook['address'])) {
            throw new \InvalidArgumentException("Webhook address must be set");
        }
        if (empty($webhook['topic'])) {
            throw new \InvalidArgumentException("Webhook topic must be set");
        }

        $url = '/admin/webhooks.json';
        $parameters = array('webhook' => $webhook);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update webhook
     *
     * @link http://api.insales.ru/?doc_format=JSON#webhook-update-webhook-json
     * @param int   $webhookId  webhook id
     * @param array $webhook    webhook data
     *
     * @return Response
     */
    public function webhookUpdate($webhookId, $webhook)
    {
        if (empty($webhookId)) {
            throw new \InvalidArgumentException("Webhook id must be set");
        }
        if (empty($webhook)) {
            throw new \InvalidArgumentException("Webhook must be set");
        }

        $url = sprintf('/admin/webhooks/%s.json', $webhookId);
        $parameters = array('webhook' => $webhook);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete webhook
     *
     * @link http://api.insales.ru/?doc_format=JSON#webhook-destroy-webhook-json
     * @param int $webhookId webhook id
     *
     * @return Response
     */
    public function webhookDelete($webhookId)
    {
        if (empty($webhookId)) {
            throw new \InvalidArgumentException("Webhook id must be set");
        }

        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list custom statuses
     *
     * @link http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-statuses-json
     *
     * @return Response
     */
    public function customStatusesList()
    {
        $url = '/admin/custom_statuses.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get custom status
     *
     * @link http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-status-json
     * @param string $statusPermalink status permalink
     *
     * @return Response
     */
    public function customStatusGet($statusPermalink)
    {
        if (empty($statusPermalink)) {
            throw new \InvalidArgumentException("Permalink status must be set");
        }

        $url = sprintf('/admin/custom_statuses/%s.json', $statusPermalink);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create custom status
     *
     * @link http://api.insales.ru/?doc_format=JSON#customstatus-create-custom-status-json
     * @param array $status status data
     *
     * @return Response
     */
    public function customStatusCreate($status)
    {
        if (empty($status)) {
            throw new \InvalidArgumentException("Status must be set");
        }
        if (empty($status['title'])) {
            throw new \InvalidArgumentException("Title status must be set");
        }
        if (empty($status['system_status'])) {
            throw new \InvalidArgumentException("System status must be set");
        }

        $url = '/admin/custom_statuses.json';
        $parameters = array('custom_status' => $status);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update custom status
     *
     * @link http://api.insales.ru/?doc_format=JSON#customstatus-update-custom-status-json
     * @param string    $statusPermalink    status permalink
     * @param array     $status             status data
     *
     * @return Response
     */
    public function customStatusUpdate($statusPermalink, $status)
    {
        if (empty($statusPermalink)) {
            throw new \InvalidArgumentException("Permalink status must be set");
        }

        $url = sprintf('/admin/custom_statuses/%s.json', $statusPermalink);

        $parameters = array('custom_status' => $status);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete custom status
     *
     * @link http://api.insales.ru/?doc_format=JSON#customstatus-destroy-custom-status-json
     * @param string $statusPermalink status permalink
     *
     * @return Response
     */
    public function customStatusDelete($statusPermalink)
    {
        if (empty($statusPermalink)) {
            throw new \InvalidArgumentException("Permalink status must be set");
        }

        $url = sprintf('/admin/custom_statuses/%s.json', $statusPermalink);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list fields
     *
     * @link http://api.insales.ru/?doc_format=JSON#field-get-fields-json
     *
     * @return Response
     */
    public function fieldsList()
    {
        $url = '/admin/fields.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get field
     *
     * @link http://api.insales.ru/?doc_format=JSON#field-get-field-json
     * @param int $fieldId field id
     *
     * @return Response
     */
    public function fieldGet($fieldId)
    {
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/fields/%s.json', $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }


    /**
     * Create field
     *
     * @link http://api.insales.ru/?doc_format=JSON#field-create-field-json
     * @param array $field field data
     *
     * @return Response
     */
    public function fieldCreate($field)
    {
        if (empty($field)) {
            throw new \InvalidArgumentException("Field must be set");
        }
        if (empty($field['type'])) {
            throw new \InvalidArgumentException("Field type must be set");
        }
        if (empty($field['office_title'])) {
            throw new \InvalidArgumentException("Field office title must be set");
        }
        if (empty($field['destiny'])) {
            throw new \InvalidArgumentException("Field destiny must be set");
        }

        $url = '/admin/fields.json';
        $parameters = array('field' => $field);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update field
     *
     * @link http://api.insales.ru/?doc_format=JSON#field-update-field-json
     * @param int   $fieldId    field id
     * @param array $field      field data
     *
     * @return Response
     */
    public function fieldUpdate($fieldId, $field)
    {
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }
        if (empty($field)) {
            throw new \InvalidArgumentException("Field must be set");
        }

        $url = sprintf('/admin/fields/%s.json', $fieldId);
        $parameters = array('field' => $field);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete field
     *
     * @link http://api.insales.ru/?doc_format=JSON#field-destroy-field-json
     * @param int $fieldId field id
     *
     * @return Response
     */
    public function fieldDelete($fieldId)
    {
        if (empty($fieldId)) {
            throw new \InvalidArgumentException("Field id must be set");
        }

        $url = sprintf('/admin/fields/%s.json', $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list properties
     *
     * @link http://api.insales.ru/?doc_format=JSON#property-get-properties-json
     *
     * @return Response
     */
    public function propertiesList()
    {
        $url = '/admin/properties.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get property
     *
     * @link http://api.insales.ru/?doc_format=JSON#property-get-property-json
     * @param int $propertyId property id
     *
     * @return Response
     */
    public function propertyGet($propertyId)
    {
        if (empty($propertyId)) {
            throw new \InvalidArgumentException("Property id must be set");
        }

        $url = sprintf('/admin/properties/%s.json', $propertyId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create property
     *
     * @link http://api.insales.ru/?doc_format=JSON#property-create-property-json
     * @param array $property property data
     *
     * @return Response
     */
    public function propertyCreate($property)
    {
        if (empty($property)) {
            throw new \InvalidArgumentException("Property must be set");
        }
        if (empty($property['title'])) {
            throw new \InvalidArgumentException("Property title must be set");
        }

        $url = '/admin/properties.json';
        $parameters = array('property' => $property);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update property
     *
     * @link http://api.insales.ru/?doc_format=JSON#property-update-property-json
     * @param int   $propertyId property id
     * @param array $property   property data
     *
     * @return Response
     */
    public function propertyUpdate($propertyId, $property)
    {
        if (empty($propertyId)) {
            throw new \InvalidArgumentException("Property id must be set");
        }

        $url = sprintf('/admin/properties/%s.json', $propertyId);
        $parameters = array('property' => $property);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete property
     *
     * @link http://api.insales.ru/?doc_format=JSON#property-destroy-property-json
     * @param int $propertyId property id
     *
     * @return Response
     */
    public function propertyDelete($propertyId)
    {
        if (empty($propertyId)) {
            throw new \InvalidArgumentException("Property id must be set");
        }

        $url = sprintf('/admin/properties/%s.json', $propertyId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list client groups
     *
     * @link http://api.insales.ru/?doc_format=JSON#clientgroup-get-client-groups-json
     *
     * @return Response
     */
    public function clientGroupsList()
    {
        $url = '/admin/client_groups.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get client group
     *
     * @link http://api.insales.ru/?doc_format=JSON#clientgroup-get-client-group-json
     * @param int $clientGroupId client group id
     *
     * @return Response
     */
    public function clientGroupGet($clientGroupId)
    {
        if (empty($clientGroupId)) {
            throw new \InvalidArgumentException("Client group id must be set");
        }

        $url = sprintf('/admin/client_groups/%s.json', $clientGroupId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create client group
     *
     * @link http://api.insales.ru/?doc_format=JSON#clientgroup-create-client-group-json
     * @param array $clientGroup client group data
     *
     * @return Response
     */
    public function clientGroupCreate($clientGroup)
    {
        if (empty($clientGroup)) {
            throw new \InvalidArgumentException("Client group id must be set");
        }

        $url = '/admin/client_groups.json';
        $parameters = array('client_group' => $clientGroup);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update client group
     *
     * @link http://api.insales.ru/?doc_format=JSON#clientgroup-update-client-group-json
     * @param int   $clientGroupId  client group id
     * @param array $clientGroup    client group data
     *
     * @return Response
     */
    public function clientGroupUpdate($clientGroupId, $clientGroup)
    {
        if (empty($clientGroupId)) {
            throw new \InvalidArgumentException("Client group id must be set");
        }

        $url = sprintf('/admin/client_groups/%s.json', $clientGroupId);
        $parameters = array('client_group' => $clientGroup);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete client group
     *
     * @link http://api.insales.ru/?doc_format=JSON#clientgroup-destroy-client-group-json
     * @param int $clientGroupId client group id
     *
     * @return Response
     */
    public function clientGroupDelete($clientGroupId)
    {
        if (empty($clientGroupId)) {
            throw new \InvalidArgumentException("Client group id must be set");
        }

        $url = sprintf('/admin/client_groups/%s.json', $clientGroupId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get transaction for client
     *
     * @link http://api.insales.ru/?doc_format=JSON#bonussystemtransaction-get-transaction-for-client-json
     * @param int $bonusId bonus transaction id
     *
     * @return Response
     */
    public function bonusSystemTransactionGet($bonusId)
    {
        if (empty($bonusId)) {
            throw new \InvalidArgumentException("Bonus system transaction id must be set");
        }

        $url = sprintf('/admin/bonus_system_transactions/%s.json', $bonusId);;

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get transactions for client
     *
     * @link http://api.insales.ru/?doc_format=JSON#bonussystemtransaction-get-transactions-for-client-json
     * @param int $clientId client id
     *
     * @return Response
     */
    public function bonusSystemTransactionsClientGet($clientId)
    {
        if (empty($clientId)) {
            throw new \InvalidArgumentException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s/bonus_system_transactions.json', $clientId);;

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create transaction for client
     *
     * @link http://api.insales.ru/?doc_format=JSON#bonussystemtransaction-create-transaction-for-client-json
     * @param int   $clientId       client id
     * @param array $transaction    transaction data
     *
     * @return Response
     */
    public function bonusSystemTransactionsClientCreate($clientId, $transaction)
    {
        if (empty($clientId)) {
            throw new \InvalidArgumentException("Client id must be set");
        }
        if (empty($transaction['bonus_points'])) {
            throw new \InvalidArgumentException("Bonus points must be set");
        }

        $url = sprintf('/admin/clients/%s/bonus_system_transactions.json', $clientId);;
        $parameters = array('bonus_system_transaction' => $transaction);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }
}