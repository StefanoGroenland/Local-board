<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Readable folders
    |--------------------------------------------------------------------------
    |
    | This array determines which folders we read to generate our blocks.
    |
    */

    'read' => [
        '/',
        'testfolder',
        'testfolder/child1'
    ],

    /*
    |--------------------------------------------------------------------------
    | Ignored folders
    |--------------------------------------------------------------------------
    |
    | This array determines which folders we ignore from generating our blocks.
    |
    */

    'ignore' => [
        'child2'
    ]

];