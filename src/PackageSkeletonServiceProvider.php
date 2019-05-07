<?php

namespace Tychovbh\PackageSkeleton;

use Illuminate\Support\ServiceProvider;
use Tychovbh\PackageSkeleton\Console\Commands\MakeSkeleton;

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
