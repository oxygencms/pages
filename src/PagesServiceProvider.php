<?php

namespace Oxygencms\Pages;

use Artisan;
use Illuminate\Support\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
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
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/2018_07_19_082950_create_pages_table.php' =>
                database_path('migrations')."/2018_07_19_082950_create_pages_table.php",
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/PageTableSeeder.php' =>
                database_path('seeds')."/PageTableSeeder.php",
        ], 'seeds');
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

    /**
     * Publish all.
     */
    public static function vendorPublish()
    {
        Artisan::call('vendor:publish', [
            '--provider' => 'Oxygencms\Pages\PagesServiceProvider',
        ]);
    }
}