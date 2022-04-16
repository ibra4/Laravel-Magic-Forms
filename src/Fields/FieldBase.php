<?php

namespace Ibra\MagicForms\Fields;

use Exception;

abstract class FieldBase
{

    /**
     * base_html_attributes
     *
     * @var array
     */
    public $base_html_attributes = ['id', 'class', 'name', 'required', 'disabled'];

    /**
     * value
     *
     * @var mixed
     */
    public $value = "";

    public $parameters = [];

    /**
     * @TODO: Try to build the field from inside it's class.
     *
     * @param  array $options
     * @return FieldBase
     */
    public function buildRenderable(array $options, $params = null): FieldBase
    {
        $this->buildHtmlAttributes($options, $this);
        $this->buildParameters($params);

        return $this;
    }

    /**
     *
     * @param  mixed $options
     * @param  mixed $fieldObject
     * @return void
     */
    public function buildHtmlAttributes($options, $fieldObject)
    {
        $this->all_html_attributes = isset($this->additional_html_attributes) ?
            array_merge($this->base_html_attributes, $this->additional_html_attributes)
            : $this->base_html_attributes;
        $fieldObject->name = $options['name'];
        foreach ($options as $attr => $value) {
            $this->setHtmlAttribute($attr, $value);
        }
    }

    /**
     * getValue
     *   Gets the field value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * setHtmlAttribute
     *
     * @param  string $attr
     * @param  mixed $value
     * @return void
     */
    public function setHtmlAttribute($attr, $value)
    {
        if (is_numeric($attr) && in_array($value, $this->all_html_attributes)) {
            $this->attributes[$value] = true;
        } elseif (in_array($attr, $this->all_html_attributes)) {
            $this->attributes[$attr] = $value;
        } else {
            throw new Exception("Invalid Attribute $attr");
        }
    }

    public function render()
    {
        $fieldView = view("magic_form::fields.$this->view_name", ['field' => $this]);
        return $fieldView;
    }

    abstract function buildParameters($params);
}
