<?php

namespace Ibra\MagicForms\Fields;

class TextField extends FieldBase implements FieldInterface
{
    // const REQUIRED_PROPERTIES = ['label', 'name'];

    // const UNSET_PROPERTIES = ['position'];

    // @TODO: Document all properties.

    /**
     * view_name
     *
     * @var string
     */
    public $view_name = 'text_field';

    /**
     * HTML type attribute.
     *
     * @var string
     */
    public $type = 'text';

    /**
     * additional_html_attributes
     *
     * @var array
     */
    public $additional_html_attributes = ['placeholder'];

    /**
     * attributes
     *
     * @var array
     */
    public $attributes = [
        'class' => 'form-control'
    ];

    /**
     * placeholder
     *
     * @var mixed
     */
    public $placeholder;

    /**
     * pattern
     *
     * @var mixed
     */
    public $pattern;

    /**
     * ignored
     *
     * @var mixed
     */
    public $ignored;

    /**
     * Create a new TextField model instance.
     *
     * @param  mixed $position
     * @return void
     */
    public function __construct($position)
    {
        $this->position = $position;
    }

    /**
     * @TODO: Try to build the field from inside it's class.
     *
     * @param  array $options
     * @return FieldInterface
     */
    public function build(array $options): FieldInterface
    {
        $this->buildHtmlAttributes($options, $this);

        return $this;
    }

    private function renderAttributes()
    {
    }
}
