<?php

namespace App\Securities\Authentications;

interface AuthenticationManager
{
    /**
     * @param Authentication $auth
     * @return Authentication
     */
    public function authenticate(Authentication $auth): Authentication;

    /**
     * Get User id
     *
     * @param string $guard
     * @return integer
     */
    public function getUserId(string $guard): int;
}
