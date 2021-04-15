<?php

namespace Ibra\MagicForms;

use Illuminate\Http\Request;
use Ibra\MagicForms\MagicForm;

class MagicFormDataManager
{
    public function save(Request $request, MagicForm $form)
    {
        dd('saving');
    }
}
