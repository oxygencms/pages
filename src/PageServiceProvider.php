<?php

namespace Oxygencms\Pages;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'oxygencms');

        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/oxygencms'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds' => database_path('seeds'),
        ], 'seeds');

        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
        ], 'config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);

        $this->mergeConfigFrom(__DIR__.'/../config/pages.php', 'pages');
    }
}