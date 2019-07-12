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
 * Class ApplicationAction
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ApplicationAction
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
     * Title to show in backoffice
     *
     * @var string $title
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("title")
     *
     * @FakeMockField()
     */
    public $title;

    /**
     * URL to which POST request with serialized entities will be made
     *
     * @var string $url
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     *
     * @FakeMockField()
     */
    public $url;

    /**
     * Unique string identifier
     *
     * @var string $handle
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("handle")
     *
     * @FakeMockField(faker="words", arguments={1, true})
     */
    public $handle;

    /**
     * Defines entity that action belongs to: order, product, client, discount_code, file, page, article, collection_filter
     *
     * @var string $entity
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("entity")
     *
     * @FakeMockField(
     *     faker="randomElement",
     *     arguments={{"order", "product", "client", "discount_code", "file", "page", "article", "collection_filter"}}
     * )
     */
    public $entity;
}
