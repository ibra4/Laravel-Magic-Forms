<?php

namespace Ibra\MagicForms\Fields;

class TextField extends FieldBase implements FieldInterface
{
    /**
     * view_name
     *
     * @var string
     */
    public $view_name = 'text_field';

    /**
     * HTML type attribute.
     *
     * @var string
     */
    public $type = 'text';

    /**
     * additional_html_attributes
     *
     * @var array
     */
    public $additional_html_attributes = ['placeholder'];
}
