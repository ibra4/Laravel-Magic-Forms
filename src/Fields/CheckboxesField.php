<?php

namespace Ibra\MagicForms\Fields;

class CheckboxesField extends FieldBase
{
    /**
     * view_name
     *
     * @var string
     */
    public $view_name = "checkboxes";

    /**
     * additional_attributes
     *
     * @var array
     */
    public $additional_attributes = ['options'];

    /**
     * buildParameters
     *
     * @param  mixed $params
     * @return void
     */
    public function buildParameters($params)
    {
        $this->parameters = $params;
    }
}
