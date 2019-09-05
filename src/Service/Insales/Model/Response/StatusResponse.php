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
 * Class StatusResponse
 *
 * @package  SaaS\Service\Insales\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class StatusResponse
{
    /**
     * @var string|null $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     *
     * @FakeMockField(value="ok")
     */
    public $status;
}
