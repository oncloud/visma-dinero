<?php

namespace OnCloud\Dinero;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Package;
use OnCloud\Dinero\Commands\DineroCommand;

class DineroServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dinero.php', 'dinero');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePublishing();
        $this->configureRoutes();

    }

    /**
     * Configure the publishable resources offered by the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../stubs/dinero.php' => config_path('dinero.php'),
            ], 'dinero-config');

        }
    }

    /**
     * Configure the routes offered by the application.
     *
     * @return void
     */
    protected function configureRoutes()
    {
        Route::group([
            'namespace' => 'OnCloud\Dinero\Http\Controllers',
            'domain' => config('dinero.domain', null),
            'prefix' => config('dinero.prefix'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        });
    }
}
