<?php

namespace Ibra\MagicForms\Builder\Form;

abstract class MagicForm implements MagicFormInterface
{
    /**
     * Eelequent model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $model;
    
    /**
     * HTML form action attribute.
     *
     * @var string
     */
    public $action;
    
    /**
     * HTML classes attribute.
     *
     * @var string
     */
    public $classes;
    
    /**
     * HTML id attribute.
     *
     * @var mixed
     */
    public $id;
    
    /**
     * Title of the form.
     *
     * @var string
     */
    public $title;

    /**
     * UI Framework (bootstrap | material_ui).
     *
     * @var string
     */
    public $layout = 'bootstrap';
    
    /**
     * HTTP method.
     *
     * @var string
     */
    public $method = 'POST';
    
    /**
     * If true the form will be submitted by js.
     *
     * @var bool
     */
    public $ajax = false;
    
    /**
     * Form fields.
     *
     * @var FieldBase[]
     */
    public $fields = [];
    
    /**
     * Add field to the form.
     *
     * @param  string $fieldClass
     * @param  array $options
     * @return self
     */
    public function add(string $fieldClass, array $options): MagicFormInterface
    {
        $field = new $fieldClass(count($this->fields));
        $field->build($options);

        $this->fields[] = $field;

        return $this;
    }
    
    /**
     * Makes a renderable array of the form with it's data.
     * @TODO: Maybe it must return a view instead of array.
     * @TODO: Maybe it's better to set $method / $action here.
     *
     * @return array
     */
    public function render(): array
    {
        $post_methods = ['PATCH', 'PUT', 'DELETE'];

        $form = $this;
        $method = in_array($this->method, $post_methods) ? 'POST' : $this->method;
        $method_field = in_array($this->method, $post_methods) ? $this->method : null;

        $view = view('magic_form::forms.' . $this->layout . '.index')->with(compact('form', 'method', 'method_field'));

        return [
            'html' => $view->render(),
            'css' => $this->loadAssets('css'),
            'js' => $this->loadAssets('js')
        ];
    }
    
    /**
     * Loads css / js files.
     * @TODO: Find a better way to load the assets.
     *
     * @param string $type css | js.
     * @return mixed
     */
    private function loadAssets($type)
    {
        $files = "";
        
        $config = config('magicforms');

        $layout_asset = $config[$this->layout]["$type"];
        $additional = $config["additional_$type"];
        
        if ($layout_asset) {
            $assetPath = $this->loadAssetFile($layout_asset);
            $files .= $this->makeHTML($assetPath, $type);
        }

        if (!empty($additional)) {
            foreach ($additional as $cssPath) {
                $files .= $this->makeHTML($cssPath, $type);
            }
        }

        $files .= $this->makeHTML(asset("vendor/magicforms/$type/magic-forms.$type"), $type);

        return $files;
    }

    private function loadAssetFile($file)
    {
        switch ($file['type']) {
            case 'public':
                return asset($file['path']);
            case 'remote':
                return $file['path'];
            default:
                return asset($file['path']);
        }
    }
    
    /**
     * Makes script or link HTML Elements.
     * @TODO: Maybe will be removed.
     *
     * @param  string $src
     * @param string $type js | css
     * @return string
     */
    private function makeHTML($src, $type)
    {
        if ($type == 'css') {
            $html = "<link rel='stylesheet' href='$src'></link>";
        } elseif ($type == 'js') {
            $html = "<script type='text/javascript' src='$src'></script>";
        }

        return "$html\n";
    }
        
    /**
     * {@inheritDoc}
     */
    abstract public function build();
}
