<?php

namespace SaaS\Component\Ecwid;

use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Provider\AbstractProvider;

/**
 * Class EcwidOAuth2Provider
 *
 * @package SaaS\Component\Ecwid
 */
class EcwidOAuth2Provider extends AbstractProvider
{
    /**
     * @return string
     */
    public function urlAuthorize()
    {
        return 'https://my.ecwid.com/api/oauth/authorize';
    }

    /**
     * @return string
     */
    public function urlAccessToken()
    {
        return 'https://my.ecwid.com/api/oauth/token';
    }

    /**
     * @param AccessToken $token
     *
     * @return void
     */
    public function urlUserDetails(AccessToken $token) {}

    /**
     * @param object      $response
     * @param AccessToken $token
     *
     * * @return void
     */
    public function userDetails($response, AccessToken $token) {}
}
