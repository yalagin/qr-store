<?php
// Header menu
return [

    'items' => [
        [],
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/',
            'new-tab' => false,
        ],
        // Custom
        [
            'section' => 'Initial setup',
        ],
        [
            'title' => 'Images',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'images',
            'new-tab' => false,
        ],
        [
            'title' => 'Categories',
            'icon' => 'media/svg/icons/Layout/Layout-3d.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'categories',
            'new-tab' => false,
        ],
        [
            'title' => 'Products',
            'icon' => 'media/svg/icons/Layout/Layout-grid.svg',
            'bullet' => 'line',
            'root' => true,
            'page' => 'products',
            'new-tab' => false,
        ],
    ]

];
