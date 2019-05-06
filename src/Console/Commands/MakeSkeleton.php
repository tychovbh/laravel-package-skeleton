<?php

namespace Tychovbh\LaravelPackageSkeleton\Console\Commands;

use Illuminate\Console\Command;

class MakeSkeleton extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:skeleton';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a skeleton package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo 'done';
    }
}