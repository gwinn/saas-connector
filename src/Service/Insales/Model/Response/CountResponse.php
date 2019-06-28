<?php
/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model\Response;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;

/**
 * Class CountResponse
 *
 * @package  SaaS\Service\Insales\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class CountResponse
{
    /**
     * @var int $count
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("count")
     *
     * @FakeMockField()
     */
    public $count;
}
