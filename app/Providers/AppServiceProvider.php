<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;


class AppServiceProvider extends ServiceProvider
{

    public function register():void
    {
        Passport::ignoreRoutes();


    }

    public function boot(): void
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
