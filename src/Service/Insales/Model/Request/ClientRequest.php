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
use SaaS\Service\Insales\Model\Client;

/**
 * Class ClientRequest
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ClientRequest
{
    /**
     * @var Client $client
     *
     * @JMS\Type("SaaS\Service\Insales\Model\Client")
     * @JMS\SerializedName("client")
     *
     * @FakeMockField()
     */
    protected $client;

    /**
     * ClientRequest constructor.
     *
     * @param Client|null $client
     */
    public function __construct(?Client $client = null)
    {
        if ($client === null) {
            $client = new Client();
        }

        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }
}
