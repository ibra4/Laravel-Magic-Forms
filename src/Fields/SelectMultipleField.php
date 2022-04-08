<?php

namespace Ibra\MagicForms\Fields;

class SelectMultipleField extends FieldBase
{
    /**
     * additional_html_attributes
     *
     * @var array
     */
    public $additional_html_attributes = ['defaultvalue'];

    /**
     * view_name
     *
     * @var string
     */
    public $view_name = 'select_multiple_field';
}
