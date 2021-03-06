<?php

namespace Ibra\MagicForms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IbraMagicFormsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'magic_form');

        $this->mergeConfigFrom(
            __DIR__ . '/config/magicforms.php',
            'magicforms'
        );

        $this->publishFiles();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeDirectives();
    }

    private function publishFiles()
    {
        // Config and asset files js & css
        $this->publishes([
            __DIR__ . '/config/magicforms.php' => config_path('magicforms.php'),
            __DIR__ . '/../resources/css' => public_path('vendor/magicforms/css'),
            __DIR__ . '/../resources/js' => public_path('vendor/magicforms/js'),
        ], 'Magic forms config and assets');

        // Bootstrap
        $this->publishes([
            __DIR__ . '/../resources/bootstrap' => public_path('vendor/magicforms/bootstrap'),
        ], 'bootstrap');
    }

    private function registerBladeDirectives()
    {
        Blade::directive('magicFormsStyles', [MagicFormsBladeDirectives::class, 'magicFormsStyles']);
        Blade::directive('magicFormsScripts', [MagicFormsBladeDirectives::class, 'magicFormsScripts']);
    }
}
