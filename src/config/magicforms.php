<?php

return [
    /**
     * Load bootstrap
     */
    'bootstrap' => [

        /**
         * Path to bootstrap css
         * 
         * FALSE => bootstrap css is already loaded in layout
         * 
         * css.type => local (will load the file from public folder)
         * css.remote => remote (provide url)
         * 
         */
        'css' => [
            'type' => 'public',
            'path' => 'vendor/magicforms/bootstrap/css/bootstrap.min.css'
        ],

        /**
         * Path to bootstrap js
         * 
         * FALSE => bootstrap js is already loaded in layout
         * 
         */
        'js' => [
            'type' => 'public',
            'path' => 'vendor/magicforms/bootstrap/js/bootstrap.min.js'
        ],
    ],

    /**
     * List of custom css stylesheets
     */
    'additional_css' => [
        'hahah',
        'hohoho'
    ],

    /**
     * List of custom JS scripts
     */
    'additional_js' => [],

    /**
     * Provide the yield name of your layout to load css of the form inside it
     */
    'css_yield_name' => 'magic_form_css',

    /**
     * Provide the yield name of your layout to load js of the form inside it
     */
    'js_yield_name' => 'magic_form_js',
];