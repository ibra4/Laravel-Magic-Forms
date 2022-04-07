<?php

namespace Ibra\MagicForms\Builder\Form;

interface MagicFormInterface
{
    /**
     * Add fields and Set Form settings.
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

    /**
     * Form Submit Actions.
     * 
     * @return array
     */
    public function action(): string;
}
