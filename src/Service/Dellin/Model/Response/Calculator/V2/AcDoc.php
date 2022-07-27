<?php

namespace SaaS\Service\Dellin\Model\Response\Calculator\V2;

use JMS\Serializer\Annotation as Serializer;

class AcDoc
{
    /**
     * Информация о стоимости отправки сопроводительных документов
     *
     * @var CostsCalculation
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\CostsCalculation")
     * @Serializer\SerializedName("send")
     */
    public $send;

    /**
     * Информация о стоимости возврата сопроводительных документов
     *
     * @var CostsCalculation
     *
     * @Serializer\Type("SaaS\Service\Dellin\Model\Response\Calculator\V2\CostsCalculation")
     * @Serializer\SerializedName("return")
     */
    public $return;
}
