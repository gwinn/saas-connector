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

use SaaS\Exception\InsalesApiException;
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
     * Get account
     *
     * @link    http://api.insales.ru/?doc_format=JSON#account-get-account-json
     * @group   account
     *
     * @return  Response
     */
    public function accountGet()
    {
        $url = '/admin/account.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Update account
     *
     * @link    http://api.insales.ru/?doc_format=JSON#account-update-account-json
     * @param   array $account account data json:{"title":"Shop title"}
     * @group   account
     *
     * @return Response
     */
    public function accountUpdate($account)
    {
        $url = '/admin/account.json';
        $parameters = array('account' => $account);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Get catalog categories list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-get-categories-json
     * @group   category
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
     * @throws  InsalesApiException
     * @group   category
     *
     * @return  Response
     */
    public function categoryGet($categoryId)
    {
        if (empty($categoryId)) {
            throw new InsalesApiException("Category id must be set");
        }

        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create catalog category
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-create-category-json
     * @param   array $category category data json:{"title":"Required"}
     * @throws  InsalesApiException
     * @group   category
     *
     * @return  Response
     */
    public function categoryCreate($category)
    {
        if (empty($category)) {
            throw new InsalesApiException("Category must be set");
        }

        $url = '/admin/categories.json';
        $parameters = array('category' => $category);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update catalog category
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-update-category-json
     * @param   string $categoryId category id
     * @param   array $category category data json:{"title":"No required"}
     * @throws  InsalesApiException
     * @group   category
     *
     * @return Response
     */
    public function categoryUpdate($categoryId, $category)
    {
        if (empty($categoryId)) {
            throw new InsalesApiException("Category id must be set");
        }

        $url = sprintf('/admin/categories/%s.json', $categoryId);
        $parameters = array('category' => $category);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete catalog category
     *
     * @link    http://api.insales.ru/?doc_format=JSON#category-destroy-category-json
     * @param   string $categoryId category id
     * @throws  InsalesApiException
     * @group   category
     *
     * @return Response
     */
    public function categoryDelete($categoryId)
    {
        if (empty($categoryId)) {
            throw new InsalesApiException("Category id must be set");
        }

        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get count products
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-products-count-json
     * @group   product
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
     * @group product
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
            'per_page' => $perPage <= 250 ? $perPage : 250,
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
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-product-json
     * @param   string $productId product id
     * @throws  InsalesApiException
     * @group   product
     *
     * @return Response
     */
    public function productGet($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-products-count-json
     * @param   array $product product data json:{"category_id": 123, "title":"Title", "variants_attributes": [{"sku": "ABC", "quantity": 1, "price": 100}]}
     * @throws  InsalesApiException
     * @group   product
     *
     * @return Response
     */
    public function productCreate($product)
    {
        $url = '/admin/products.json';
        $parameters = array('product' => $product);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }
    
    /**
     * Update product by id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-update-product-json
     * @param   array $productId product id
     * @param   array $product product data json:{"title":"No required"}
     * @throws  InsalesApiException
     * @group   product
     *
     * @return Response
     */
    public function productUpdate($productId, $product)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s.json', $productId);
        $parameters = array('product' => $product);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete product by id
     * @link    http://api.insales.ru/?doc_format=JSON#product-destroy-product-json
     * @param   int $productId product id
     * @throws  InsalesApiException
     * @group   product
     *
     * @return Response
     */
    public function productDelete($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list picture for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#image-get-images-json
     * @param   int $productId product id
     * @throws  InsalesApiException
     * @group   picture
     *
     * @return Response
     */
    public function picturesList($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/images.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get picture for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#image-get-image-json
     * @param   int       $productId product id
     * @param   int|null  $pictureId picture id
     * @throws  InsalesApiException
     * @group   picture
     *
     * @return Response
     */
    public function pictureGet($productId, $pictureId = null)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/images%s.json', $productId, !is_null($pictureId) ? '/' . $pictureId : '');

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create picture for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#image-create-image-fpom-src-json
     * @link    http://api.insales.ru/?doc_format=JSON#image-create-image-from-attachment-json
     * @param   int   $productId  product id
     * @param   array $picture    picture data json:{"src":"https://assets3.insales.ru/assets/1/161/647329/v_1467875760/build/slide4.jpg"}
     * @throws  InsalesApiException
     * @group   picture
     *
     * @return Response
     */
    public function pictureCreate($productId, $picture)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/images.json', $productId);
        $parameters = array('image' => $picture);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update picture for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#image-update-image-json
     * @param   int   $productId  product id
     * @param   int   $pictureId  picture id
     * @param   array $picture    picture data json:{"title":"No required"}
     * @throws  InsalesApiException
     * @group   picture
     *
     * @return Response
     */
    public function pictureUpdate($productId, $pictureId, $picture)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($pictureId)) {
            throw new InsalesApiException("Picture id must be set");
        }

        $url = sprintf('/admin/products/%s/images/%s.json', $productId, $pictureId);

        $parameters = array('image' => $picture);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete picture for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#image-destroy-image-json
     * @param   int $productId product id
     * @param   int $pictureId picture id
     * @throws  InsalesApiException
     * @group   picture
     *
     * @return Response
     */
    public function pictureDelete($productId, $pictureId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($pictureId)) {
            throw new InsalesApiException("Picture id must be set");
        }

        $url = sprintf('/admin/products/%s/images/%s.json', $productId, $pictureId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);

    }

    /**
     * Get list variants product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variant-get-variants-json
     * @param   int $productId product id
     * @throws  InsalesApiException
     * @group   variant
     *
     * @return Response
     */
    public function variantsList($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/variants.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get variant by id product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variant-get-variant-json
     * @param   int $productId product id
     * @param   int $variantId variant id
     * @throws  InsalesApiException
     * @group   variant
     *
     * @return Response
     */
    public function variantGet($productId, $variantId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($variantId)) {
            throw new InsalesApiException("Variant id must be set");
        }

        $url = sprintf('/admin/products/%s/variants%s.json', $productId, !is_null($variantId) ? '/' . $variantId : '');

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create variant for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variant-create-variant-json
     * @param   int   $productId  product id
     * @param   array $variant    variant data json:{"price":100,"quantity":1}
     * @throws  InsalesApiException
     * @group   variant
     *
     * @return Response
     */
    public function variantCreate($productId, $variant)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/variants.json', $productId);
        $parameters = array('variant' => $variant);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update variant for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variant-update-variant-json
     * @param   int   $productId  product id
     * @param   array $variant    variant data json:{"price":150,"quantity":2, "id":123}
     * @throws  InsalesApiException
     * @group   variant
     *
     * @return Response
     */
    public function variantUpdate($productId, $variant)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/variants/%s.json', $productId, $variant['id']);
        $parameters = array('variant' => $variant);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Update group variants
     *
     * @param   array $variants variants data
     * @throws  InsalesApiException
     * @group   variants_group
     *
     * @return Response
     */
    public function variantGroupUpdate($variants)
    {
        //TODO: Нет в доке
        if (count($variants) > 100) {
            throw new InsalesApiException("Count variants must be less than 100");
        }
        $url = '/admin/products/variants_group_update.json';
        $parameters = array('variants' => $variants);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete variant for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variant-destroy-variant-json
     * @param   int $productId product id
     * @param   int $variantId variant id
     * @throws  InsalesApiException
     * @group   variant
     *
     * @return Response
     */
    public function variantDelete($productId, $variantId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($variantId)) {
            throw new InsalesApiException("Variant id must be set");
        }

        $url = sprintf('/admin/products/%s/variants/%s.json', $productId, $variantId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get fields for variant
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-fields-json
     * @group   variant
     *
     * @return Response
     */
    public function variantFieldsGet()
    {
        $url = '/admin/variant_fields.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get field for variant by handle or id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-field-by-handle-json
     * @link    http://api.insales.ru/?doc_format=JSON#variantfield-get-variant-field-json
     * @param   int $handle handle or id variant field
     * @throws  InsalesApiException
     * @group   variant
     *
     * @return Response
     */
    public function variantFieldGet($handle)
    {
        if (empty($handle)) {
            throw new InsalesApiException("Variant field id or handle must be set");
        }

        $url = sprintf('/admin/variant_fields/%s.json', $handle);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get list options
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionname-get-option-names-json
     * @group   option
     *
     * @return  Response
     */
    public function optionsList()
    {
        $url = '/admin/option_names.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get option by id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionname-get-option-name-json
     * @param   int $optionId option id
     * @throws  InsalesApiException
     * @group   option
     *
     * @return Response
     */
    public function optionGet($optionId)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s.json', $optionId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create option
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionname-create-option-name-json
     * @param   array $option option dara json:{"title":"Required"}
     * @group   option
     *
     * @return Response
     */
    public function optionCreate($option)
    {
        $url = '/admin/option_names.json';
        $parameters = $option;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update option by id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionname-update-option-name-json
     * @param   int   $optionId   option id
     * @param   array $option     option data json:{"title":"No required"}
     * @throws  InsalesApiException
     * @group   option
     *
     * @return Response
     */
    public function optionUpdate($optionId, $option)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s.json', $optionId);
        $parameters = $option;

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete option by id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionname-destroy-option-name-json
     * @param   int $optionId option id
     * @throws  InsalesApiException
     * @group   option
     *
     * @return Response
     */
    public function optionDelete($optionId)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s.json', $optionId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list option values
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionvalue-get-option-values-for-all-options-json
     * @group   optionValue
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
     * @link    http://api.insales.ru/?doc_format=JSON#optionvalue-get-option-values-for-specific-option-json
     * @param   int       $optionId       option id
     * @param   null|int  $optionValueId  option value id
     * @throws  InsalesApiException
     * @group   optionValue
     *
     * @return Response
     */
    public function optionValuesGet($optionId, $optionValueId = null)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
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
     * @link    http://api.insales.ru/?doc_format=JSON#optionvalue-create-option-value-json
     * @param   int   $optionId       option id
     * @param   array $optionValue    option value json:{"title":"Required"}
     * @throws  InsalesApiException
     * @group   optionValue
     *
     * @return Response
     */
    public function optionValueCreate($optionId, $optionValue)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
        }

        $url = sprintf('/admin/option_names/%s/option_values.json' , $optionId);
        $parameters = $optionValue;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update option value
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionvalue-update-option-value-json
     * @param   int   $optionId       option id
     * @param   int   $optionValueId  option value id
     * @param   array $optionValue    option value data json:{"position":49}
     * @throws  InsalesApiException
     * @group   optionValue
     *
     * @return Response
     */
    public function optionValueUpdate($optionId, $optionValueId, $optionValue)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
        }
        if (empty($optionValueId)) {
            throw new InsalesApiException("Value option id must be set");
        }

        $url = sprintf('/admin/option_names/%s/option_values/%s.json' , $optionId, $optionValueId);
        $parameters = $optionValue;

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete option value
     *
     * @link    http://api.insales.ru/?doc_format=JSON#optionvalue-destroy-option-value-json
     * @param   int $optionId         option id
     * @param   int $optionValueId    option value id
     * @throws  InsalesApiException
     * @group   optionValue
     *
     * @return Response
     */
    public function optionValueDelete($optionId, $optionValueId)
    {
        if (empty($optionId)) {
            throw new InsalesApiException("Option id must be set");
        }
        if (empty($optionValueId)) {
            throw new InsalesApiException("Value option id must be set");
        }

        $url = sprintf('/admin/option_names/%s/option_values/%s.json', $optionId, $optionValueId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list product fields
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfield-get-product-fields-json
     * @group   productField
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
     * @link    http://api.insales.ru/?doc_format=JSON#productfield-get-product-field-json
     * @param   int $productFieldId field id
     * @throws  InsalesApiException
     * @group   productField
     *
     * @return Response
     */
    public function productFieldGet($productFieldId)
    {
        if (empty($productFieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/product_fields/%s.json', $productFieldId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create product field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfield-create-product-field-json
     * @param   array $field field data json:{"title": "Required", "handle": "Required", "type": "ProductField::TextArea"}
     * @group   productField
     *
     * @return Response
     */
    public function productFieldCreate($field)
    {
        $url = '/admin/product_fields.json';
        $parameters = $field;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update product field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfield-update-product-field-json
     * @param   int   $fieldId    field id
     * @param   array $field      field data json:{"title": "No required", "handle": "No required"}
     * @throws  InsalesApiException
     * @group   productField
     *
     * @return Response
     */
    public function productFieldUpdate($fieldId, $field)
    {
        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/product_fields/%s.json', $fieldId);
        $parameters = array('product-field' => $field);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);

    }

    /**
     * Delete product field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfield-destroy-product-field-json
     * @param   int $fieldId field id
     * @throws  InsalesApiException
     * @group   productField
     *
     * @return Response
     */
    public function productFieldDelete($fieldId)
    {
        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/product_fields/%s.json', $fieldId);
        
        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list field values by product id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfieldvalue-get-product-field-values-json
     * @param   int $productId product id
     * @throws  InsalesApiException
     * @group   productFieldValues
     *
     * @return Response
     */
    public function productFieldValuesList($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get field values by product id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfieldvalue-get-product-field-value-json
     * @param   int   $productId                product id
     * @param   int   $productFieldValuesId     field id
     * @throws  InsalesApiException
     * @group   productFieldValues
     *
     * @return Response
     */
    public function productFieldValuesGet($productId, $productFieldValuesId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($productFieldValuesId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values/%s.json', $productId, $productFieldValuesId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create field values for product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfieldvalue-create-product-field-value-json
     * @param   int     $productId  product id
     * @param   array   $value      value data json:{"value": "test value"}
     * @throws  InsalesApiException
     * @group   productFieldValues
     *
     * @return Response
     */
    public function productFieldValuesCreate($productId, $value)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values.json', $productId);
        $parameters = $value;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update field value by product id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfieldvalue-update-product-field-value-json
     * @param   int   $productId  product id
     * @param   int   $fieldId    field id
     * @param   array $value      value data json:{"value": "New value"}
     * @throws  InsalesApiException
     * @group   productFieldValues
     *
     * @return Response
     */
    public function productFieldValuesUpdate($productId, $fieldId, $value)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values/%s.json', $productId, $fieldId);
        $parameters = array('product-field-value' => $value);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete field value by product id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#productfieldvalue-destroy-product-field-value-json
     * @param   int $productId    product id
     * @param   int $fieldId      field id
     * @throws  InsalesApiException
     * @group   productFieldValues
     *
     * @return Response
     */
    public function productFieldValuesDelete($productId, $fieldId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/products/%s/product_field_values/%s.json', $productId, $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list supplementary products
     *
     * @link    http://api.insales.ru/?doc_format=JSON#supplementary-get-supplementaries-json
     * @param   int $productId product id
     * @throws  InsalesApiException
     * @group   supplementaryProducts
     *
     * @return Response
     */
    public function supplementariesProductsList($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/supplementaries.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create supplementary product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#supplementary-create-supplementary-json
     * @param   int   $productId          product id
     * @param   array $supplementaryIds   supplementary products ids
     * @throws  InsalesApiException
     * @group   supplementaryProducts
     *
     * @return Response
     */
    public function supplementaryProductsCreate($productId, $supplementaryIds)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/supplementaries.json', $productId);
        $parameters = array('supplementary_ids' => $supplementaryIds);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete supplementary product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#supplementary-destroy-supplementary-json
     * @param   int $productId        product id
     * @param   int $supplementaryProductsId  supplementary product id
     * @throws  InsalesApiException
     * @group   supplementaryProducts
     *
     * @return Response
     */
    public function supplementaryProductsDelete($productId, $supplementaryProductsId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($supplementaryProductsId)) {
            throw new InsalesApiException("Supplementary product id must be set");
        }

        $url = sprintf('/admin/products/%s/supplementaries/%s.json', $productId, $supplementaryProductsId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list similars products
     *
     * @link    http://api.insales.ru/?doc_format=JSON#similar-get-similars-json
     * @param   int $productId product id
     * @throws  InsalesApiException
     * @group   similarProducts
     *
     * @return Response
     */
    public function similarsProductsList($productId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/similars.json', $productId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create similar product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#similar-create-similar-json
     * @param   int   $productId  product id
     * @param   array $similarIds similar ids
     * @throws  InsalesApiException
     * @group   similarProducts
     *
     * @return Response
     */
    public function similarProductsCreate($productId, $similarIds)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }

        $url = sprintf('/admin/products/%s/similars.json', $productId);

        $parameters = array('similar_ids' => $similarIds);
        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete similar product Удаление аналогичного товара
     *
     * @link    http://api.insales.ru/?doc_format=JSON#similar-destroy-similar-json
     * @param   int $productId        product id
     * @param   int $similarProductsId similar product id
     * @throws  InsalesApiException
     * @group   similarProducts
     *
     * @return Response
     */
    public function similarProductsDelete($productId, $similarProductsId)
    {
        if (empty($productId)) {
            throw new InsalesApiException("Product id must be set");
        }
        if (empty($similarProductsId)) {
            throw new InsalesApiException("Related productId id must be set");
        }

        $url = sprintf('/admin/products/%s/similars/%s.json', $productId, $similarProductsId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list collections
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collection-get-collections-json
     * @param   null      $perPage        quantity of objects per page
     * @param   \DateTime $updatedSince   set datetime to get only data updated after it
     * @param   null      $fromId         set id to get only data starting from it
     * @throws  InsalesApiException
     * @group   collection
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
     * @link    http://api.insales.ru/?doc_format=JSON#collection-get-collection-json
     * @param   int $collectionId collection id
     * @throws  InsalesApiException
     * @group   collection
     *
     * @return Response
     */
    public function collectionGet($collectionId)
    {
        if (empty($collectionId)) {
            throw new InsalesApiException("Collection id must be set");
        }

        $url = sprintf('/admin/collections/%s.json', $collectionId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create collection
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collection-create-collection-json
     * @param   array $collection collection data json:{"title": "Required", "parent_id": 123, "position": 49}
     * @group   collection
     *
     * @return Response
     */
    public function collectionCreate($collection)
    {
        $url = '/admin/collections.json';
        $parameters = array('collection' => $collection);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update collection
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collection-update-collection-json
     * @param   int   $collectionId   collection id
     * @param   array $collection     collection data json:{"title": "No required", "position": 50}
     * @throws  InsalesApiException
     * @group   collection
     *
     * @return Response
     */
    public function collectionUpdate($collectionId, $collection)
    {
        if (empty($collectionId)) {
            throw new InsalesApiException("Collection id must be set");
        }

        $possibleSort = array(1, 2, 3, 4, 5, 6, 7);

        if (isset($collection['sort-type']) && !in_array($collection['sort-type'], $possibleSort)) {
            throw new InsalesApiException("Unavailable sorting. Possible sorting codes: 1, 2, 3, 4, 5, 6, 7");
        }

        $url = sprintf('/admin/collections/%s.json', $collectionId);
        $parameters = array('collection' => $collection);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete collection
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collection-destroy-collection-json
     * @param   int $collectionId collection id
     * @throws  InsalesApiException
     * @group   collection
     *
     * @return Response
     */
    public function collectionDelete($collectionId)
    {
        if (empty($collectionId)) {
            throw new InsalesApiException("Collection id must be set");
        }

        $url = sprintf('/admin/collections/%s.json', $collectionId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list collects
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collect-get-collects-json
     * @group   collect
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
     * @link    http://api.insales.ru/?doc_format=JSON#collect-get-collections-by-product-json
     * @link    http://api.insales.ru/?doc_format=JSON#collect-get-products-by-collection-json
     * @param   int $productId    product id
     * @param   int $collectionId collection id
     * @throws  InsalesApiException
     * @group   collect
     *
     * @return Response
     */
    public function collectsGet($productId, $collectionId)
    {

        if (empty($productId) && empty($collectionId)) {
            throw new InsalesApiException("Product id or collection id must be set");
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
     * @link    http://api.insales.ru/?doc_format=JSON#collect-add-product-to-collection-json
     * @param   array $collect collect data json:{"product_id": 123, "collection_id": 123}
     * @group   collect
     *
     * @return Response
     */
    public function collectCreate($collect)
    {
        $url = '/admin/collects.json';
        $parameters = array('collect' => $collect);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update position  or move product to another collection
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collect-update-position-json
     * @link    http://api.insales.ru/?doc_format=JSON#collect-move-product-to-another-collection-json
     * @param   int   $collectId  collect id
     * @param   array $collect    collect data json:{"position": 49}
     * @throws  InsalesApiException
     * @group   collect
     *
     * @return Response
     */
    public function collectsUpdate($collectId, $collect)
    {
        if (empty($collectId)) {
            throw new InsalesApiException("Collect id must be set");
        }
        if (empty($collect)) {
            throw new InsalesApiException("Collect must be set");
        }

        $url = sprintf('/admin/collects/%s.json', $collectId);
        $parameters = array('collect' => $collect);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete product from collection
     *
     * @link    http://api.insales.ru/?doc_format=JSON#collect-remove-product-from-collection-json
     * @param   int $collectId collect id
     * @throws  InsalesApiException
     * @group   collect
     *
     * @return Response
     */
    public function collectDelete($collectId)
    {
        if (empty($collectId)) {
            throw new InsalesApiException("Collect id must be set");
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
     * @throws InsalesApiException
     * @group order
     *
     * @return Response
     */
    public function ordersList($filter = null, $page = null, $perPage = null, \DateTime $updatedSince = null, $fromId = null, $deleted = null)
    {
        if (isset($filter['status']) && ($filter['status'] != 'open' || $filter['status'] != 'closed')) {
            throw new InsalesApiException("Status must be set. open|closed");
        }

        $url = '/admin/orders.json';

        $parameters = array(
            'status' => isset($filter['status']) ? $filter['status'] : null,
            'fulfillment_status' => isset($filter['fulfillment_status']) ? $filter['fulfillment_status'] : null,
            'financial_status' => isset($filter['financial_status']) ? $filter['financial_status'] : null,
            'delivery_variant' => isset($filter['delivery_variant']) ? $filter['delivery_variant'] : null,
            'page' => $page,
            'per_page' => $perPage <= 250 ? $perPage : 250,
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
     * @throws InsalesApiException
     * @group order
     *
     * @return Response
     */
    public function ordersCount($filter = array(), $page = null , $perPage = null, \DateTime $updatedSince = null, $fromId = null, $deleted = null)
    {
        $status = array('open', 'closed');
        if (isset($filter['status']) && !in_array($filter['status'], $status)) {
            throw new InsalesApiException("Status must be set. open|closed");
        }

        $url = '/admin/orders/count.json';

        $parameters = array(
            'status' => isset($filter['status']) ? $filter['status'] : null,
            'fulfillment_status' => isset($filter['fulfillment_status']) ? $filter['fulfillment_status'] : null,
            'financial_status' => isset($filter['financial_status']) ? $filter['financial_status'] : null,
            'delivery_variant' => isset($filter['delivery_variant']) ? $filter['delivery_variant'] : null,
            'page' => $page,
            'per_page' => $perPage <= 250 ? $perPage : 250,
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
     * @link    http://api.insales.ru/?doc_format=JSON#order-get-order-json
     * @param   int $orderId order id
     * @throws  InsalesApiException
     * @group   order
     *
     * @return Response
     */
    public function orderGet($orderId)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }

        $url = sprintf('/admin/orders/%s.json', $orderId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Update order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-update-order-json
     * @param   int   $orderId    order id
     * @param   array $order      order data json:{"comment": "New comment"}
     * @throws  InsalesApiException
     * @group   order
     *
     * @return Response
     */
    public function orderUpdate($orderId, $order)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }

        $url = sprintf('/admin/orders/%s.json', $orderId);
        $parameters = array('order' => $order);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Create order line by product_id or by variant_id
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-product-id-json
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-line-by-variant-id-json
     * @param   int   $orderId    order id
     * @param   array $orderLines order lines attributes json:[{"quantity": 1, "product_id": 123}]
     * @throws  InsalesApiException
     * @group   orderLine
     *
     * @return Response
     */
    public function orderLineCreate($orderId, $orderLines)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }

        if (empty($orderLines)) {
            throw new InsalesApiException("Order line must be set");
        }

        foreach ($orderLines as $orderLine) {
            if ((empty($orderLine['variant_id']) && empty($orderLine['product_id'])) || empty($orderLine['quantity'])) {
                throw new InsalesApiException("Variant or product id and quantity must be set");
            }
        }
        $order = array('order_lines_attributes' => $orderLines);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Update order line
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-update-order-line-json
     * @param   int   $orderId    order id
     * @param   array $orderLines order lines attributes json:[{"id": 123, "comment": "New comment"}]
     * @throws  InsalesApiException
     * @group   orderLine
     *
     * @return Response
     */
    public function orderLineUpdate($orderId, $orderLines)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }

        if (empty($orderLines)) {
            throw new InsalesApiException("Order line must be set");
        }

        foreach ($orderLines as $orderLine) {
            if (empty($orderLine['id'])) {
                throw new InsalesApiException("Order line id must be set");
            }
        }
        $order = array('order_lines_attributes' => $orderLines);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Remove order line
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-remove-order-line-json
     * @param   int   $orderId    order id
     * @param   array $orderLines order lines attributes json:[{"id": 123}]
     * @throws  InsalesApiException
     * @group   orderLine
     *
     * @return Response
     */
    public function orderLineDelete($orderId, $orderLines)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }

        if (empty($orderLines)) {
            throw new InsalesApiException("Order line must be set");
        }

        foreach ($orderLines as $orderLine) {
            if (empty($orderLine['id'])) {
                throw new InsalesApiException("Order line id must be set");
            }
        }
        $order = array('order_lines_attributes' => $orderLines);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Update shipping address
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-update-shipping-address-json
     * @param   int       $orderId order id
     * @param   string    $address address delivery json:{"address": "New address"}
     * @throws  InsalesApiException
     * @group   orderShippingAddress
     *
     * @return Response
     */
    public function orderShippingAddressUpdate($orderId, $address)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }
        if (empty($address)) {
            throw new InsalesApiException("Order address must be set");
        }

        $order = array('shipping_address_attributes' => $address);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Update custom status
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-update-custom-status-json
     * @param   int       $orderId            order id
     * @param   string    $permalink       custom status
     * @param   null      $fulfillmentStatus  fulfillment status
     * @throws  InsalesApiException
     * @group   orderCustomStatus
     *
     * @return Response
     */
    public function orderCustomStatusUpdate($orderId, $permalink, $fulfillmentStatus = null)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
        }
        if (empty($permalink)) {
            throw new InsalesApiException("Custom status must be set");
        }

        $order = array(
            'custom_status_permalink' => $permalink,
            'fulfillment_status' => $fulfillmentStatus
        );
        $order = array_filter($order);

        return $this->orderUpdate($orderId, $order);
    }

    /**
     * Create order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-create-order-json
     * @param   array $order order data json:{"order_lines_attributes": [{"quantity": 1, "product_id": 123}], "client": {"surname": "surname", "name": "Jon", "email": "vasya@example.com", "phone": "+79111112233"}, "shipping_address_attributes": {"surname": "surname", "name": "jon", "address": "test address"}, "delivery_variant_id": 123, "payment_gateway_id": 123 }
     * @group   order
     *
     * @return Response
     */
    public function orderCreate($order)
    {
        $url = '/admin/orders.json';

        $parameters = $order;

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Delete order
     *
     * @link    http://api.insales.ru/?doc_format=JSON#order-remove-order-line-json
     * @param   int $orderId order id
     * @throws  InsalesApiException
     * @group   order
     *
     * @return Response
     */
    public function orderDelete($orderId)
    {
        if (empty($orderId)) {
            throw new InsalesApiException("Order id must be set");
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
     * @param int       $page           number page
     * @group client
     *
     * @return Response
     */
    public function clientsList($perPage = null, \DateTime $updatedSince = null, $fromId = null, $page = null)
    {
        $url = '/admin/clients.json';

        $parameters = array(
            'updated_since' => isset($updatedSince) ? $updatedSince->format('c') : null,
            'from_id' => $fromId,
            'per_page' => $perPage <= 250 ? $perPage : 250,
            'page' => isset($page) ? $page : null,
        );

        $parameters = array_filter($parameters);

        return $this->client->makeRequest($url, Request::METHOD_GET, $parameters);
    }

    /**
     * Get client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-get-client-json
     * @param   int $clientId client id
     * @throws  InsalesApiException
     * @group   client
     *
     * @return Response
     */
    public function clientGet($clientId)
    {
        if (empty($clientId)) {
            throw new InsalesApiException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s.json', $clientId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create individual or juridical client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-create-individual-client-json
     * @link    http://api.insales.ru/?doc_format=JSON#client-create-juridical-client-json
     * @param   array $client client data json:{"name": "name", "surname": "surname", "middlename": "middlename"}
     * @group   client
     *
     * @return Response
     */
    public function clientCreate($client)
    {
        $url = '/admin/clients.json';
        $parameters = array('client' => $client);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-update-client-json
     * @param   int   $clientId    client id
     * @param   array $client      client data json:{"name": "name"}
     * @throws  InsalesApiException
     * @group   client
     *
     * @return Response
     */
    public function clientUpdate($clientId, $client)
    {
        if (empty($clientId)) {
            throw new InsalesApiException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s.json', $clientId);
        $parameters = array('client' => $client);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#client-destroy-client-json
     * @param   int $clientId client id
     * @throws  InsalesApiException
     * @group   client
     *
     * @return Response
     */
    public function clientDelete($clientId)
    {
        if (empty($clientId)) {
            throw new InsalesApiException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s.json', $clientId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list discount codes
     *
     * @link    http://api.insales.ru/?doc_format=JSON#discountcode-get-discount-codes-json
     * @group   discountCode
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
     * @link    http://api.insales.ru/?doc_format=JSON#discountcode-get-discount-code-json
     * @param   int $discountCodeId discount id
     * @throws  InsalesApiException
     * @group   discountCode
     *
     * @return Response
     */
    public function discountCodeGet($discountCodeId)
    {
        if (empty($discountCodeId)) {
            throw new InsalesApiException("Discount code id must be set");
        }

        $url = sprintf('/admin/discount_codes/%s.json', $discountCodeId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create discount code
     *
     * @link    http://api.insales.ru/?doc_format=JSON#discountcode-create-discount-code-json
     * @param   array $discount discount data json:{"code": "CODE", "type_id": 1, "discount": 10}
     * @group   discountCode
     *
     * @return Response
     */
    public function discountCodeCreate($discount)
    {
        $url = '/admin/discount_codes.json';
        $parameters = array('discount_code' => $discount);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update discount code
     *
     * @link    http://api.insales.ru/?doc_format=JSON#discountcode-update-discount-code-json
     * @param   int   $discountCodeId discount id
     * @param   array $discount   discount data json:{"discount": 49}
     * @throws  InsalesApiException
     * @group   discountCode
     *
     * @return Response
     */
    public function discountCodeUpdate($discountCodeId, $discount)
    {
        if (empty($discountCodeId)) {
            throw new InsalesApiException("Discount code id must be set");
        }

        $url = sprintf('/admin/discount_codes/%s.json', $discountCodeId);
        $parameters = array('discount_code' => $discount);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete discount code
     *
     * @link    http://api.insales.ru/?doc_format=JSON#discountcode-destroy-discount-code-json
     * @param   int $discountCodeId discount id
     * @throws  InsalesApiException
     * @group   discountCode
     *
     * @return Response
     */
    public function discountCodeDelete($discountCodeId)
    {
        if (empty($discountCodeId)) {
            throw new InsalesApiException("Discount code id must be set");
        }

        $url = sprintf('/admin/discount_codes/%s.json', $discountCodeId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list delivery variants
     *
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variants-json
     * @group   deliveryVariant
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
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-get-delivery-variant-json
     * @param   int $deliveryVariantId delivery id
     * @throws  InsalesApiException
     * @group   deliveryVariant
     *
     * @return Response
     */
    public function deliveryVariantGet($deliveryVariantId)
    {
        if (empty($deliveryVariantId)) {
            throw new InsalesApiException("Delivery variant id must be set");
        }

        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryVariantId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create delivery_variant
     *
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-external-json
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-fixed-json
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-locationdepend-json
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-create-delivery-variant-pricedepend-json
     * @param   array $delivery delivery data json:{"title": "delivery", "type": "DeliveryVariant::External"}
     * @group   deliveryVariant
     *
     * @return Response
     */
    public function deliveryVariantCreate($delivery)
    {
        $url = '/admin/delivery_variants.json';
        $parameters = array('delivery_variant' => $delivery);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update delivery variant
     *
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-update-delivery-variant-json
     * @param   int   $deliveryId delivery id
     * @param   array $delivery   delivery data json:{"title": "New delivery"}
     * @throws  InsalesApiException
     * @group   deliveryVariant
     *
     * @return Response
     */
    public function deliveryVariantUpdate($deliveryId, $delivery)
    {
        if (empty($deliveryId)) {
            throw new InsalesApiException("Delivery variant id must be set");
        }

        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryId);
        $parameters = array('delivery_variant' => $delivery);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete delivery variant
     *
     * @link    http://api.insales.ru/?doc_format=JSON#deliveryvariant-destroy-delivery-variant-json
     * @param   int $deliveryId delivery id
     * @throws  InsalesApiException
     * @group   deliveryVariant
     *
     * @return Response
     */
    public function deliveryVariantDelete($deliveryId)
    {
        if (empty($deliveryId)) {
            throw new InsalesApiException("Delivery variant id must be set");
        }

        $url = sprintf('/admin/delivery_variants/%s.json', $deliveryId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list payment gateways
     *
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateways-json
     * @group   paymentGateway
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
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-get-payment-gateway-json
     * @param   int $paymentGatewayId payment id
     * @throws  InsalesApiException
     * @group   paymentGateway
     *
     * @return Response
     */
    public function paymentGatewayGet($paymentGatewayId)
    {
        if (empty($paymentGatewayId)) {
            throw new InsalesApiException("Payment gateway id must be set");
        }

        $url = sprintf('/admin/payment_gateways/%s.json', $paymentGatewayId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create Cod or Custom or External payment gateway
     *
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-create-cod-or-custom-payment-gateway-json
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-create-external-payment-gateway-json
     * @param   array $payment payment data json:{"title": "payment", "type": "PaymentGateway::Cod"}
     * @group   paymentGateway
     *
     * @return Response
     */
    public function paymentGatewayCreate($payment)
    {
        $url = '/admin/payment_gateways.json';
        $parameters = array('payment_gateway' => $payment);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update payment gateway
     *
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-update-payment-gateway-json
     * @param   int   $paymentId  payment id
     * @param   array $payment    payment data json:{"title": "New payment"}
     * @throws  InsalesApiException
     * @group   paymentGateway
     *
     * @return Response
     */
    public function paymentGatewayUpdate($paymentId, $payment)
    {
        if (empty($paymentId)) {
            throw new InsalesApiException("Payment gateway id must be set");
        }

        $url = sprintf('/admin/payment_gateways/%s.json', $paymentId);
        $parameters = $payment;

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete payment gateway
     *
     * @link    http://api.insales.ru/?doc_format=JSON#paymentgateway-destroy-payment-gateway-json
     * @param   int $paymentId payment id
     * @throws  InsalesApiException
     * @group   paymentGateway
     *
     * @return Response
     */
    public function paymentGatewayDelete($paymentId)
    {
        if (empty($paymentId)) {
            throw new InsalesApiException("Payment gateway id must be set");
        }
        $url = sprintf('/admin/payment_gateways/%s.json', $paymentId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list domains
     *
     * @link    http://api.insales.ru/?doc_format=JSON#domain-get-domains-json
     * @group   domain
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
     * @link    http://api.insales.ru/?doc_format=JSON#domain-get-domain-json
     * @param   int $domainId domain id
     * @throws  InsalesApiException
     * @group   domain
     *
     * @return Response
     */
    public function domainGet($domainId)
    {
        if (empty($domainId)) {
            throw new InsalesApiException("Domain id must be set");
        }

        $url = sprintf('/admin/domains/%s.json', $domainId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create domain
     *
     * @link    http://api.insales.ru/?doc_format=JSON#domain-create-domain-json
     * @param   array $domain domain data json:{"domain": "test-domain.ru"}
     * @group   domain
     *
     * @return Response
     */
    public function domainCreate($domain)
    {
        $url = '/admin/domains.json';
        $parameters = array('domain' => $domain);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update domain
     *
     * @link    http://api.insales.ru/?doc_format=JSON#domain-update-domain-json
     * @param   int   $domainId   domain id
     * @param   array $domain     domain data json:{"domain": "new-domain.ru"}
     * @throws  InsalesApiException
     * @group   domain
     *
     * @return Response
     */
    public function domainUpdate($domainId, $domain)
    {
        if (empty($domainId)) {
            throw new InsalesApiException("Domain id must be set");
        }

        $url = sprintf('/admin/domains/%s.json', $domainId);
        $parameters = array('domain' => $domain);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete domain
     *
     * @link    http://api.insales.ru/?doc_format=JSON#domain-destroy-domain-json
     * @param   int $domainId domain id
     * @throws  InsalesApiException
     * @group   domain
     *
     * @return Response
     */
    public function domainDelete($domainId)
    {
        if (empty($domainId)) {
            throw new InsalesApiException("Domain id must be set");
        }

        $url = sprintf('/admin/domains/%s.json', $domainId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list webhooks
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-get-webhooks-json
     * @group   webhook
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
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-get-webhook-json
     * @param   int $webhookId webhook id
     * @throws  InsalesApiException
     * @group   webhook
     *
     * @return Response
     */
    public function webhookGet($webhookId)
    {
        if (empty($webhookId)) {
            throw new InsalesApiException("Webhook id must be set");
        }

        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-create-webhook-json
     * @param   array $webhook webhook data json:{"address": "http://test.com/orders/create", "topic": "orders/create"}
     * @group   webhook
     *
     * @return Response
     */
    public function webhookCreate($webhook)
    {
        $url = '/admin/webhooks.json';
        $parameters = array('webhook' => $webhook);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-update-webhook-json
     * @param   int   $webhookId  webhook id
     * @param   array $webhook    webhook data json:{"topic": "orders/update"}
     * @throws  InsalesApiException
     * @group   webhook
     *
     * @return Response
     */
    public function webhookUpdate($webhookId, $webhook)
    {
        if (empty($webhookId)) {
            throw new InsalesApiException("Webhook id must be set");
        }
        if (empty($webhook)) {
            throw new InsalesApiException("Webhook must be set");
        }

        $url = sprintf('/admin/webhooks/%s.json', $webhookId);
        $parameters = array('webhook' => $webhook);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete webhook
     *
     * @link    http://api.insales.ru/?doc_format=JSON#webhook-destroy-webhook-json
     * @param   int $webhookId webhook id
     * @throws  InsalesApiException
     * @group   webhook
     *
     * @return Response
     */
    public function webhookDelete($webhookId)
    {
        if (empty($webhookId)) {
            throw new InsalesApiException("Webhook id must be set");
        }

        $url = sprintf('/admin/webhooks/%s.json', $webhookId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list custom statuses
     *
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-statuses-json
     * @group   customStatus
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
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-get-custom-status-json
     * @param   string $customStatusPermalink status permalink
     * @throws  InsalesApiException
     * @group   customStatus
     *
     * @return Response
     */
    public function customStatusGet($customStatusPermalink)
    {
        if (empty($customStatusPermalink)) {
            throw new InsalesApiException("Permalink status must be set");
        }

        $url = sprintf('/admin/custom_statuses/%s.json', $customStatusPermalink);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create custom status
     *
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-create-custom-status-json
     * @param   array $status status data json:{"system_status": "new", "title": "New (ordered by phone)"}
     * @throws  InsalesApiException
     * @group   customStatus
     *
     * @return Response
     */
    public function customStatusCreate($status)
    {
        if (empty($status)) {
            throw new InsalesApiException("Status must be set");
        }

        $url = '/admin/custom_statuses.json';
        $parameters = array('custom_status' => $status);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update custom status
     *
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-update-custom-status-json
     * @param   string    $statusPermalink    status permalink
     * @param   array     $status             status data json:{"system_status": "new", "title": "New (ordered by website)"}
     * @throws  InsalesApiException
     * @group   customStatus
     *
     * @return Response
     */
    public function customStatusUpdate($statusPermalink, $status)
    {
        if (empty($statusPermalink)) {
            throw new InsalesApiException("Permalink status must be set");
        }

        $url = sprintf('/admin/custom_statuses/%s.json', $statusPermalink);

        $parameters = array('custom_status' => $status);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete custom status
     *
     * @link    http://api.insales.ru/?doc_format=JSON#customstatus-destroy-custom-status-json
     * @param   string $statusPermalink status permalink
     * @throws  InsalesApiException
     * @group   customStatus
     *
     * @return Response
     */
    public function customStatusDelete($statusPermalink)
    {
        if (empty($statusPermalink)) {
            throw new InsalesApiException("Permalink status must be set");
        }

        $url = sprintf('/admin/custom_statuses/%s.json', $statusPermalink);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list fields
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-get-fields-json
     * @group   field
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
     * @link    http://api.insales.ru/?doc_format=JSON#field-get-field-json
     * @param   int $fieldId field id
     * @throws  InsalesApiException
     * @group   field
     *
     * @return Response
     */
    public function fieldGet($fieldId)
    {
        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/fields/%s.json', $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-create-field-json
     * @param   array $field field data json:{"title": "title", "type": "Field::TextField", "office_title": "title_for_text_field", "destiny": 3}
     * @throws  InsalesApiException
     * @group   field
     *
     * @return Response
     */
    public function fieldCreate($field)
    {
        if (empty($field)) {
            throw new InsalesApiException("Field must be set");
        }

        $url = '/admin/fields.json';
        $parameters = array('field' => $field);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-update-field-json
     * @param   int   $fieldId    field id
     * @param   array $field      field data json:{"title": "New title"}
     * @throws  InsalesApiException
     * @group   field
     *
     * @return Response
     */
    public function fieldUpdate($fieldId, $field)
    {
        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }
        if (empty($field)) {
            throw new InsalesApiException("Field must be set");
        }

        $url = sprintf('/admin/fields/%s.json', $fieldId);
        $parameters = array('field' => $field);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete field
     *
     * @link    http://api.insales.ru/?doc_format=JSON#field-destroy-field-json
     * @param   int $fieldId field id
     * @throws  InsalesApiException
     * @group   field
     *
     * @return Response
     */
    public function fieldDelete($fieldId)
    {
        if (empty($fieldId)) {
            throw new InsalesApiException("Field id must be set");
        }

        $url = sprintf('/admin/fields/%s.json', $fieldId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list properties
     *
     * @link    http://api.insales.ru/?doc_format=JSON#property-get-properties-json
     * @group   property
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
     * @link    http://api.insales.ru/?doc_format=JSON#property-get-property-json
     * @param   int $propertyId property id
     * @throws  InsalesApiException
     * @group   property
     *
     * @return Response
     */
    public function propertyGet($propertyId)
    {
        if (empty($propertyId)) {
            throw new InsalesApiException("Property id must be set");
        }

        $url = sprintf('/admin/properties/%s.json', $propertyId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create property
     *
     * @link    http://api.insales.ru/?doc_format=JSON#property-create-property-json
     * @param   array $property property data json:{"title": "New title"}
     * @group   property
     *
     * @return Response
     */
    public function propertyCreate($property)
    {
        $url = '/admin/properties.json';
        $parameters = array('property' => $property);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update property
     *
     * @link    http://api.insales.ru/?doc_format=JSON#property-update-property-json
     * @param   int   $propertyId property id
     * @param   array $property   property data json:{"title": "title"}
     * @throws  InsalesApiException
     * @group   property
     *
     * @return Response
     */
    public function propertyUpdate($propertyId, $property)
    {
        if (empty($propertyId)) {
            throw new InsalesApiException("Property id must be set");
        }

        $url = sprintf('/admin/properties/%s.json', $propertyId);
        $parameters = array('property' => $property);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete property
     *
     * @link    http://api.insales.ru/?doc_format=JSON#property-destroy-property-json
     * @param   int $propertyId property id
     * @throws  InsalesApiException
     * @group   property
     *
     * @return Response
     */
    public function propertyDelete($propertyId)
    {
        if (empty($propertyId)) {
            throw new InsalesApiException("Property id must be set");
        }

        $url = sprintf('/admin/properties/%s.json', $propertyId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get list client groups
     *
     * @link    http://api.insales.ru/?doc_format=JSON#clientgroup-get-client-groups-json
     * @group   clientGroup
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
     * @link    http://api.insales.ru/?doc_format=JSON#clientgroup-get-client-group-json
     * @param   int $clientGroupId client group id
     * @throws  InsalesApiException
     * @group   clientGroup
     *
     * @return Response
     */
    public function clientGroupGet($clientGroupId)
    {
        if (empty($clientGroupId)) {
            throw new InsalesApiException("Client group id must be set");
        }

        $url = sprintf('/admin/client_groups/%s.json', $clientGroupId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create client group
     *
     * @link    http://api.insales.ru/?doc_format=JSON#clientgroup-create-client-group-json
     * @param   array $clientGroup client group data json:{"title": "clientGroup"}
     * @group   clientGroup
     *
     * @return Response
     */
    public function clientGroupCreate($clientGroup)
    {
        $url = '/admin/client_groups.json';
        $parameters = array('client_group' => $clientGroup);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update client group
     *
     * @link    http://api.insales.ru/?doc_format=JSON#clientgroup-update-client-group-json
     * @param   int   $clientGroupId  client group id
     * @param   array $clientGroup    client group data json:{"title": "New clientGroup"}
     * @throws  InsalesApiException
     * @group   clientGroup
     *
     * @return Response
     */
    public function clientGroupUpdate($clientGroupId, $clientGroup)
    {
        if (empty($clientGroupId)) {
            throw new InsalesApiException("Client group id must be set");
        }

        $url = sprintf('/admin/client_groups/%s.json', $clientGroupId);
        $parameters = array('client_group' => $clientGroup);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }

    /**
     * Delete client group
     *
     * @link    http://api.insales.ru/?doc_format=JSON#clientgroup-destroy-client-group-json
     * @param   int $clientGroupId client group id
     * @throws  InsalesApiException
     * @group   clientGroup
     *
     * @return Response
     */
    public function clientGroupDelete($clientGroupId)
    {
        if (empty($clientGroupId)) {
            throw new InsalesApiException("Client group id must be set");
        }

        $url = sprintf('/admin/client_groups/%s.json', $clientGroupId);

        return $this->client->makeRequest($url, Request::METHOD_DELETE);
    }

    /**
     * Get transaction for client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#bonussystemtransaction-get-transaction-for-client-json
     * @param   int $bonusSystemTransactionsId bonus transaction id
     * @throws  InsalesApiException
     * @group   bonusSystemTransactions
     *
     * @return Response
     */
    public function bonusSystemTransactionGet($bonusSystemTransactionsId)
    {
        if (empty($bonusSystemTransactionsId)) {
            throw new InsalesApiException("Bonus system transaction id must be set");
        }

        $url = sprintf('/admin/bonus_system_transactions/%s.json', $bonusSystemTransactionsId);;

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get transactions for client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#bonussystemtransaction-get-transactions-for-client-json
     * @param   int $clientId client id
     * @throws  InsalesApiException
     * @group   bonusSystemTransactionsClient
     *
     * @return Response
     */
    public function bonusSystemTransactionsClientGet($clientId)
    {
        if (empty($clientId)) {
            throw new InsalesApiException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s/bonus_system_transactions.json', $clientId);;

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create transaction for client
     *
     * @link    http://api.insales.ru/?doc_format=JSON#bonussystemtransaction-create-transaction-for-client-json
     * @param   int   $clientId       client id
     * @param   array $transaction    transaction data json:{"bonus_points": 100}
     * @throws  InsalesApiException
     * @group   bonusSystemTransactionsClient
     *
     * @return Response
     */
    public function bonusSystemTransactionsClientCreate($clientId, $transaction)
    {
        if (empty($clientId)) {
            throw new InsalesApiException("Client id must be set");
        }

        $url = sprintf('/admin/clients/%s/bonus_system_transactions.json', $clientId);;
        $parameters = array('bonus_system_transaction' => $transaction);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Get stock currencies
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-get-stock-currencies-json
     * @group   currency
     *
     * @return Response
     */
    public function currenciesList()
    {
        $url = '/admin/stock_currencies.json';

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Get stock currency
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-get-stock-currency-json
     * @param   int $currencyId currency id
     * @throws  InsalesApiException
     * @group   currency
     *
     * @return Response
     */
    public function currencyGet($currencyId)
    {
        if (empty($currencyId)) {
            throw new InsalesApiException("Currency id must be set");
        }

        $url = sprintf('/admin/stock_currencies/%s.json', $currencyId);

        return $this->client->makeRequest($url, Request::METHOD_GET);
    }

    /**
     * Create stock currency
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-create-stock-currency-json
     * @param   array $currency currency data json:{"code": "BYR"}
     * @group   currency
     *
     * @return Response
     */
    public function currencyCreate($currency)
    {
        $url = '/admin/stock_currencies.json';
        $parameters = array('stock_currency' => $currency);

        return $this->client->makeRequest($url, Request::METHOD_POST, $parameters);
    }

    /**
     * Update stock currency
     *
     * @link    http://api.insales.ru/?doc_format=JSON#stock-currency-update-stock-currency-json
     * @param   int   $currencyId currency id
     * @param   array $currency   currency data json:{"code": "BYR"}
     * @throws  InsalesApiException
     * @group   currency
     *
     * @return Response
     */
    public function currencyUpdate($currencyId, $currency)
    {
        if (empty($currencyId)) {
            throw new InsalesApiException("Currency id must be set");
        }

        $url = sprintf('/admin/stock_currencies/%s.json', $currencyId);
        $parameters = array('stock_currency' => $currency);

        return $this->client->makeRequest($url, Request::METHOD_PUT, $parameters);
    }
}
