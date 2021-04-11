<?php

namespace Ibra\MagicForms\Fields;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FieldBase
{
    public function buildOptions($options, $fieldObject)
    {
        $properties = array_keys(get_object_vars($fieldObject));

        foreach ($fieldObject::REQUIRED_FIELDS as $required) {
            if (!array_key_exists($required, $options)) {
                throw new BadRequestHttpException("missing required option \"$required\"");
            }
        }

        foreach ($properties as $property) {
            if (array_key_exists($property, $options)) {
                $fieldObject->$property = $options[$property];
            }
        }
    }
}
