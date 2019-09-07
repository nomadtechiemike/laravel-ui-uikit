<?php

namespace Laravel\Ui;

use Illuminate\Console\Command;
use InvalidArgumentException;

class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:auth
                    { type=uikit : The preset type (uikit) }
                    {--views : Only scaffold the authentication views}
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views and routes';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.blade.php'           => 'auth/login.blade.php',
        'auth/passwords/email.blade.php' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.blade.php' => 'auth/passwords/reset.blade.php',
        'auth/register.blade.php'        => 'auth/register.blade.php',
        'auth/verify.blade.php'          => 'auth/verify.blade.php',
        'home.blade.php'                 => 'home.blade.php',
        'welcome.blade.php'              => 'welcome.blade.php',
        'demo.blade.php'                 => 'demo.blade.php',
        'laravel.blade.php'              => 'laravel.blade.php',
        'uikit.blade.php'                => 'uikit.blade.php',
        'vuejs.blade.php'                => 'vuejs.blade.php',
        'layouts/app.blade.php'          => 'layouts/app.blade.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['uikit'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        $this->ensureDirectoriesExist();

        $this->exportViews();

        if (! $this->option('views')) {
            $this->exportBackend();
        }

        $this->info('Authentication scaffolding generated successfully.');
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function ensureDirectoriesExist()
    {
        if (! is_dir($directory = $this->getViewPath('layouts'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = $this->getViewPath('auth/passwords'))) {
            mkdir($directory, 0755, true);
        }
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param string $path
     *
     * @return string
     */
    protected function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'),
            $path,
        ]);
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = $this->getViewPath($value)) && ! $this->option('force')) {
                if (! $this->confirm("The [{$value}] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__ . '/Auth/' . $this->argument('type') . '-stubs/' . $key,
                $view
            );
        }
    }

    /**
     * Export the authentication backend.
     *
     * @return void
     */
    protected function exportBackend()
    {
        file_put_contents(
            app_path('Http/Controllers/HomeController.php'),
            $this->compileControllerStub()
        );

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/Auth/stubs/routes.blade.php'),
            FILE_APPEND
        );
    }

    /**
     * Compiles the "HomeController" stub.
     *
     * @return string
     */
    protected function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__ . '/Auth/stubs/controllers/HomeController.blade.php')
        );
    }
}
