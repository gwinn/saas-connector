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
 * Class ApplicationWidget
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ApplicationWidget
{
    use Traits\Id;
    use Traits\CreatedAt;

    /**
     * Html or javascript code of widget
     *
     * @var string|null $code
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     *
     * @FakeMockField()
     */
    protected $code;

    /**
     * Height of iframe block
     *
     * @var int $height
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("height")
     *
     * @FakeMockField()
     */
    protected $height;

    /**
     * Product or order
     *
     * @var string|null $pageType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("page_type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"order", "product"}})
     */
    protected $pageType;

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return null|string
     */
    public function getPageType(): ?string
    {
        return $this->pageType;
    }

    /**
     * @param null|string $pageType
     */
    public function setPageType(?string $pageType): void
    {
        $this->pageType = $pageType;
    }
}
