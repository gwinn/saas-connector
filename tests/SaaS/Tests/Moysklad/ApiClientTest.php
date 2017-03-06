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
 * Class ApiClientTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Moysklad
 * @author   Andrey Artahanov <azgalot9@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      https://online.moysklad.ru/api/remap/1.1/doc/index.html
 */
class ApiClientTest extends TestCase
{
    /**
     * Provider for exception get request tests
     *
     * @group moysklad
     *
     * @return array
     */
    public function providerGetException()
    {
        return array(
            'invalid type' => array(
                array(
                    array('counterparty'),
                    '00000000-0000-0000-0000-000000000000'
                )
            ),
            'invalid uuid' => array(
                array(
                    'counterparty',
                    array('10000000-0000-0000-0000-000000000000')
                )
            ),
            'empty param' => array(
                null
            ),
            'undefined type' => array(
                array('foo')
            ),
            'wrong uuid' => array(
                array('counterparty', '123')
            ),
            'wrong filters' => array(
                array('counterparty', '00000000-0000-0000-0000-000000000000'),
                array('foo' => 1)
            ),
            'wrong main attributes' => array(
                array(
                    'counterparty',
                    '00000000-0000-0000-0000-000000000000',
                    'foo'
                )
            ),
            'invalid main attributes' => array(
                array(
                    'counterparty',
                    '00000000-0000-0000-0000-000000000000',
                    array('metadata')
                )
            ),
            'wrong second attributes' => array(
                array(
                    'counterparty',
                    '00000000-0000-0000-0000-000000000000',
                    'foo',
                    '00000000-0000-0000-0000-000000000000'
                )
            ),
            'too many attributes' => array(
                array(
                    'counterparty',
                    '00000000-0000-0000-0000-000000000000',
                    'foo',
                    '00000000-0000-0000-0000-000000000000',
                    'bar'
                )
            ),
            'wrong params type' => array(
                'counterparty'
            ),
            'wrong filters type' => array(
                array('counterparty'),
                'limit'
            )
        );
    }

    /**
     * Provider for exception create request tests
     *
     * @group moysklad
     *
     * @return array
     */
    public function providerCreateException()
    {
        return array(
            'null all' => array(
                null,
                null
            ),
            'null data' => array(
                'store',
                null
            ),
            'empty data' => array(
                'store',
                array()
            ),
            'wrong data type' => array(
                'store',
                'test-warehouse'
            ),
            'wrong param type' => array(
                'bar',
                array(
                    'name' => 'test-warehouse'
                )
            ),
            'invalid param type' => array(
                array('store'),
                array(
                    'name' => 'test-warehouse'
                )
            ),
            'wrong type object param' => array(
                array(
                    'bar',
                    '00000000-0000-0000-0000-000000000000'
                ),
                array(
                    'name' => 'test-warehouse'
                )
            ),
            'null type object param' => array(
                array(
                    null,
                    '00000000-0000-0000-0000-000000000000'
                ),
                array(
                    'name' => 'test-warehouse'
                )
            ),
            'empty type object param' => array(
                array(
                    array(),
                    '00000000-0000-0000-0000-000000000000'
                ),
                array(
                    'name' => 'test-warehouse'
                )
            ),
            'wrong uuid param' => array(
                array(
                    'store',
                    '123'
                ),
                array(
                    'name' => 'test-warehouse'
                )
            ),
            'invalid uuid param' => array(
                array(
                    'store',
                    array('00000000-0000-0000-0000-000000000000')
                ),
                array(
                    'name' => 'test-warehouse'
                )
            )
        );
    }

    /**
     * Provider for exception update request tests
     *
     * @group moysklad
     *
     * @return array
     */
    public function providerUpdateException()
    {
        return array(
            'null all' => array(
                null,
                null,
                null
            ),
            'wrong type' => array(
                'foo',
                null,
                null
            ),
            'empty type' => array(
                array(),
                null,
                null
            ),
            'invalid type' => array(
                array('store'),
                null,
                null
            ),
            'invalid uuid' => array(
                'store',
                '123',
                null
            ),
            'wrong uuid' => array(
                'store',
                array('00000000-0000-0000-0000-000000000000'),
                null
            ),
            'null data' => array(
                'store',
                '00000000-0000-0000-0000-000000000000',
                null
            ),
            'empty data' => array(
                'store',
                '00000000-0000-0000-0000-000000000000',
                array()
            ),
            'invalid data' => array(
                'store',
                '00000000-0000-0000-0000-000000000000',
                'foo'
            )
        );
    }

    /**
     * Provider for exception delete request tests
     *
     * @group moysklad
     *
     * @return array
     */
    public function providerDeleteException()
    {
        return array(
            'null all' => array(
                null,
                null
            ),
            'wrong type' => array(
                'foo',
                null
            ),
            'empty type' => array(
                array(),
                null
            ),
            'invalid type' => array(
                array('store'),
                null
            ),
            'invalid uuid' => array(
                'store',
                '123'
            ),
            'wrong uuid' => array(
                'store',
                array('00000000-0000-0000-0000-000000000000')
            )
        );
    }

    /**
     * Test successfull Api client init
     *
     * @group moysklad
     *
     * @return void
     */
    public function testConstruct()
    {
        $client = static::getMoyskladApiClient();
        static::assertInstanceOf('SaaS\Service\Moysklad\Api', $client);
    }

    /**
     * Test unsuccessfull Api client init
     *
     * @group moysklad
     *
     * @return void
     */
    public function testConstructWithThrowException()
    {
        $this->setExpectedException(get_class(new MoySkladException()));

        $client = static::getMoyskladApiClient('aa', 'aa');

        $client->getData(array('productFolder'));
    }

    /**
     * Test get document exception
     *
     * @group moysklad
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerGetException
     * @param array $param
     * @param array $filter
     *
     * @return void
     */
    public function testGetException($param, $filter = null)
    {
        $client = static::getMoyskladApiClient();

        $client->getData($param, $filter);
    }

    /**
     * Test get document exception
     *
     * @group moysklad
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerCreateException
     * @param mixed $param
     * @param array $data
     *
     * @return void
     */
    public function testCreateException($param, $data)
    {
        $client = static::getMoyskladApiClient();

        $client->createData($param, $data);
    }

    /**
     * Test update document exception
     *
     * @group moysklad
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerUpdateException
     * @param string $type
     * @param string $uuid
     * @param array $data
     *
     * @return void
     */
    public function testUpdateException($type, $uuid, $data)
    {
        $client = static::getMoyskladApiClient();

        $client->updateData($type, $uuid, $data);
    }

    /**
     * Test delete document exception
     *
     * @group moysklad
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerDeleteException
     * @param string $type
     * @param string $uuid
     *
     * @return void
     */
    public function testDeleteException($type, $uuid)
    {
        $client = static::getMoyskladApiClient();

        $client->deleteData($type, $uuid);
    }

    /**
     * Test api request
     *
     * @group moysklad
     *
     * @return void
     */
    public function testApiRequest()
    {
        $client = static::getMoyskladApiClient();

        $response = $client->getData(array('store'));

        static::checkResponse($response);
    }
}
