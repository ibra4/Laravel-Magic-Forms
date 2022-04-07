<?php

namespace Ibra\MagicForms\Fields;

use Exception;

class SelectField extends FieldBase implements FieldInterface
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
}
