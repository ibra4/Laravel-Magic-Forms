<?php

namespace Ibra\MagicForms;

use Ibra\MagicForms\Factory\Form\FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MagicFormBuilder
{
    /**
     * formBuilder
     *
     * @var \Ibra\MagicForms\Factory\Form\FormBuilder
     */
    private $formBuilder;

    /**
     * If we need to load services.
     *
     * @return void
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
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
    public function create(string $className, $options = null)
    {
        $form = $this->formBuilder->buildForm($className, $options);
        return $form;
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
        $form = $this->formBuilder->getForm($className);
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
