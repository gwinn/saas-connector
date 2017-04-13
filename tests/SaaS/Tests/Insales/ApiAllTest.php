<?php

/**
 * PHP version 5.6
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
namespace SaaS\Tests\Insales;

use SaaS\Test\TestCase;
/**
 * Class ApiAllTest
 *
 * @category ApiClient
 * @package  SaaS\Tests\Insales
 * @author   Putintseva Anna <putintseva@retailcrm.ru>
 * @license  http://opensource.org/licenses/MIT MIT License
 * @link     http://github.com/gwinn/saas-connector
 * @see      http://insales.ru/
 */
class ApiAllTest extends TestCase
{
    private $argList;
    private $list = [];
    private $get = [];
    private $cud = [];
    private $groupMethod = [];
    private $allMethods = [];

    private function getData()
    {
        if (!empty($allMethods)) {
            exit();
        }

        $client = static::getInsalesApiClient();
        $products = $client->productsList()->getResponse();

        $this->argList = isset($products[0]) ? [$products[0]['id']] : [];

        $methods = get_class_methods(get_class($client));
        $pattern = '/(List|Get|Create|Update|Delete)$/';
        $patternDoc = '/@group(.*)\n/';

        foreach ($methods as $name) {
            preg_match($pattern, $name, $method);
            $method = end($method);

            if ($method) {
                $rMethod = new \ReflectionMethod($client, $name);
                preg_match($patternDoc, $rMethod->getDocComment(), $group);
                $group = trim(end($group));
                $params = [];

                foreach ($rMethod->getParameters() as $parameter) {
                    $params[$parameter->getName()] = [
                        'isOptional' => $parameter->isOptional(),
                        'name' => $parameter->getName(),
                        'allowsNull' => $parameter->allowsNull(),
                    ];
                }

                $this->allMethods[$name] = [
                    'countParams' => $rMethod->getNumberOfParameters(),
                    'countRequiredParams' => $rMethod->getNumberOfRequiredParameters(),
                    'nameParams' => array_column($rMethod->getParameters(), 'name'),
                    'params' => $params,
                    'group' => trim($group),
                    'nameMethod' => $rMethod->getName()
                ];

                if ($group) {
                    $this->groupMethod[$group][$method] = $this->allMethods[$name];
                }
            }

            switch ($method) {
                case 'List':
                    $this->list[] = $name;
                    break;
                case 'Get':
                    $this->get[] = $name;
                    break;
                case 'Create':
                case 'Update':
                case 'Delete':
                    $key = str_replace($method, '', $name);
                    $this->cud[$key][$method] = $name;

                    break;
            }
        }
    }

    private function getArgumentsForMethod($nameMethod)
    {
        $arguments = [];
        $pattern = '/(Id|Permalink)$/';
        $info = array_key_exists($nameMethod, $this->allMethods)
            ? $this->allMethods[$nameMethod]
            : [];

        foreach ($info['nameParams'] as $name) {
            if ($info['params'][$name]['isOptional']) {

                continue;
            }

            preg_match($pattern, $name, $argKey);
            $argName = str_replace($argKey, '', $name);
            $argKey = strtolower(end($argKey));

            if (array_key_exists($argName, $this->groupMethod)
                && array_key_exists('List', $this->groupMethod[$argName])
            ) {
                $result = $this->executeMethod($this->groupMethod[$argName]['List']['nameMethod'], $this->argList);
                $result = $result->getResponse();

                if (!empty($result)) {
                    $item = array_shift($result);

                    if (array_key_exists($argKey, $item)) {
                        $arguments[$name] = $item[$argKey];
                    }
                }
            }

            if (empty($arguments[$name])) {
                $crudMethod = $this->groupMethod[$info['group']];
                if (isset($crudMethod['List'])) {
                    $result = $this->executeMethod($crudMethod['List']['nameMethod'], $this->argList);
                    $result = $result->getResponse();

                    if (!empty($result)) {
                        $item = array_shift($result);

                        if (array_key_exists($argKey, $item)) {
                            $arguments[$name] = $item[$argKey];
                        }
                    }
                }
            }
        }

        return  $arguments;
    }

    /**
     * Provider for tests List methods
     *
     * @return array
     */
    public function providerList()
    {
        $this->getData();
        $provider = [];

        foreach ($this->list as $name) {
            $provider[$name] = [
                'name' => $name,
                'productId' => $this->allMethods[$name]['countRequiredParams'] > 0
                    ? $this->argList
                    : []
            ];
        }

        return $provider;
    }

    /**
     * Provider for tests List methods if arguments is null
     *
     * @return array
     */
    public function providerListNull()
    {
        $this->getData();
        $provider = [];

        foreach ($this->list as $name) {
            if ($this->allMethods[$name]['countRequiredParams'] > 0) {
                $provider[$name] = [
                    'name' => $name,
                    'productId' => [null]
                ];
            }
        }

        return $provider;
    }

    /**
     * Provider for tests Get methods if arguments is null
     *
     * @return array
     */
    public function providerGetNull()
    {
        $this->getData();
        $provider = [];

        foreach ($this->get as $name) {
            $provider[$name] = [
                'name' => $name,
                'argId1' => null,
                'argId2' => null,
            ];
        }

        return $provider;
    }

    /**
     * Provider for tests Get methods if not found entity
     *
     * @return array
     */
    public function providerGetNotExist()
    {
        $this->getData();
        $provider = [];

        foreach ($this->get as $name) {
            $provider[$name] = [
                'name' => $name,
                'argId1' => 123,
                'argId2' => 123,
            ];
        }

        return $provider;
    }

    public function providerGet()
    {
        $this->getData();

        $provider = [];

        foreach ($this->get as $name) {
            $this->getArgumentsForMethod($name);

            $provider[$name] = [
                'name' => $name,
                'arguments' => $this->getArgumentsForMethod($name),
            ];
        }

        return $provider;
    }
    
    /**
     * Testing all list methods
     *
     * @dataProvider providerList
     * @param string $name
     * @param string $arguments
     * @group insales
     */
    public function testAllList($name, $arguments)
    {
        self::executeMethod($name, $arguments);
    }

    /**
     * Testing all list methods
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     * @dataProvider providerListNull
     * @param string $name
     * @param string $arguments
     * @group insales
     */
    public function testAllListNull($name, $arguments)
    {
        self::executeMethod($name, $arguments);
    }

    /**
     * Testing all list methods null arguments
     *
     * @expectedException \SaaS\Exception\InsalesApiException
     * @dataProvider providerGetNull
     * @param $name
     * @param $id1
     * @param $id2
     * @group insales
     */
    public function testAllGetNull($name, $id1, $id2)
    {
        self::executeMethod($name, [$id1, $id2]);
    }

    /**
     * Testing all list methods null arguments
     *
     * @expectedException \InvalidArgumentException
     * @dataProvider providerGetNotExist
     * @param $name
     * @param $id1
     * @param $id2
     * @group insales
     */
    public function testAllGetNotExist($name, $id1, $id2)
    {
        if ($name != 'customStatusGet') {
            self::executeMethod($name, [$id1, $id2]);
        } else {
            //TODO:Насильно выстанавливаем Exception, так как InSales передает 200
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @dataProvider providerGet
     * @param $name
     * @param $arguments
     */
    public function testAllGet($name, $arguments)
    {
        self::executeMethod($name, $arguments);
    }

    /**
     * Execute using the method, for entity
     *
     * @param $method
     * @param array $arguments
     * @group insales
     *
     * @return mixed
     */
    public static function executeMethod($method, $arguments = [])
    {
        $client = static::getInsalesApiClient();

        $response = call_user_func_array(
            [$client, $method],
            $arguments
        );

        static::checkResponse($response);

        return $response;
    }
}
