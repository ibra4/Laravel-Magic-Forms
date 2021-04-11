<?php

namespace Ibra\MagicForms\Fields;

use Exception;
use Ibra\MagicForms\Interfaces\FieldInterface;

class TextField extends FieldBase implements FieldInterface
{
    const REQUIRED_FIELDS = ['label'];

    protected $label;
    protected $id;
    protected $classes;
    protected $placeholder;
    protected $required;
    protected $rules;
    protected $regex;
    protected $readonly;
    protected $disabled;
    protected $ignored;

    public function build(array $options): FieldInterface
    {
        $this->buildOptions($options, $this);

        return $this;
    }
}
