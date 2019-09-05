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
    protected $webhook;

    /**
     * WebhookRequest constructor.
     *
     * @param Webhook|null $webhook
     */
    public function __construct(?Webhook $webhook = null)
    {
        if ($webhook === null) {
            $webhook = new Webhook();
        }

        $this->webhook = $webhook;
    }

    /**
     * @return Webhook
     */
    public function getWebhook(): Webhook
    {
        return $this->webhook;
    }

    /**
     * @param Webhook $webhook
     */
    public function setWebhook(Webhook $webhook): void
    {
        $this->webhook = $webhook;
    }
}
