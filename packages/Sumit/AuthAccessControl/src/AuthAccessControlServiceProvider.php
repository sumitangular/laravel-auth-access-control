<?php

namespace Sumit\AuthAccessControl;

use Illuminate\Support\ServiceProvider;

class AuthAccessControlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migrations, views, routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'authaccesscontrol');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/authaccesscontrol'),
        ], 'views');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'migrations');
    }

    public function register()
    {
        //
    }
}
