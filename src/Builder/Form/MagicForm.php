<?php

namespace Ibra\MagicForms\Builder\Form;

use Ibra\MagicForms\Fields\FieldBase;

abstract class MagicForm implements MagicFormInterface
{
    /**
     * Eelequent model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $model;

    /**
     * HTML form action attribute.
     *
     * @var string
     */
    public $action;

    /**
     * HTML classes attribute.
     *
     * @var string
     */
    public $classes;

    /**
     * HTML id attribute.
     *
     * @var mixed
     */
    public $id;

    /**
     * Title of the form.
     *
     * @var string
     */
    public $title;

    /**
     * HTTP method.
     *
     * @var string
     */
    public $method = 'POST';

    /**
     * If true the form will be submitted by js.
     *
     * @var bool
     */
    public $ajax = false;

    /**
     * Form fields.
     *
     * @var \Ibra\MagicForms\Fields\FieldBase[]
     */
    public $fields = [];

    /**
     * Add field to the form.
     *
     * @param  string $fieldClass
     * @param  array $options
     *   HTML Attributes as an array.
     * @return \Ibra\MagicForms\Fields\FieldBase
     */
    public function add(string $fieldClass, array $options): FieldBase
    {
        /** @var FieldBase $fieldClass */
        $field = new $fieldClass();
        $field->build($options, $this->model);

        if ($this->model && isset($this->model->{$field->name}) && $field->value === '') {
            $field->value = $this->model->{$field->name};
        }

        $this->fields[$field->name] = $field;

        return $field;
    }

    /**
     * Makes a renderable array of the form with it's data.
     * @TODO: Maybe it must return a view instead of array.
     * @TODO: Maybe it's better to set $method / $action here.
     *
     * @return array|string
     */
    public function render()
    {
        $post_methods = ['PATCH', 'PUT', 'DELETE'];

        $form = $this;
        $method = in_array($this->method, $post_methods) ? 'POST' : $this->method;
        $method_field = in_array($this->method, $post_methods) ? $this->method : null;

        return view('magic_form::forms.index')
            ->with(compact('form', 'method', 'method_field'))
            ->render();
    }

    /**
     *
     */
    public function begin()
    {
        $post_methods = ['PATCH', 'PUT', 'DELETE'];

        $form = $this;
        $method = in_array($this->method, $post_methods) ? 'POST' : $this->method;
        $method_field = in_array($this->method, $post_methods) ? $this->method : null;

        return view('magic_form::forms.begin')
            ->with(compact('form', 'method', 'method_field'));
    }

    public function end()
    {
        return view('magic_form::forms.end');
    }

    public function submit()
    {
        return view('magic_form::forms.submit');
    }
}
