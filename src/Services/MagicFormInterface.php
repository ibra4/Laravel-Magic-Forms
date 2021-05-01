<?php

namespace Ibra\MagicForms;

interface MagicFormInterface
{
    public function render(): array;

    public function add(string $fieldClass, array $options): self;
}
