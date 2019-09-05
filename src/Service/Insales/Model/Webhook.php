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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Webhook
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class Webhook
{
    use Traits\Id;
    use Traits\CreatedAt;

    const FORMAT_TYPE_JSON = 'json';
    const FORMAT_TYPE_XML = 'xml';

    const TOPIC_ORDERS_CREATE = 'orders/create';
    const TOPIC_ORDERS_UPDATE = 'orders/update';

    /**
     * @var string|null $address
     *
     * @Assert\NotBlank(groups={"create"})
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     * @JMS\Groups({"create"})
     *
     * @FakeMockField(faker="url")
     */
    protected $address;

    /**
     * For now only 'orders/update' and 'orders/create' are available
     *
     * @var string|null $topic
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("topic")
     * @JMS\Groups({"create"})
     *
     * @FakeMockField(faker="randomElement", arguments={{"orders/update", "orders/create"}})
     */
    protected $topic;

    /**
     * Format of data sent by webhook: 'json' or 'xml'
     *
     * @var string|null $formatType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("format_type")
     * @JMS\Groups({"create"})
     *
     * @FakeMockField(faker="randomElement", arguments={{"json", "xml"}})
     */
    protected $formatType = self::FORMAT_TYPE_JSON;

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return null|string
     */
    public function getTopic(): ?string
    {
        return $this->topic;
    }

    /**
     * @param null|string $topic
     */
    public function setTopic(?string $topic): void
    {
        $this->topic = $topic;
    }

    /**
     * @return null|string
     */
    public function getFormatType(): ?string
    {
        return $this->formatType;
    }

    /**
     * @param null|string $formatType
     */
    public function setFormatType(?string $formatType): void
    {
        $this->formatType = $formatType;
    }
}
