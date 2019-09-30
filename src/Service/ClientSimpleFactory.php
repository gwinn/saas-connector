<?php
/**
 * PHP version 7.1
 *
 * @category ClientSimpleFactory
 * @package  Service
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace SaaS\Service;

use SaaS\Service\Boxberry\Client;

/**
 * Class ClientSimpleFactory
 *
 * @category ClientSimpleFactory
 * @package  Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientSimpleFactory
{
    /**
     * @var array
     */
    protected $arguments;

    /**
     * ClientSimpleFactory constructor.
     *
     * @param mixed ...$arguments
     */
    public function __construct(...$arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @return \SaaS\Service\Boxberry\Client
     */
    public function getBoxberryApiClient(): Client
    {
        return new Client(...$this->arguments);
    }
}
