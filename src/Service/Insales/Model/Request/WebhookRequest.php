<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Request;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;
use SaaS\Service\Insales\Model\Webhook;

/**
 * Class WebhookRequest
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class WebhookRequest
{
    /**
     * @var Webhook $webhook
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Webhook")
     * @JMS\SerializedName("webhook")
     * @JMS\Groups({"create"})
     *
     * @FakeMockField()
     */
    public $webhook;

    public function __construct($webhook = null)
    {
        $this->setObject(Webhook::class, 'webhook', $webhook);
    }

    protected function setObject($className, $field, $value = null)
    {
        if ($value === null) {
            $value = new $className();
        }

        $this->$field = $value;
    }
}
