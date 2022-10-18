<?php

namespace App\Providers;

use App\Contracts\Services\AuthService;
use App\Services\AuthServiceImpl;
use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AuthService::class, AuthServiceImpl::class);
    }
}
