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
use SaaS\Service\Insales\Model\ApplicationAction;

/**
 * Class ApplicationActionRequest
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ApplicationActionRequest
{
    /**
     * @var ApplicationAction $applicationAction
     *
     * @JMS\Type("SaaS\Service\Insales\Model\ApplicationAction")
     * @JMS\SerializedName("application_action")
     *
     * @FakeMockField()
     */
    protected $applicationAction;

    /**
     * ApplicationActionRequest constructor.
     *
     * @param ApplicationAction|null $applicationAction
     */
    public function __construct(?ApplicationAction $applicationAction = null)
    {
        if ($applicationAction === null) {
            $applicationAction = new ApplicationAction();
        }

        $this->applicationAction = $applicationAction;
    }

    /**
     * @return ApplicationAction
     */
    public function getApplicationAction(): ApplicationAction
    {
        return $this->applicationAction;
    }

    /**
     * @param ApplicationAction $applicationAction
     */
    public function setApplicationAction(ApplicationAction $applicationAction): void
    {
        $this->applicationAction = $applicationAction;
    }
}
