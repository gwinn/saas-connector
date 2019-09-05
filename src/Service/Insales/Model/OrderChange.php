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
 * Class OrderChange
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class OrderChange
{
    use Traits\Id;
    use Traits\CreatedAt;

    /**
     * @var string|null $action
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("action")
     *
     * @FakeMockField()
     */
    protected $action;

    /**
     * @var array|null $valueWas
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("value_was")
     *
     * @FakeMockField()
     */
    protected $valueWas;

    /**
     * @var array|null $valueIs
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("value_is")
     *
     * @FakeMockField()
     */
    protected $valueIs;

    /**
     * @var string|null $fullDescription
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_description")
     *
     * @FakeMockField()
     */
    protected $fullDescription;

    /**
     * @var string|null $userName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("user_name")
     *
     * @FakeMockField()
     */
    protected $userName;

    /**
     * @return null|string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param null|string $action
     */
    public function setAction(?string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return array|null
     */
    public function getValueWas(): ?array
    {
        return $this->valueWas;
    }

    /**
     * @param array|null $valueWas
     */
    public function setValueWas(?array $valueWas): void
    {
        $this->valueWas = $valueWas;
    }

    /**
     * @return array|null
     */
    public function getValueIs(): ?array
    {
        return $this->valueIs;
    }

    /**
     * @param array|null $valueIs
     */
    public function setValueIs(?array $valueIs): void
    {
        $this->valueIs = $valueIs;
    }

    /**
     * @return null|string
     */
    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    /**
     * @param null|string $fullDescription
     */
    public function setFullDescription(?string $fullDescription): void
    {
        $this->fullDescription = $fullDescription;
    }

    /**
     * @return null|string
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param null|string $userName
     */
    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }
}
