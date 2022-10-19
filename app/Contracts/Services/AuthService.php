<?php

namespace App\Contracts\Services;

use App\DTOs\AuthUser;
use App\Http\Requests\Auth\LoginRequest;

interface AuthService
{
    /**
     * @param LoginRequest $request
     * @return AuthUser
     */
    public function login(LoginRequest $request): AuthUser;
}
