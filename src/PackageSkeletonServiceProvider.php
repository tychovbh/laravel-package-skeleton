<?php

namespace Tychovbh\LaravelPackageSkeleton;

use Illuminate\Support\ServiceProvider;
use Tychovbh\LaravelPackageSkeleton\Console\Commands\MakeSkeleton;

class PackageSkeletonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeSkeleton::class,
            ]);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
