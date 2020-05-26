<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\RepositoryInterfaces\ServiceRepositoryInterface',
            'App\Repositories\DBRepositories\ServiceDBRepository',
            'App\Repositories\RepositoryInterfaces\LaundryRepositoryInterface',
            'App\Repositories\DBRepositories\LaundryDBRepository'

        );
    }

}
