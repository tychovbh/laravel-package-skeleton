<?php

namespace Tychovbh\LaravelPackageSkeleton\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeSkeleton extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:skeleton {--package=} {--github=} {--description=} {--provider=} {--author=} {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a skeleton package';

    /**
     * @var string
     */
    protected $package;

    /**
     * @var string
     */
    protected $github;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $namespace;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var
     */
    protected $namespace_test;

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
        $this->package = $this->option('package') ?? $this->ask('Package name');
        $this->github = $this->option('github') ?? $this->ask('Your Github username');
        $this->title = ucwords(str_replace('-', ' ', $this->package));
        $this->namespace = sprintf('%s\\%s', ucfirst($this->github), str_replace(' ', '', $this->title));
        $this->namespace_test = str_replace(
            ucfirst($this->github),
            ucfirst($this->github) . '\\Tests',
            $this->namespace
        );
        $this->provider = $this->option('provider') ?? $this->ask('Package Service Provider name');

        $this->line('Skeleton creating ...');

        $this->composerMake()
            ->composerInstall()
            ->providerMake()
            ->providerConfig()
            ->testsMake();

        $this->line('Skeleton created! :-D');
    }

    /**
     * Make Composer file
     * @return MakeSkeleton
     */
    private function composerMake(): MakeSkeleton
    {
        $namespace = str_replace('\\', '\\\\', $this->namespace) . '\\\\';

        file_replace('composer.json', [
            '{{name}}' => $this->github . '/' . $this->package,
            '{{description}}' => $this->option('description') ?? $this->ask('Package very short description'),
            '{{vendor}}' => $this->github,
            '{{title}}' => $this->title,
            '{{homepage}}' => sprintf('https://github.com/%s/%s', $this->github, $this->package),
            '{{author}}' => ucfirst($this->option('author') ?? $this->ask('Your name')),
            '{{email}}' => $this->option('email') ?? $this->ask('Your email address'),
            '{{author_homepage}}' => 'https://github.com/' . $this->github,
            '{{namespace}}' => $namespace,
            '{{namespace_test}}' => str_replace('\\', '\\\\', $this->namespace_test) . '\\\\',
            '{{provider}}' => $namespace . $this->provider,
        ]);

        return $this;
    }

    /**
     * Run Composer install
     * @return MakeSkeleton
     */
    private function composerInstall(): MakeSkeleton
    {
        echo shell_exec('composer install');
        return $this;
    }

    /**
     * Make Provider
     * @return MakeSkeleton
     */
    private function providerMake(): MakeSkeleton
    {
        Artisan::call('make:provider', [
            'name' => $this->provider
        ]);

        return $this;
    }

    /**
     * Add config to the Provider
     * @return MakeSkeleton
     */
    private function providerConfig(): MakeSkeleton
    {
        $name = sprintf('src/Providers/%s.php', $this->provider);
        $file = file($name);
        $contents = '';
        foreach ($file as $key => $content) {
            if ($key === 15) {
                $contents .= $this->providerRegister();
                continue;
            }
            $contents .= $content;
        }

        file_put_contents($name, $contents);

        return $this;
    }

    /**
     * Fill Provider register method
     * @return string
     */
    private function providerRegister(): string
    {
        $string = '';
        if ($this->confirm('Does your package contain routes?')) {
            $string .= line(8, '$this->loadRoutesFrom(__DIR__ . \'/../routes/web.php\');');
        }

        if ($this->confirm('Does your package contain views?')) {
            $string .= line(8, sprintf(
                '$this->loadViewsFrom(__DIR__ . \'/../resources/views\', \'%s\');',
                $this->package
            ));
        }

        if ($this->confirm('Does your package contain configuration?')) {
            $config = $this->ask('Name your config file');
            $file = sprintf('config/%s.php', $config);
            make_directories($file);
            file_put_contents($file, default_file('config.php'));
            $string .= "\r\n";
            $string .= line(8, sprintf('$source = __DIR__ . \'/../config/%s.php\';', $config));
            $string .= line(
                8,
                'if ($this->app instanceof \Illuminate\Foundation\Application && $this->app->runningInConsole()) {'
            );
            $string .= line(
                12,
                sprintf('$this->publishes([$source => config_path(\'%s.php\')], \'%s\');', $config, $this->package)
            );
            $string .= line(8, '} elseif ($this->app instanceof \Laravel\Lumen\Application) {');
            $string .= line(12, sprintf('$this->app->configure(\'%s\');', $config));
            $string .= line(8, '}');
        }

        return $string;
    }

    /**
     * @return $this
     */
    private function testsMake()
    {
        file_replace('TestCase.php', [
            '//namespace' => sprintf('namespace %s;', $this->namespace_test),
            '//provider' => sprintf('return [\%s\\%s::class];', $this->namespace, $this->provider)
        ], 'tests/TestCase.php');
        return $this;
    }
}
