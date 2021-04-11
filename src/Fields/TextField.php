<?php

namespace Ibra\MagicForms\Fields;

use Exception;
use Ibra\MagicForms\Interfaces\FieldInterface;

class TextField extends FieldBase implements FieldInterface
{
    const REQUIRED_PROPERTIES = ['label', 'name'];

    const UNSET_PROPERTIES = ['position'];

    public $view_name = 'text_field';

    /**
     * Available in HTML
     */
    public $type = 'text';
    public $name;
    public $default;
    public $label;
    public $description;
    public $id;
    public $classes = '';
    public $wrapper_classes = '';
    public $placeholder;
    public $required = false;
    public $pattern;
    public $readonly;
    public $disabled;

    public $rules;
    public $ignored;

    public function __construct($position)
    {
        $this->position = $position;
    }

    public function build(array $options): FieldInterface
    {
        $this->buildOptions($options, $this);

        return $this;
    }
}
