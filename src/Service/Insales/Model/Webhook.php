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
    const FORMAT_TYPE_JSON = 'json';
    const FORMAT_TYPE_XML = 'xml';

    const TOPIC_ORDERS_CREATE = 'orders/create';
    const TOPIC_ORDERS_UPDATE = 'orders/update';

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
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     *
     * @FakeMockField(faker="url")
     */
    public $address;

    /**
     * For now only 'orders/update' and 'orders/create' are available
     *
     * @var string $topic
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("topic")
     *
     * @FakeMockField(faker="randomElement", arguments={{"orders/update", "orders/create"}})
     */
    public $topic;

    /**
     * Format of data sent by webhook: 'json' or 'xml'
     *
     * @var string $formatType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("format_type")
     *
     * @FakeMockField(faker="randomElement", arguments={{"json", "xml"}})
     */
    public $formatType;
}
