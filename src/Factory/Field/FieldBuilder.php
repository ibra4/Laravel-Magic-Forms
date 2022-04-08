<?php

namespace Ibra\MagicForms\Factory\Field;

class FieldBuilder
{
    public function __construct()
    {
    }

    /**
     * Add field to the form.
     *
     * @param string $fieldClass
     * @param array $html_attributes
     *   HTML Attributes as an array.
     * @return \Ibra\MagicForms\Fields\FieldBase
     */
    public function makeField(string $fieldClass, array $html_attributes, array $params = [], $model)
    {
        /** @var \Ibra\MagicForms\Fields\FieldBase $field */
        $field = new $fieldClass();

        if (array_key_exists('value', $html_attributes)) {
            $field->value = $html_attributes['value'];
            unset($html_attributes['value']);
        }

        $field->buildRenderable($html_attributes, $params);

        if ($model && isset($model->{$field->name}) && $field->value === '') {
            $field->value = $model->{$field->name};
        }

        return $field;
    }
}
