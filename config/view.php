<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Here you may specify an array of paths that should be checked for your
    | views. These paths will be checked in the order they are listed.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all of the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory.
    |
    */

'compiled' => realpath(storage_path('framework/views')) ?: base_path().'/storage/framework/views',

];
