<?php

namespace Ibra\MagicForms;

use Ibra\MagicForms\MagicFormInterface;

class MagicForm implements MagicFormInterface
{

    public string $action;

    public bool $ajax = false;

    public array $fields = [];

    public function add(string $fieldClass, array $options): MagicFormInterface
    {
        $field = new $fieldClass;
        $field->build($options);

        $this->fields[] = $field;

        return $this;
    }

    public function setAction(string $action)
    {
        $this->action = $action;
    }

    public function render(): array
    {
        dd($this);
        return [];
    }
}
