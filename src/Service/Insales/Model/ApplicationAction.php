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
    use Traits\Id;
    use Traits\Title;
    use Traits\Handle;

    /**
     * URL to which POST request with serialized entities will be made
     *
     * @var string|null $url
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     *
     * @FakeMockField()
     */
    protected $url;

    /**
     * Defines entity that action belongs to: order, product, client, discount_code, file, page, article, collection_filter
     *
     * @var string|null $entity
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("entity")
     *
     * @FakeMockField(
     *     faker="randomElement",
     *     arguments={{"order", "product", "client", "discount_code", "file", "page", "article", "collection_filter"}}
     * )
     */
    protected $entity;

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return null|string
     */
    public function getEntity(): ?string
    {
        return $this->entity;
    }

    /**
     * @param null|string $entity
     */
    public function setEntity(?string $entity): void
    {
        $this->entity = $entity;
    }
}
