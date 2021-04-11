<?php

namespace Ibra\MagicForms;

use Ibra\MagicForms\MagicFormInterface;

class MagicForm implements MagicFormInterface
{

    public string $action;

    public string $classes;

    public string $id;

    public string $title;

    public string $layout = 'bootstrap';

    public string $method = 'POST';

    public bool $ajax = false;

    public array $fields = [];

    public function add(string $fieldClass, array $options): MagicFormInterface
    {
        $field = new $fieldClass(count($this->fields));
        $field->build($options);

        $this->fields[] = $field;

        return $this;
    }

    public function render(): string
    {
        $post_methods = ['PATCH', 'PUT', 'DELETE'];

        $form = $this;
        $method = in_array($this->method, $post_methods) ? 'POST' : $this->method;
        $method_field = in_array($this->method, $post_methods) ? $this->method : null;

        $view = view('magic_form::forms.' . $this->layout . '.index')->with(compact('form', 'method', 'method_field'));
        return $view->render();
    }
}
