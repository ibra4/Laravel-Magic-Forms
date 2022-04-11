<?php

namespace Ibra\MagicForms\Factory\Form;

use Exception;
use Ibra\MagicForms\Factory\Field\FieldBuilder;
// use Ibra\MagicForms\Builder\Form\MagicFormInterface

class FormBuilder
{

    /**
     * constructor
     *
     * @param  \Ibra\MagicForms\Factory\Field\FieldBuilder $fieldBuilder
     * @return void
     */
    public function __construct(FieldBuilder $fieldBuilder)
    {
        $this->fieldBuilder = $fieldBuilder;
    }

    /**
     * Creates a new Form Object for rendering.
     *
     * @param  string $className.
     *   The Form class name.
     * @param  array $options.
     *
     * @return \Ibra\MagicForms\Builder\Form\MagicFormInterface
     * @throws \Throwable
     */
    private function makeForm(string $className, $options = null)
    {
        return new $className($this->fieldBuilder);
    }

    public function buildForm(string $className, mixed $options = null)
    {
        $form = $this->makeForm($className, $options);
        $form->action = $form->action();
        return $form->build($options);
    }

    public function getForm(string $className)
    {
        return $this->makeForm($className);
    }
}
