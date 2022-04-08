<?php

namespace Ibra\MagicForms\Builder\Form;

use Exception;
use Ibra\MagicForms\Factory\Field\FieldBuilder;

class MagicForm
{
    use MagicFormRenderer;

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
     * HTML HTTP method.
     *
     * @var string
     */
    public $html_method;

    /**
     * HTML HTTP method field.
     *
     * @var string
     */
    public $method_field = null;

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
     * fieldBuilder
     *
     * @var \Ibra\MagicForms\Factory\Field\FieldBuilder
     */
    private $fieldBuilder;

    /**
     * constructor
     *
     * @param  \Ibra\MagicForms\Factory\Field\FieldBuilder $fieldBuilder
     * @return void
     */
    public function __construct(FieldBuilder $fieldBuilder)
    {
        $this->fieldBuilder = $fieldBuilder;
    }

    /**
     * {@inheritDoc}
     */
    public function add(string $fieldClass, array $html_attributes, array $params = [])
    {
        $field = $this->fieldBuilder->makeField($fieldClass, $html_attributes, $params, $this->model);
        $this->fields[$field->name] = $field;

        return $field;
    }
}
