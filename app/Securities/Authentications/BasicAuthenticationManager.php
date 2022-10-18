<?php

namespace App\Securities\Authentications;

use App\Exceptions\ApiException;
use App\Securities\Exceptions\AuthenticationException;
use App\Securities\Models\Auth;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;

class BasicAuthenticationManager implements AuthenticationManager
{
    /**
     * @param Authentication $auth
     * @return Authentication
     */
    public function authenticate(Authentication $auth): Authentication
    {
        $credentials = $auth->getCredentials();
        if (!$credentials instanceof BasicAuthenticationCredentials) {
            throw new AuthenticationException("Not support for this credentials");
        }

        $basicAuth = new BasicAuthentication(
            $auth->getGuards(),
            $credentials->getUsername(),
            $credentials->getPassword(),
        );
        $token = $this->getGuards($basicAuth->getGuards())->attempt([
            'email' => $basicAuth->getCredentials()->getUsername(),
            'password' => $basicAuth->getCredentials()->getPassword(),
        ]);

        if (!$token) {
            if ($basicAuth->getGuards() === 'user') {
                throw ApiException::forbidden(__('auth.app_failed'));
            }

            throw ApiException::forbidden(__('auth.failed'));
        }

        $userDetails = $this->getGuards($basicAuth->getGuards())->user();
        $basicAuth->setUserDetails($userDetails);

        $authToken = new Auth($token);
        $basicAuth->setAuthenticatedCertificates($authToken);

        return $basicAuth;
    }

    /**
     * Returns authentication guards.
     * This could be guards for normal user or administrator...
     *
     * @param string $provider
     * @return Factory|Guard|StatefulGuard
     */
    public function getGuards(string $provider): Factory|Guard|StatefulGuard
    {
        return auth($provider);
    }

    /**
     * @return integer
     */
    public function getTokenExpirationTime(): int
    {
        return time() + config('jwt.ttl');
    }

    /**
     * @param string $provider
     * @param mixed  $user
     * @return mixed
     */
    public function fromUser(string $provider, mixed $user): mixed
    {
        return auth($provider)->fromUser($user);
    }

    /**
     * Get User id
     *
     * @param string $guard
     * @return integer
     */
    public function getUserId(string $guard): int
    {
        return auth($guard)->id();
    }
}
