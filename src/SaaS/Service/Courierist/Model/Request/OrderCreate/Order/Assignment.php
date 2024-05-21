<?php

namespace SaaS\Service\Courierist\Model\Request\OrderCreate\Order;

use SaaS\Service\Courierist\Model\Request\Traits\AssignmentTrait;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Assignment
 *
 * @category Models
 *
 */
class Assignment
{
    use AssignmentTrait;
    /**
     * Название
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Комментарий для указания пояснения поручения
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("comment")
     */
    public $comment;

    /**
     * Поручение обязательно, если сумма выкупа при доставке
     * составила менее указанной суммыя
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("required_min_sum")
     */
    public $requiredMinSum;

    /**
     * Поручение обязательно, если
     * от всех грузов отказались
     *
     * @var bool
     *
     * @JMS\Type("boolean")
     * @JMS\SerializedName("is_required_on_cancel")
     */
    public $isRequiredOnCancel;

    /**
     * Ставка НДС:
     * 0 = НДС 0%
     * 10 = НДС 10%
     * 20 = НДС 30%
     * null = НДС не облагается
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("tax_rate")
     */
    public $taxRate;
}