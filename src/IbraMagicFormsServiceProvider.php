<?php

namespace Ibra\MagicForms;

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
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'magic_form');
        $this->app->bind('magicformdatamanager', function () {
            return new MagicFormDataManager;
        });
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
