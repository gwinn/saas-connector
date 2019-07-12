<?php

/**
 * PHP version 7.1
 *
 * @package SaaS\Service\Insales\Traits
 * @author  RetailDriver LLC <integration@retailcrm.ru>
 * @license https://retailcrm.ru Proprietary
 * @link    http://retailcrm.ru
 * @see     https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Traits;

use GuzzleHttp;
use JMS\Serializer\Serializer;
use SaaS\Service\Insales\Model;
use SaaS\Service\Insales\Model\Response;
use SaaS\Service\Insales\Exception;

/**
 * Class Category
 *
 * @package SaaS\Service\Insales\Traits
 * @author  RetailDriver LLC <integration@retailcrm.ru>
 * @license https://retailcrm.ru Proprietary
 * @link    http://retailcrm.ru
 * @see     https://help.retailcrm.ru
 */
trait Category
{
    /* @var GuzzleHttp\Client $client */
    protected $client;

    /* @var Serializer $serializer */
    protected $serializer;

    /**
     * Get categories list
     *
     * @link  http://api.insales.ru/?doc_format=JSON#category-get-categories-json
     * @group categories
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function categoriesList()
    {
        $url = '/admin/categories.json';

        return new Response\Response(
            $this->client->get($url),
            sprintf('array<%s>', Model\Category::class)
        );
    }

    /**
     * Get category
     *
     * @link  http://api.insales.ru/?doc_format=JSON#category-get-category-json
     * @group categories
     *
     * @param string $categoryId
     *
     * @return Response\Response
     * @throws Exception\InsalesLimitException
     */
    public function categoryGet($categoryId)
    {
        $url = sprintf('/admin/categories/%s.json', $categoryId);

        return new Response\Response($this->client->get($url), Model\Category::class);
    }
}
