<?php

namespace Mujhtech\LaravelMentor;

use Illuminate\Support\ServiceProvider;
use Mujhtech\LaravelMentor\Console\MentorInstallCommand;
use Illuminate\Support\Facades\Blade;
use Mujhtech\LaravelMentor\View\Components\Alert as AlertComponent;
use Mujhtech\LaravelMentor\View\Components\GradientAlert as GradientAlertComponent;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\View\Factory;

class MentorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $view, Dispatcher $events, Repository $config)
    {
        //
        $this->loadViews();
        $this->loadConfig();
        $this->loadPublic();
        $this->registerCommands();
        $this->registerViewComposers($view);

        Blade::component('laravel-mentor_alert', AlertComponent::class);
        Blade::component('laravel-mentor_gradient_alert', GradientAlertComponent::class);

    }


    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views');
        $this->loadViewsFrom($viewsPath, 'laravel-mentor');
    }

    private function loadConfig()
    {
        $configPath = $this->packagePath('config/laravel-mentor.php');
        $this->mergeConfigFrom($configPath, 'laravel-mentor');
    }

    private function loadPublic()
    {
        $publicPath = $this->packagePath('public/laravel-mentor');
        $this->publishes([
            $publicPath => public_path('vendor/laravel-mentor'),
        ], 'public');
    }

    private function packagePath($path)
    {
        return __DIR__."/../$path";
    }

    private function registerCommands()
    {
        $this->commands([
            MentorInstallCommand::class,
        ]);
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('laravel-mentor::page', AdminLteComposer::class);
    }
}
