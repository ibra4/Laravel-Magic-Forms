<?php

namespace Ibra\MagicForms\Fields;

class DateField extends FieldBase
{
    /**
     * view_name
     *
     * @var string
     */
    public $view_name = 'date_field';
    
    /**
     * additional_attributes
     *
     * @var array
     */
    public $additional_attributes = ['min', 'max', 'step', 'pattern'];
}
