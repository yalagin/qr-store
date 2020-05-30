<?php
// Header menu
return [

    'items' => [
        [],
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/dashboard',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Initial setup',
        ],
        [
            'title' => 'Images',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/images',
            'new-tab' => false,
        ],
        [
            'title' => 'Categories',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/categories',
            'new-tab' => false,
        ],
        [
            'title' => 'Products',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/products',
            'new-tab' => false,
        ],
    ]

];
