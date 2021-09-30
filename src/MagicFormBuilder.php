<?php

namespace Ibra\MagicForms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MagicFormBuilder
{
    public function __construct()
    {
    }

    public function create($formClass, $args = null)
    {
        $form = new $formClass();
        return $form->build($args);
    }

    public function get($formClass)
    {
        $form = new $formClass();
        $this->form = $form->build();
        return $this;
    }

    public function simpleValidate(Request $request)
    {
        $validateArr = [];
        foreach ($this->form->fields as $field) {
            if ($field->rules) {
                $validateArr[$field->name] = $field->rules;
            }
        }
        $validator = Validator::make($request->all(), $validateArr);
        return $validator;
    }
}
