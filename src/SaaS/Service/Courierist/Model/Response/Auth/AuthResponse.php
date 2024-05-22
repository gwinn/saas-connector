<?php

namespace SaaS\Service\Courierist\Model\Response\Auth;

use JMS\Serializer\Annotation as JMS;
use SaaS\Service\Courierist\Model\Response\ResponseModel;

/**
 * Class AuthResponse
 *
 * @category Models
 *
 */

class AuthResponse implements ResponseModel
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