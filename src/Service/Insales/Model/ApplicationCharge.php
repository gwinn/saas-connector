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
 * Class ApplicationCharge
 *
 * @package  SaaS\Service\Insales\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class ApplicationCharge
{
    use Traits\Id;
    use Traits\CreatedAt;
    use Traits\UpdatedAt;
    use Traits\Name;

    /**
     * Url for notification about payment
     *
     * @var string|null $returnUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("return_url")
     *
     * @FakeMockField(faker="url")
     */
    protected $returnUrl;

    /**
     * @var string|null $confirmationUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("confirmation_url")
     *
     * @FakeMockField(faker="url")
     */
    protected $confirmationUrl;

    /**
     * Bill amount
     *
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     *
     * @FakeMockField()
     */
    protected $price;

    /**
     * @var string|null $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     *
     * @FakeMockField(faker="randomElement", arguments={{"declined", "pending"}})
     */
    protected $status;

    /**
     * Flag for debugging purpose; if true, bill can be confirmed without payment; false by default
     *
     * @var bool|null $test
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("test")
     *
     * @FakeMockField(value="true")
     */
    protected $test;

    /**
     * @return null|string
     */
    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    /**
     * @param null|string $returnUrl
     */
    public function setReturnUrl(?string $returnUrl): void
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return null|string
     */
    public function getConfirmationUrl(): ?string
    {
        return $this->confirmationUrl;
    }

    /**
     * @param null|string $confirmationUrl
     */
    public function setConfirmationUrl(?string $confirmationUrl): void
    {
        $this->confirmationUrl = $confirmationUrl;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * @param bool|null $test
     */
    public function setTest(?bool $test): void
    {
        $this->test = $test;
    }
}
