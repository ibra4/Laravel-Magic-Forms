<?php

namespace Ibra\MagicForms\Facades;

use Illuminate\Support\Facades\Facade;

class MagicFormDataManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'magicformdatamanager';
    }
}
