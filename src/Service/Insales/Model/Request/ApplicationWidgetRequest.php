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
use SaaS\Service\Insales\Model\ApplicationWidget;

/**
 * Class ApplicationWidgetRequest
 *
 * @package  SaaS\Service\Insales\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ApplicationWidgetRequest
{
    /**
     * @var ApplicationWidget $applicationWidget
     *
     * @JMS\Type("SaaS\Service\Insales\Model\ApplicationWidget")
     * @JMS\SerializedName("application_widget")
     *
     * @FakeMockField()
     */
    protected $applicationWidget;

    /**
     * ApplicationWidgetRequest constructor.
     *
     * @param ApplicationWidget|null $applicationWidget
     */
    public function __construct(?ApplicationWidget $applicationWidget = null)
    {
        if ($applicationWidget === null) {
            $applicationWidget = new ApplicationWidget();
        }

        $this->applicationWidget = $applicationWidget;
    }

    /**
     * @return ApplicationWidget
     */
    public function getApplicationWidget(): ApplicationWidget
    {
        return $this->applicationWidget;
    }

    /**
     * @param ApplicationWidget $applicationWidget
     */
    public function setApplicationWidget(ApplicationWidget $applicationWidget): void
    {
        $this->applicationWidget = $applicationWidget;
    }
}
