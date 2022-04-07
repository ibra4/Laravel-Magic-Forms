<?php

namespace Ibra\MagicForms\Fields;

class NumberField extends TextField implements FieldInterface
{
    /**
     * HTML type attribute.
     *
     * @var string
     */
    public $type = 'number';
    
    /**
     * additional_html_attributes
     *
     * @var array
     */
    public $additional_html_attributes = ['placeholder', 'min', 'max'];
}
