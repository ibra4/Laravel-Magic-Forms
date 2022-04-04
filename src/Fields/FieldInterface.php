<?php

namespace Ibra\MagicForms\Fields;

interface FieldInterface
{
    public function build(array  $options): FieldBase;
}
