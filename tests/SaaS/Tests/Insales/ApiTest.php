<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Tests\Insales;

use SaaS\Test\TestCase;
use SaaS\Service\Insales\Api;

/**
 * Class ApiTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiTest extends TestCase
{
    /**
     * Test successfull Api client init
     *
     * @group insales
     *
     * @return void
     */
    public function testConstruct()
    {
        $client = static::getInsalesApiClient();
        $this->assertInstanceOf('SaaS\Service\Insales\Api', $client);
    }

    /**
     * Test unsuccessfull Api client init
     *
     * @group insales
     *
     * @return void
     */
    public function testConstructWithThrowException()
    {
        try {
            $client = new Api();
            $client->getCategories();
        } catch (\Exception $e) {
            $this->assertRegExp('/Missing argument/', $e->getMessage());
            return;
        }
    }

    /**
     * Test limit for the number of requests to the API
     *
     * @group insales
     * @expectedException \SaaS\Exception\InsalesLimitException
     */
    public function testLimitRequest()
    {
        $client = static::getInsalesApiClient();

        for ($i = 1; $i <= 502; $i++) {
            $client->categoriesList();
        }
    }
}
