<?php

namespace Ibra\MagicForms\Builder\Form;

interface MagicFormInterface
{
    /**
     * Builds a form.
     *
     * @return self
     */
    public function build(): self;

    /**
     * Laravel Validation rules
     * 
     * @return array
     */
    public function rules(): array;
}
