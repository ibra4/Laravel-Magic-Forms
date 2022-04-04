<?php

namespace Ibra\MagicForms\Fields;

use Exception;

class FieldBase
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

    /**
     * @TODO: Try to build the field from inside it's class.
     *
     * @param  array $options
     * @return FieldBase
     */
    public function build(array $options, $model = null): FieldBase
    {
        $this->buildHtmlAttributes($options, $this);

        if ($model && isset($model->{$this->name}) && $this->value === '') {
            $this->value = $model->{$this->name};
        }

        return $this;
    }

    /**
     * @TODO: Revamp.
     *
     * @param  mixed $options
     * @param  mixed $fieldObject
     * @return void
     */
    public function buildHtmlAttributes($options, $fieldObject)
    {
        $this->all_html_attributes = array_merge($this->base_html_attributes, $this->additional_html_attributes);
        $fieldObject->name = $options['name'];
        foreach ($options as $attr => $value) {
            $this->setHtmlAttribute($attr, $value);
        }
        $this->setOldValue();
    }

    /**
     * setOldValue
     *   Sets the field value.
     *
     * @param  mixed $value
     * @return void
     */
    protected function setOldValue($old = true)
    {
        if ($old && old($this->name)) {
            $this->value = old($this->name);
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

    public function render($wrapper = false)
    {
        $fieldView = view("magic_form::fields.$this->view_name", ['field' => $this]);
        return $fieldView;
    }
}
