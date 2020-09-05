<?php

namespace Mujhtech\LaravelMentor\Console;

use Illuminate\Console\Command;
use Mujhtech\LaravelMentor\Helpers\CommandHelper;

class MentorInstallCommand extends Command
{
    protected $signature = 'laravel-mentor:install '.
        '{--force : Overwrite existing views by default}'.
        '{--type= : Installation type, Available type: none, enhanced & full.}'.
        '{--only= : Install only specific part, Available parts: assets, config, translations, auth_views, basic_views, basic_routes & main_views. This option can not used with the with option.}'.
        '{--with=* : Install basic assets with specific parts, Available parts: auth_views, basic_views, basic_routes & main_views}'.
        '{--interactive : The installation will guide you through the process}';

    protected $description = 'Install all the required files for Laravel Mentor and the authentication views';


    protected $package_path = __DIR__.'/../../';

    protected $assets_path = 'vendor/laravel-mentor/assets/';

    protected $assets_package_path = 'public/laravel-mentor/assets/';

    protected $authViews = [
        'auth/login.blade.php'             => '@extends(\'laravel-mentor::auth.login\')',
        'auth/register.blade.php'          => '@extends(\'laravel-mentor::auth.register\')',
        'auth/verify.blade.php'            => '@extends(\'laravel-mentor::auth.verify\')',
        'auth/passwords/confirm.blade.php' => '@extends(\'laravel-mentor::auth.passwords.confirm\')',
        'auth/passwords/email.blade.php'   => '@extends(\'laravel-mentor::auth.passwords.email\')',
        'auth/passwords/reset.blade.php'   => '@extends(\'laravel-mentor::auth.passwords.reset\')',
    ];

    protected $basicViews = [
        'home.profile' => 'profile.blade.php',
    ];

    protected $assets = [
        'css' => [
            'name' => 'Css Folder',
            'package_path' => 'css',
            'assets_path' => 'css',
        ],
        'fonts' => [
            'name' => 'Font Folder',
            'package_path' => 'fonts',
            'assets_path' => 'fonts',
        ],
        'img' => [
            'name' => 'Img Folder',
            'package_path' => 'img',
            'assets_path' => 'img',
        ],
        'js' => [
            'name' => 'JS Folder',
            'package_path' => 'js',
            'assets_path' => 'js',
        ],
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('only')) {
            switch ($this->option('only')) {
            case 'assets':
                $this->exportAssets();

                break;

            case 'config':
                $this->exportConfig();

                break;

            default:
                $this->error('Invalid option!');
                break;
            }

            return;
        }

        if ($this->option('type') == 'basic' || $this->option('type') != 'none' || ! $this->option('type')) {
            $this->exportAssets();
            $this->exportConfig();
        }

        if ($this->option('with')) {
            if (in_array('main_views', $this->option('with'))) {
                $this->exportMainViews();
            }
            if (in_array('auth_views', $this->option('with'))) {
                $this->exportAuthViews();
            }
            if (in_array('basic_views', $this->option('with'))) {
                $this->exportBasicViews();
            }
        }

        $this->info('Laravel Mentor Installation complete.');
    }

    /**
     * Export the main views.
     *
     * @return void
     */
    protected function exportMainViews()
    {
        if ($this->option('interactive')) {
            if (! $this->confirm('Install AdminLTE main views?')) {
                return;
            }
        }

        CommandHelper::copyDirectory(
            $this->packagePath('resources/views'),
            base_path('resources/views/vendor/laravel-mentor'),
            $this->option('force'),
            true
        );

        $this->comment('Main views installed successfully.');
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportAuthViews()
    {
        if ($this->option('interactive')) {
            if (! $this->confirm('Install Laravel Mentor authentication views?')) {
                return;
            }
        }
        CommandHelper::ensureDirectoryExists($this->getViewPath('auth/passwords'));
        foreach ($this->authViews as $file => $content) {
            file_put_contents($this->getViewPath($file), $content);
        }
        $this->comment('Authentication views installed successfully.');
    }

    protected function exportBasicViews()
    {
        if ($this->option('interactive')) {
            if (! $this->confirm('Install Laravel Mentor basic views?')) {
                return;
            }
        }
        foreach ($this->basicViews as $key => $value) {
            if (file_exists($view = $this->getViewPath($value)) && ! $this->option('force')) {
                if (! $this->confirm("The [{$value}] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }
            copy(
                $this->packagePath('/resources/views/'.$key.''),
                $view
            );
        }
        $this->comment('Basic views installed successfully.');
    }


    /**
     * Copy all the content of the Assets Folder to Public Directory.
     */
    protected function exportAssets()
    {
        if ($this->option('interactive')) {
            if (! $this->confirm('Install the basic package assets?')) {
                return;
            }
        }

        foreach ($this->assets as $asset_key => $asset) {
            $this->copyAssets($asset_key, $this->option('force'));
        }

        $this->comment('Basic Assets Installation complete.');
    }

    /**
     * Install the config file.
     */
    protected function exportConfig()
    {
        if ($this->option('interactive')) {
            if (! $this->confirm('Install the package config file?')) {
                return;
            }
        }
        if (file_exists(config_path('laravel-mentor.php')) && ! $this->option('force')) {
            if (! $this->confirm('The Laravel Mentor configuration file already exists. Do you want to replace it?')) {
                return;
            }
        }
        copy(
            $this->packagePath('config/laravel-mentor.php'),
            config_path('laravel-mentor.php')
        );

        $this->comment('Configuration Files installed successfully.');
    }

    /**
     * Get Package Path.
     */
    protected function packagePath($path)
    {
        return $this->package_path.$path;
    }

    /**
     * Get full view path relative to the application's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    public function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }

    /**
     * Copy Assets Data.
     *
     * @param  string  $asset_name
     * @param  bool $force
     * @return void
     */
    protected function copyAssets($asset_name, $force = false)
    {
        if (! isset($this->assets[$asset_name])) {
            return;
        }

        $asset = $this->assets[$asset_name];

        if (is_array($asset['package_path'])) {
            foreach ($asset['package_path'] as $key => $asset_package_path) {
                $asset_assets_path = $asset['assets_path'][$key];
                CommandHelper::copyDirectory(
                    $this->packagePath($this->assets_package_path).$asset_package_path,
                    public_path($this->assets_path).$asset_assets_path,
                    $force,
                    ($asset['recursive'] ?? true),
                    ($asset['ignore'] ?? [])
                );
            }
        } else {
            CommandHelper::copyDirectory(
                $this->packagePath($this->assets_package_path).$asset['package_path'],
                public_path($this->assets_path).$asset['assets_path'],
                $force,
                ($asset['recursive'] ?? true),
                ($asset['ignore'] ?? [])
            );
        }

        if (isset($asset['images_path']) && isset($asset['images'])) {
            CommandHelper::ensureDirectoryExists(public_path($this->assets_path).$asset['images_path']);
            foreach ($asset['images'] as $image_package_path => $image_assets_path) {
                if (file_exists(public_path($this->assets_path).$asset['images_path'].$image_assets_path) && ! $force) {
                    continue;
                }
                copy($this->packagePath($this->assets_package_path).$image_package_path, public_path($this->assets_path).$asset['images_path'].$image_assets_path);
            }
        }
    }

    /**
     * Get Protected.
     *
     * @return array
     */
    public function getProtected($var)
    {
        return $this->{$var};
    }
}