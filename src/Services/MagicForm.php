<?php

namespace Ibra\MagicForms\Services;

class MagicForm implements MagicFormInterface
{
    public $model;

    public $action;

    public $classes;

    public $id;

    public $title;

    /**
     * UI Framework
     *
     * @note For now only bootstrap working
     * @param string("bootstrap", "material") $layout
     */
    public $layout = 'bootstrap';

    public $method = 'POST';

    public $ajax = false;

    public $fields = [];
    
    /**
     * Add field to the form.
     *
     * @param  string $fieldClass
     * @param  array $options
     * @return MagicFormInterface
     */
    public function add(string $fieldClass, array $options): MagicFormInterface
    {
        $field = new $fieldClass(count($this->fields));
        $field->build($options);

        $this->fields[] = $field;

        return $this;
    }
    
    /**
     * Make HTML form
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

        
        return $view->render();
    }
    
    /**
     * Loads css / js files
     *
     * @param string("css", "js") $type
     * @return array
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
     * Makes script or link HTML Elements
     *
     * @param  string $src
     * @param string("css", "js") $type
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
}
