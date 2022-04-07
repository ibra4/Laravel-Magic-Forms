<?php

namespace Ibra\MagicForms\Fields;

class EmailField extends TextField implements FieldInterface
{
    /**
     * HTML type attribute.
     *
     * @var string
     */
    public $type = 'email';
}
