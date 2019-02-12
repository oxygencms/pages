<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Layouts Directory
    |--------------------------------------------------------------------------
    |
    | Here you may specify the full path to the directory
    | which should contain all layout views.
    |
    */

    'layouts_path' => resource_path('views/vendor/oxygencms/layouts'),
    'layouts_package_path' => base_path('vendor/oxygencms/core/views/layouts'),

    /*
    |--------------------------------------------------------------------------
    | Page Templates Directory
    |--------------------------------------------------------------------------
    |
    | Here you may specify the full path to the directory
    | which should contain all page template views.
    |
    */

    'templates_path' => resource_path('views/vendor/oxygencms/pages'),
    'templates_package_path' => base_path('vendor/oxygencms/pages/views/pages'),

    /*
    |--------------------------------------------------------------------------
    | Default Page Layout
    |--------------------------------------------------------------------------
    |
    | This is the layout that will be assigned to new pages by default.
    |
    */

    'default_layout' => 'app',

    /*
    |--------------------------------------------------------------------------
    | Default Page Template
    |--------------------------------------------------------------------------
    |
    | This is the template that will be assigned to new pages by default.
    |
    */

    'default_template' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Controllers
    |--------------------------------------------------------------------------
    |
    | Change this to overwrite the package controllers.
    |
    */

    'home_controller' => \Oxygencms\Pages\Controllers\HomeController::class,
    'page_controller' => \Oxygencms\Pages\Controllers\PageController::class,

    /*
    |--------------------------------------------------------------------------
    | Page Model
    |--------------------------------------------------------------------------
    |
    | Change this to overwrite the package model.
    |
    */

    'model' => \Oxygencms\Pages\Models\Page::class,

];