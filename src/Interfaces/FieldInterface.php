<?php

namespace Ibra\MagicForms\Interfaces;

interface FieldInterface
{
    public function build(array  $options): self;
}
