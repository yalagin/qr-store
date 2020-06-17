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
        [
            'title' => 'Options',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/options',
            'new-tab' => false,
        ],
        [
            'title' => 'Vat',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/vats',
            'new-tab' => false,
        ],
        [
            'title' => 'Currencies',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/currencies',
            'new-tab' => false,
        ],
        [
            'title' => 'Date Time Format',
            'bullet' => 'line',
            'root' => true,
            'page' => 'dashboard/dateTimes',
            'new-tab' => false,
        ],
        [
            'title' => 'Edit languages',
            'bullet' => 'line',
            'root' => true,
            'page' => '/languages',
            'new-tab' => false,
        ],
    ]
];
