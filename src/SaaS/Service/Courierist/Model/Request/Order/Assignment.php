<?php

namespace SaaS\Service\Courierist\Model\Request\Order;

use SaaS\Service\Courierist\Model\Request\Traits\AssignmentTrait;

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
     * Имя
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("name")
     */
    public $name;

    /**
     * Комментарий для указания пояснения поручения
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("comment")
     */
    public $comment;

    /**
     * Поручение обязательно, если сумма выкупа при доставке
     * составила менее указанной суммыя
     *
     * @var float
     *
     * @JSM\Type("float")
     * @JMS\SerializedName("required_min_sum")
     */
    public $requiredMinSum;

    /**
     * Поручение обязательно, если
     * от всех грузов отказались
     *
     * @var bool
     *
     * @JSM\Type("boolean")
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
     * @JSM\Type("float")
     * @JMS\SerializedName("tax_rate")
     */
    public $taxRate;
}