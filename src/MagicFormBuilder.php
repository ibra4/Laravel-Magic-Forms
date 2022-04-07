<?php

namespace Ibra\MagicForms;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MagicFormBuilder
{
    // @TODO: Maybe we need additional logic / layers in this class;

    /**
     * If we need to load services.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Creates a new Form Object for rendering.
     *
     * @param  string $className.
     *   The Form class name.
     * @param  array $options.
     *
     * @return \Ibra\MagicForms\Builder\Form\MagicForm
     * @throws \Throwable
     */
    public function create(STRING $className, $options = null)
    {
        try {
            /** @var \Ibra\MagicForms\Builder\Form\MagicForm $form */
            $form = new $className();
            $form->action = $form->action();
            return $form->build($options);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Creates a new Form Object for data managment.
     *
     * @param  string $className.
     *   The Form class name.
     * @return self
     */
    public function get($className)
    {
        /** @var \Ibra\MagicForms\Builder\Form\MagicForm $form */
        $form = new $className();
        $this->form = $form->build();
        return $this;
    }

    /**
     * Validates the request.
     * 
     * @TODO: make it as a service.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function simpleValidate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->form->rules());
        return $validator;
    }
}
