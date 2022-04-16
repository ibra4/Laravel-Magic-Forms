<?php

namespace Ibra\MagicForms\Fields;

use Exception;

class SelectField extends FieldBase
{
    /**
     * view_name
     *
     * @var string
     */
    public $view_name = 'select_field';

    /**
     * additional_html_attributes
     *
     * @var array
     */
    public $additional_html_attributes = ['defaultvalue'];

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
