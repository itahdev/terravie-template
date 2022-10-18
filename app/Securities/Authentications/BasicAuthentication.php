<?php

namespace App\Securities\Authentications;

use App\Securities\Models\Auth;

class BasicAuthentication implements Authentication
{

    /** @var object|string */
    private string|object $guards;

    /** @var BasicAuthenticationCredentials */
    private BasicAuthenticationCredentials $credentials;

    /** @var object */
    private object $userDetails;

    /** @var Auth */
    private Auth $authenticatedCertificates;

    /**
     * @param string $guards
     * @param string $username
     * @param string $password
     */
    public function __construct(string $guards, string $username, string $password)
    {
        $this->guards = $guards;
        $this->credentials = new BasicAuthenticationCredentials($username, $password);
    }

    /**
     * @return BasicAuthenticationCredentials
     */
    public function getCredentials(): BasicAuthenticationCredentials
    {
        return $this->credentials;
    }

    /**
     * @param $user
     * @return void
     */
    public function setUserDetails($user): void
    {
        $this->userDetails = $user;
    }

    /**
     * @return object
     */
    public function getUserDetails(): object
    {
        return $this->userDetails;
    }

    /**
     * @param Auth $authenticatedCertificates
     * @return void
     */
    public function setAuthenticatedCertificates(Auth $authenticatedCertificates): void
    {
        $this->authenticatedCertificates = $authenticatedCertificates;
    }

    /**
     * @return Auth
     */
    public function getAuthenticatedCertificates(): Auth
    {
        return $this->authenticatedCertificates;
    }

    /**
     * @return object|string
     */
    public function getGuards(): object|string
    {
        return $this->guards;
    }
}
