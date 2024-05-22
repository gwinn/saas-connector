<?php

namespace SaaS\Service\Courierist\Model\Request\Auth;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Request\RequestModel;

/**
 * Class AuthRequest
 *
 * @category Models
 *
 */
class AuthRequest implements RequestModel
{
    /**
     * Логин
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("login")
     */
    public $login;

    /**
     * Пароль
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("password")
     */
    public $password;
}