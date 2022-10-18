<?php

namespace App\DTOs;

class AuthUser
{
    /** @var string */
    public string $token;

    /** @var string */
    public string $role;

    /**
     * @param string $token
     * @param string $role
     */
    public function __construct(string $token, string $role)
    {
        $this->token = $token;
        $this->role = $role;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'role' => $this->role
        ];
    }
}
