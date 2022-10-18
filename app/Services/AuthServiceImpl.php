<?php

namespace App\Services;

use App\Contracts\Services\AuthService;
use App\DTOs\AuthUser;
use App\Http\Requests\Auth\LoginRequest;
use App\Securities\Authentications\AuthenticationManager;
use App\Securities\Authentications\BasicAuthentication;
use App\Securities\Models\Auth;

class AuthServiceImpl implements AuthService
{
    /** @var AuthenticationManager */
    private AuthenticationManager $authenticationManager;

    /**
     * @param AuthenticationManager $authenticationManager
     */
    public function __construct(AuthenticationManager $authenticationManager)
    {
        $this->authenticationManager = $authenticationManager;
    }

    /**
     * @param LoginRequest $request
     * @return AuthUser
     */
    public function login(LoginRequest $request): AuthUser
    {
        $basicAuth = new BasicAuthentication("user", $request->get('email'), $request->get('password'));
        $authenticatedObject = $this->authenticationManager->authenticate($basicAuth);
        /** @var Auth $authToken */
        $authToken = $authenticatedObject->getAuthenticatedCertificates();

        $user = $authenticatedObject->getUserDetails();
//        $roles = $user->getRoleNames();

        return (new AuthUser($authToken->token, 'ADMIN'));
    }
}
