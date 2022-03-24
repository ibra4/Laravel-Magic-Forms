<?php

namespace Ibra\MagicForms\Fields;

use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FieldBase
{
    
    /**
     * base_html_attributes
     *
     * @var array
     */
    public $base_html_attributes = ['id', 'class', 'name', 'required', 'disabled'];
    
    /**
     * all_attributes
     *
     * @var array
     */
    public $all_html_attributes;

    /**
     * id
     *
     * @var string|integer
     */
    public $id;

    /**
     * name
     *
     * @var string
     */
    public $name;

    /**
     * label
     *
     * @var string
     */
    public $label;

    /**
     * classes
     *
     * @var string
     */
    public $classes = '';

    /**
     * wrapper_classes
     *
     * @var string
     */
    public $wrapper_classes = '';

    /**
     * required
     *
     * @var bool
     */
    public $required = false;

    /**
     * disabled
     *
     * @var mixed
     */
    public $disabled;

    /**
     * value
     *
     * @var mixed
     */
    public $value = "";

    /**
     * rules
     *
     * @var mixed
     */
    public $rules;

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
        foreach ($options as $attr => $value) {
            $fieldObject->$attr = $value;
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
    public function setHtmlAttribute($attr, $value) {
        if ($attr === 'class') {
            $this->attributes['class'] .= " $value";
        } elseif (is_numeric($attr) && in_array($value, $this->all_html_attributes)) {
            $this->attributes[$value] = true;
        } elseif (in_array($attr, $this->all_html_attributes)) {
                $this->attributes[$attr] = $value;
        } else {
            throw new Exception("Invalid Attribute $attr");
        }
    }
}
