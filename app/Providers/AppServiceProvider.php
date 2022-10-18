<?php

namespace App\Providers;

use App\Securities\Authentications\AuthenticationManager;
use App\Securities\Authentications\BasicAuthenticationManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->register(BootstrapRepositoryProvider::class);
        $this->app->register(BootstrapServiceProvider::class);

        $this->app->bind(AuthenticationManager::class, BasicAuthenticationManager::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
