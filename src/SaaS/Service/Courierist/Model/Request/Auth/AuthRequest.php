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
     * @JSM\Type("string")
     * @JMS\SerializedName("login")
     */
    public $login;

    /**
     * Пароль
     *
     * @var string
     *
     * @JSM\Type("string")
     * @JMS\SerializedName("password")
     */
    public $password;
}