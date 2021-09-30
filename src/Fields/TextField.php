<?php

namespace Ibra\MagicForms\Fields;

class TextField extends FieldBase implements FieldInterface
{
    const REQUIRED_PROPERTIES = ['label', 'name'];

    const UNSET_PROPERTIES = ['position'];
       
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
     * name
     *
     * @var mixed
     */
    public $name;
    
    /**
     * default
     *
     * @var mixed
     */
    public $default;
    
    /**
     * label
     *
     * @var mixed
     */
    public $label;
    
    /**
     * description
     *
     * @var mixed
     */
    public $description;
    
    /**
     * id
     *
     * @var mixed
     */
    public $id;
    
    /**
     * classes
     *
     * @var string
     */
    public $classes = '';
    
    /**
     * wrapper_classes
     *
     * @var string
     */
    public $wrapper_classes = '';
    
    /**
     * placeholder
     *
     * @var mixed
     */
    public $placeholder;
    
    /**
     * required
     *
     * @var bool
     */
    public $required = false;
    
    /**
     * pattern
     *
     * @var mixed
     */
    public $pattern;
    
    /**
     * readonly
     *
     * @var mixed
     */
    public $readonly;
    
    /**
     * disabled
     *
     * @var mixed
     */
    public $disabled;
    
    /**
     * rules
     *
     * @var mixed
     */
    public $rules;
        
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
     * @param  mixed $options
     * @return FieldInterface
     */
    public function build(array $options): FieldInterface
    {
        $this->buildOptions($options, $this);

        return $this;
    }
}
