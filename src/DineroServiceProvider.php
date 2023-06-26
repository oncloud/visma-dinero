<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Commands\DineroCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DineroServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('dinero')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_dinero_table')
            ->hasCommand(DineroCommand::class);
    }
}
