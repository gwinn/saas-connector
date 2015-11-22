<?php

namespace SaaS\Connector\Tests\EcwidClient;

use SaaS\Connector\Test\TestCase;

class OrdersTest extends TestCase
{
    /**
     * @group ecwid
     */
    public function testIsInstanceCorrect()
    {
        $client = static::getEcwidClient();
        $this->assertInstanceOf('SaaS\Connector\Client\EcwidClient', $client);
    }
}
