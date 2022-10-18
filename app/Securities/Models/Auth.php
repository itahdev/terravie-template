<?php

namespace App\Securities\Models;

class Auth
{
    /** @var string */
    public string $token;

    /**
     * AuthModel constructor.
     *
     * @param string $token
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'token' => $this->token
        ];
    }
}
