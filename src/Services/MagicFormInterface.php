<?php

namespace Ibra\MagicForms;

use Ibra\MagicForms\Interfaces\FieldInterface;

interface MagicFormInterface
{
    public function render(): array;

    public function add(string $fieldClass, array $options): self;

    public function setAction(string $action);
}
