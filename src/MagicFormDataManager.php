<?php

namespace Ibra\MagicForms;

use Ibra\MagicForms\Builder\Form\MagicForm;
use Illuminate\Http\Request;

class MagicFormDataManager
{
    public function save(Request $request, MagicForm $form)
    {
        dd('saving');
    }
}
