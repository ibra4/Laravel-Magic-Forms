<?php

namespace Ibra\MagicForms\Fields;

class BooleanField extends FieldBase implements FieldInterface
{
    /**
     * additional_html_attributes
     *
     * @var array
     */
    public $additional_html_attributes = [''];

    /**
     * view_name
     *
     * @var string
     */
    public $view_name = 'boolean_field';
}
