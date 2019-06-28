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
     * Html or javascript code of widget
     *
     * @var string $code
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     *
     * @FakeMockField()
     */
    public $code;

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
    public $height;

    /**
     * Product or order
     *
     * @var string $pageType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("page_type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"order", "product"}})
     */
    public $pageType;
}
