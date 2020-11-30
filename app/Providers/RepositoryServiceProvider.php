<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Contracts\UsersInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Contracts\BaseInterface::class, \App\Repositories\AbstractRepository::class);
    }
}