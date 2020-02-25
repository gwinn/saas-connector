<?php

/**
 * PHP version 7.1
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
namespace SaaS\Service\Dellin\Model\Response\Calculator;

use Er1z\FakeMock\Annotations\FakeMock;
use Er1z\FakeMock\Annotations\FakeMockField;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class InsuranceComponents
 *
 * @package  SaaS\Service\Dellin\Model\Response\Calculator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @FakeMock()
 */
class InsuranceComponents
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("cargo_insurance")
     *
     * @FakeMockField(value="50.0")
     */
    public $cargoInsurance;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("term_insurance")
     *
     * @FakeMockField(value="300.0")
     */
    public $termInsurance;
}
