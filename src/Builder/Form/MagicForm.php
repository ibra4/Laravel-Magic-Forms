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
     * @param string $fieldClass
     * @param array $html_attributes
     *   HTML Attributes as an array.
     * @return \Ibra\MagicForms\Fields\FieldBase
     */
    public function add(string $fieldClass, array $html_attributes, array $params = []): FieldBase
    {
        /** @var FieldBase $field */
        $field = new $fieldClass();
        $field->build($html_attributes, $this->model);
        $field->setOptions($params);

        $this->fields[$field->name] = $field;

        return $field;
    }

    /**
     * Makes a form view.
     *
     * @return string
     */
    public function render($closeTag = false)
    {
        $post_methods = ['PATCH', 'PUT', 'DELETE'];

        $form = $this;
        $method = in_array($this->method, $post_methods) ? 'POST' : $this->method;
        $method_field = in_array($this->method, $post_methods) ? $this->method : null;

        $viewName = $closeTag ? "begin" : "index";
        return view("magic_form::forms.$viewName")
            ->with(compact('form', 'method', 'method_field'));
    }

    /**
     * Makes a form view without close tag </form>.
     *
     * @return string
     */
    public function begin()
    {
        return $this->render(true);
    }
    
    /**
     * Makes a close tag </form>
     *
     * @return string
     */
    public function end()
    {
        return view('magic_form::forms.end');
    }
    
    /**
     * Makes a submit button
     *
     * @return string
     */
    public function submit()
    {
        return view('magic_form::forms.submit');
    }
}
