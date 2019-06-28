<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Traits;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use SaaS\Service\Insales\Model;
use SaaS\Service\Insales\Model\Response;
use SaaS\Service\Insales\Model\Request;
use SaaS\Service\Insales\Exception;

/**
 * Class Product
 *
 * @package  SaaS\Service\Insales\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait Product
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get products list
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-products-json
     * @group   products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productsList()
    {
        $url = '/admin/products.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Product::class)
        );
    }

    /**
     * Get products count
     *
     * @link  http://api.insales.ru/?doc_format=JSON#product-get-products-count-json
     * @group products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productsCount()
    {
        $url = '/admin/products/count.json';

        return new Response\Response($this->client->get($url), Model\Response\CountResponse::class);
    }

    /**
     * Get product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-get-product-json
     * @group   products
     *
     * @param $productId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productGet($productId)
    {
        $url = sprintf('/admin/products/%s.json', $productId);

        return new Response\Response($this->client->get($url), Model\Product::class);
    }

    /**
     * Create product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-create-product-line-by-product-id-json
     * @link    http://api.insales.ru/?doc_format=JSON#product-create-product-line-by-variant-id-json
     * @param   Request\ProductRequest $request product data
     * @group   products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productCreate(Request\ProductRequest $request)
    {
        $url = '/admin/products.json';
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->post($url, $options), Model\Product::class);
    }

    /**
     * Update product
     *
     * @link    http://api.insales.ru/?doc_format=JSON#product-update-product-json
     * @param   Request\ProductRequest $request product data
     * @group   products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productUpdate(Request\ProductRequest $request)
    {
        $url = sprintf('/admin/products/%s.json', $request->product->id);
        $options = ['body' => $this->serializer->serialize($request, 'json')];

        return new Response\Response($this->client->put($url, $options), Model\Product::class);
    }

    /**
     * Delete product
     *
     * @link  http://api.insales.ru/?doc_format=JSON#product-destroy-product-json
     * @param $productId
     * @group products
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function productDelete($productId)
    {
        $url = sprintf('/admin/products/%s.json', $productId);

        return new Response\Response($this->client->delete($url), Response\StatusResponse::class);
    }
}
