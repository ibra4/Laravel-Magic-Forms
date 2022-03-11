<?php

namespace Ibra\MagicForms\Fields;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FieldBase
{
    /**
     * id
     *
     * @var mixed
     */
    public $id = "";

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
     * description
     *
     * @var string
     */
    public $description;

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
    public function buildProperties($options, $fieldObject)
    {
        foreach ($options as $property => $value) {
            $fieldObject->$property = $value;
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
}
