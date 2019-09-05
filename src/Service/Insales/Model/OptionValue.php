<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Insales\Model;

use JMS\Serializer\Annotation as JMS;
use Er1z\FakeMock\Annotations\FakeMock as FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField as FakeMockField;
use SaaS\Service\Insales\Model\Traits;

/**
 * Class OptionValue
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OptionValue
{
    use Traits\Id;
    use Traits\Title;
    use Traits\Position;

    /**
     * @var int|null $optionNameId
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("option_name_id")
     *
     * @FakeMockField(faker="randomNumber")
     */
    protected $optionNameId;

    /**
     * @return int|null
     */
    public function getOptionNameId(): ?int
    {
        return $this->optionNameId;
    }

    /**
     * @param int|null $optionNameId
     */
    public function setOptionNameId(?int $optionNameId): void
    {
        $this->optionNameId = $optionNameId;
    }
}
