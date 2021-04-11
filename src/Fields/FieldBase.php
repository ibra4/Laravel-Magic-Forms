<?php

namespace Ibra\MagicForms\Fields;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FieldBase
{
    public function buildOptions($options, $fieldObject)
    {
        $properties = \array_diff(array_keys(get_object_vars($fieldObject)), $fieldObject::UNSET_PROPERTIES);

        foreach ($fieldObject::REQUIRED_PROPERTIES as $required) {
            if (!array_key_exists($required, $options)) {
                throw new BadRequestHttpException(sprintf("missing required option {%s} for flied \"%s\" at position {%d}", $required, $fieldObject->type, $this->position));
            }
        }

        foreach ($properties as $property) {
            if (array_key_exists($property, $options)) {
                $fieldObject->$property = $options[$property];
            }
        }
    }
}
