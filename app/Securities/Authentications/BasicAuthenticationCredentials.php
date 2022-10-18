<?php

namespace App\Securities\Authentications;

class BasicAuthenticationCredentials
{
    /** @var string */
    private string $username;

    /** @var string */
    private string $password;

    /**
     * BasicAuthenticationCredentials constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
