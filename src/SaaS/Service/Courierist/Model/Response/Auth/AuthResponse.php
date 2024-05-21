<?php

namespace SaaS\Service\Courierist\Model\Response\Auth;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AuthResponse
 *
 * @category Models
 *
 */

class AuthResponse
{
    /**
     * Access token
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("access_token")
     */
    public $accessToken;
}