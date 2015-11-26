<?php

namespace SaaS\Connector\Component\Ecwid;

use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Provider\AbstractProvider;

class EcwidOAuth2Provider extends AbstractProvider
{
    public function urlAuthorize()
    {
        return 'https://my.ecwid.com/api/oauth/authorize';
    }

    public function urlAccessToken()
    {
        return 'https://my.ecwid.com/api/oauth/token';
    }

    public function urlUserDetails(AccessToken $token) {}
    public function userDetails($response, AccessToken $token) {}
}
