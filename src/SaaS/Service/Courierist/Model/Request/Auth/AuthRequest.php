<?php

namespace SaaS\Service\Courierist\Model\Request\Auth;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AuthRequest
 *
 * @category Models
 *
 */
class AuthRequest
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