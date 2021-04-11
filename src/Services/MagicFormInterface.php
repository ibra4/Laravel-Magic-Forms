<?php

namespace Ibra\MagicForms;

use Ibra\MagicForms\Interfaces\FieldInterface;

interface MagicFormInterface
{
    public function render(): string;

    public function add(string $fieldClass, array $options): self;
}
