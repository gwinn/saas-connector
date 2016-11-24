<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Inpost
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://wt.inpost.ru/
 */

namespace SaaS\Tests\Inpost;

use SaaS\Test\TestCase;

/**
 * Class ApiClientTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Inpost
 * @author   Alex Lushpai <lushpai@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://wt.inpost.ru/
 */
class ApiClientTest extends TestCase
{
    /**
     * Test successfull Api client init
     *
     * @group inpost
     *
     * @return void
     */
    public function testConstruct()
    {
        $client = static::getInpostApiClient();
        static::assertInstanceOf('SaaS\Service\Inpost\Api', $client);
    }

    /**
     * Test citilist
     *
     * @group inpost
     *
     * @return void
     */
    public function testCitiList()
    {
        $client = static::getInpostApiClient();
        $response = $client->cityList();
        static::checkResponse($response);
    }

    /**
     * Test parselStatus
     *
     * @group inpost
     *
     * @return void
     */
    public function testParselStatus()
    {
        $client = static::getInpostApiClient();
        $response = $client->parselStatus('5086');
        static::checkResponse($response);
    }

    /**
     * Test parselStatusException
     *
     * @group inpost
     *
     * @expectedException \InvalidArgumentException
     *
     * @return void
     */
    public function testParselStatusException()
    {
        $client = static::getInpostApiClient();
        $client->parselStatus(null);
    }

    /**
     * Test parselStatusesList
     *
     * @group inpost
     *
     * @return void
     */
    public function testParselStatusesList()
    {
        $client = static::getInpostApiClient();
        $response = $client->parselStatusesList();
        static::checkResponse($response);
    }

    /**
     * Test searchTerminal
     *
     * @group inpost
     *
     * @return void
     */
    public function testSearchTerminal()
    {
        $client = static::getInpostApiClient();
        $response = $client->searchTerminal(
            array(
                'postcode' => '344000',
            )
        );
        static::checkResponse($response);
    }

    /**
     * Test calc
     *
     * @group inpost
     *
     * @return void
     */
    public function testCalculate()
    {
        $client = static::getInpostApiClient();
        $response = $client->calculate(
            array(
                'key' => 'e388c1c5df4933fa01f6da9f9259558951cc134d50b4d',
                'city' => 'Москва',
                'city_from' => 'Ростов-на-Дону',
                'cost' => 3500,
            )
        );
        static::checkResponse($response);
    }

    /**
     * Test calcException
     *
     * @group inpost
     *
     * @expectedException \InvalidArgumentException
     *
     * @return void
     */
    public function testCalculateException()
    {
        $client = static::getInpostApiClient();
        $client->calculate(
            array(
                'key' => 'e388c1c5df4933fa01f6da9f9259558951cc134d50b4d'
            )
        );
    }
}
