<?php

namespace Ibra\MagicForms\Builder\View;

class MagicFormView
{
    /**
     * the name of the view to be passed to view() function;
     *
     * @var string
     */
    public $viewName;
    
    /**
     * JS Files.
     *
     * @var string[]
     */
    public $jsFiles;

    /**
     * CSS Files.
     *
     * @var string[]
     */
    public $cssFiles;
        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->viewName = $name;
    }
}
