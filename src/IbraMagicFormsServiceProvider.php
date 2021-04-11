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
        $this->app->bind(MagicFormInterface::class, MagicForm::class);
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
