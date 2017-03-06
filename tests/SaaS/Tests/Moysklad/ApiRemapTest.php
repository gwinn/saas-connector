<?php

/**
 * PHP version 5.3
 *
 * @category ApiClient
 * @package  SaaS\Tests\Moysklad
 * @author   Andrey Artahanov <azgalot9@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://online.moysklad.ru/api/remap/1.1/doc/index.html
 */

namespace src\SaaS\Tests\Moysklad;

use SaaS\Test\TestCase;
use SaaS\Exception\MoySkladException;

/**
 * Class ApiRemapTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Moysklad
 * @author   Andrey Artahanov <azgalot9@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://online.moysklad.ru/api/remap/1.1/doc/index.html
 */
class ApiRemapTest extends TestCase
{
    /**
     * Entity mapping
     *
     * @var entity
     * @access protected
     */
    protected static $entity = array();

    /**
     * Setup properties
     *
     * @access public
     * @throws MoySkladException
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        $remap_api_resourse = fopen('https://online.moysklad.ru/api/remap/1.1/doc/index.html', 'r');

        while (($buffer = fgets($remap_api_resourse, 4096)) !== false) {
            if (preg_match_all('#<code class="uri">/([a-z]+)/([a-z]+)#', $buffer, $array)) {
                self::$entity[$array[2][0]] = $array[1][0];
            }
        }

        if (!feof($remap_api_resourse)) {
            throw new MoySkladException('JSON API documentation of service `MoySklad` is not available!');
        }
        
        fclose($remap_api_resourse);

        if (empty(self::$entity)) {
            throw new MoySkladException('Entity map is empty!');
        }
    }
    
    /**
     * Provider for api remap tests
     *
     * @group moysklad
     *
     * @throw MoySkladException
     *
     * @return array
     */
    public function providerApiRemap()
    {
        $client = static::getMoyskladApiClient();

        $entity = $client->entity;

        array_walk($entity, function (&$value, $key) {
            $value = array($key, $value);
        });

        return $entity;
    }

    /**
     * Test api remap
     *
     * @group moysklad
     *
     * @dataProvider providerApiRemap
     * @param string $param
     * @param string $entity
     *
     * @return void
     */
    public function testApiRemap($param, $entity)
    {
        static::assertArrayHasKey($param, self::$entity);

        static::assertContains($entity, self::$entity[$param]);
    }
}
